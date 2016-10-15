<?php
require_once "Util.php.php";
require_once "class_User.php";
session_start();

// establish a mysql connection
$mysqli = new mysqli(SmartBasket::MYSQL_HOSTNAME, SmartBasket::MYSQL_USER, SmartBasket::MYSQL_password, SmartBasket::MYSQL_DB);

//  sanitize all POST variables using real_escape_string method
$name = $mysqli->real_escape_string($_POST['name']);  //  sanitize First Name

$email = $mysqli->real_escape_string($_POST['email']);  //  sanitize Email

$password = $mysqli->real_escape_string($_POST['password']);  //  sanitize Password

$new_user = new User($_name,$email);  //  Create new user oject

$new_user->set_password($password);  //  set the password of newly created user object

$result = $new_user->save();  //  Insert this user object with First Name, Last Name, Email and Password into DB

if($result["success"] === true)  //  if row is added in DB successfully then execute "If" block
{
    $_SESSION['alert'] = new Alert("You have successfully signed up!!", "success");  //  display an alert

    header('Location: index.php');  //  redirect to index.php

    exit;
}
else  //  if row is not added to DB then execute "Else" block
{
    $_SESSION['alert'] = new Alert($result["message"], "danger");  //  display an alert

    header('Location: register.php'); //  redirect to register.php

    exit;

}


?>