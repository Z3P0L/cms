<?php
class database {
    
    private $connection;
    
        public function __construct($host, $user, $password, $database){
            $this->connection = mysqli_connect($host, $user, $password, $database);
        
            if(!$this->connection){
                exit("No se pudo conectar a Mysql");
            }
        }

        public function query($sql){
            $response = $this->connection->query($sql);
            if(!$response){
                exit($this->connection->error);
            }
            return $response;
        }

    }



?>