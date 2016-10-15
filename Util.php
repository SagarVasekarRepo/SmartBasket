<?php
//alert class
class Alert{

    public $message;
    public $severity;
    public $dismissable;

    //options for $sev are success, warning (default), info and danger,
    function __construct($msg, $sev = "warning", $dis = true){
        $this->message = $msg;
        $this->severity = $sev;
        $this->dismissable = $dis;
    }

}

class SmartBasket{

    const MYSQL_HOSTNAME = '127.0.0.1:3306';
    const MYSQL_USER= 'root';
    const MYSQL_password = 'root';
    const MYSQL_DB = 'SmartBasket';
    const PW_SALT = "g0Ut3S!";

}