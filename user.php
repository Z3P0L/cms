<?php

class user {
    public $id;
    public $username;
    public $password;
    private $database;


    public function __construct(){
        $this->database = new database ("localhost", "cms", "admin", "");
    }

    public function insert(){
        $sql = "INSERT INTO user(username, password) VALUES('" . $this->username . ", '" . $this->password . "')";
    }


}


?>