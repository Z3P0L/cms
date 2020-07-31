<?php

class model {

    protected $database;

    public function __construct() {
        $this->database = new database ("localhost", "admin", "", "cms");
    }

    // obtiene el nombre de la clase
    // en este caso los mdelos tienen el mismo nombre de clase
    // y de la tabla en la db, por eso los podemos utilizar
    // para automatizar la creacion de modelos
    // sin tener que crear varias veces las mismas funciones
    // para todos los modelos
    private function getTableName() {
        return get_class($this);
    }

    // Obtiene todas las columnas de la tabla del modelo
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM " . $tableName;
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtiene una row de la tabla del modelo
    public function getById($ID) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM " . $tableName . " WHERE ID = " . $ID;
        $result = $this->database->query($sql);
        return $result->fetch_object();
    }

    public function deletePost($ID){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM " . $tableName . " WHERE ID = " . $ID;
        $result = $this->database->query($sql);
    }
}