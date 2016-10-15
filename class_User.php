<?php
require_once "Util.php";
class User{


    public $name;
    public $email;
    public $pw_hash;
    public $id = null;

    public function __construct($name, $email){


        $this->name = $name;
        $this->email = $email;
    }

    public function set_password($pw){
        $this->pw_hash = hash('ripemd128', Blabbr::PW_SALT.$pw);

    }

    public static function get_user_by_id($id) // Method to return a user if match is found in DB with ID
    {
        //Query the user table for a user matching $id,
        //then construct a user object from the record and return it.
        //Important Make sure to set the id and pw_hash fields on the user object before returning it.
        //Those fields do not get set by the constructor!
        //Return null if a matching user is not found.


        //  establish mysql connection
        $mysqli = new mysqli(Blabbr::MYSQL_HOSTNAME, Blabbr::MYSQL_USER, Blabbr::MYSQL_password, Blabbr::MYSQL_DB);

        // run the query
        $res = $mysqli->query("SELECT * FROM user WHERE id = '$id'");

        //  if the query has returned some result then run "If" block
        if($res->num_rows != 0)
        {
            //  since "ID" is unique and going to return only single row I've not used "WHILE" loop
            $row =   $res->fetch_assoc(); // get row from result set

            $user = new User($row["first_name"],$row["last_name"],$row["email"]);  // create new user object

            $user->id = $row["id"];  //  get the id of that user from DB and assign it to newly created object property

            $user->pw_hash = $row["pw_hash"];  //  get the hashed password of that user and assign to new object

            return $user;  //  return the user object

        }
        else  //  if no match found
        {
            return null;  //  return null
        }
    }

    public function get_freinds()
    {
        // establish mysql connection
        $mysqli = new mysqli(Blabbr::MYSQL_HOSTNAME, Blabbr::MYSQL_USER, Blabbr::MYSQL_password, Blabbr::MYSQL_DB);

        //return an array of friends of the logged in user, the query is supplied for you
        $query = "SELECT DISTINCT sub.* FROM ".
            "(SELECT u.* FROM user u JOIN friendship f ON f.follower_id = u.id WHERE f.target_id = $this->id ".
            "UNION ".
            "SELECT u.* FROM user u JOIN friendship f ON f.target_id = u.id WHERE f.follower_id = $this->id) as sub";

        // execute the query
        $res = $mysqli->query($query);

        $results = array();//empty array, fill it with the user's friends

        // if match found
        if($res->num_rows != 0 )
        {
            // for each row of the result set run this block of code
            while($row = $res->fetch_assoc())
            {
                $user = new User($row["first_name"],$row["last_name"],$row["email"]);   //  create new user object

                $user->id = $row["id"];  //  assign id to newly created user object

                $user->pw_hash = $row["pw_hash"];  //  assign hashed password to newly created user object

                $results[] = $user;  //  Add the user object to $results array

            }
            return $results;    //  return an array
        }
        else  //  if no match found
        {
            return $results;  //  return an empty array

        }
    }


    //save the user object to the database.
    //return an array in the form of array('success' => true , 'message' => 'User successfully saved.')
    public function save(){
        $mysqli = new mysqli(Blabbr::MYSQL_HOSTNAME, Blabbr::MYSQL_USER, Blabbr::MYSQL_password, Blabbr::MYSQL_DB);

        if($mysqli->connect_error){//bad connection
            return array('success' => false, 'message' => $mysqli->connect_error);
        }

        if($this->pw_hash == null){
            return array('success' => false, 'message' => 'You must set a password before saving the user.');
        }
        //sanitize these
        $email = $mysqli->real_escape_string($this->email);
        $name = $mysqli->real_escape_string($this->name);


        $query = "INSERT INTO authentication (email, name, password, signup_date) ".
            "VALUES('$email', '$name','$this->pw_hash', NOW()) ".
            "ON DUPLICATE KEY UPDATE name=VALUES(name), password=VALUES(password)";

        //execute query
        $res = $mysqli->query($query);
        //check results, if bad return the proper repsonse
        if(!$res){
            return array('success' => false, 'message' => $mysqli->error);
        }

        //if it's a new user, get the user id and set the id property
        if($this->id == null){//set the id if needed.
            $this->id = $mysqli->insert_id;
        }
        // $res->close();//free up the resource
        return array('success' => true, 'message' => "User with id $this->id saved to database");

    }

    public function get_image(){
        $file = "img/users/".strtolower($this->first_name)."_".strtolower($this->last_name).".jpg";
        if(file_exists($file)){
            return $file;
        }else{
            return "img/users/monkey.jpg";
        }
    }


}

