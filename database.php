<?php
class database {
    
    private $connection;
    
        public function __construct($host, $database, $user, $password){
            $this->connection = mysqli_connect($host, $database, $user, $password);
        
            if(!$this->connection){
                exit("No se pudo conectar a Mysql");
            }
        }

        public function query($sql){
            $response = $this->$connection->query($sql);
            return $response;
        }

    }



?>