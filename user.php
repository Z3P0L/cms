<?php

class user {
    public $id;
    public $username;
    public $password;
    private $database;


    public function __construct(){
        $this->database = new database ("localhost", "admin", "", "cms");
    }

    public function insert(){
        $sql = "INSERT INTO user(username, password) VALUES('" . $this->username . "', '" . $this->password . "')";
        $this->database->query($sql);
    }

    public function getByUsername(){
        $sql = "SELECT * FROM user WHERE username = '" . $this->username . "'";
        $result = $database->query($sql);
        $user_data = $result->fetch_object();
    }


}


?>