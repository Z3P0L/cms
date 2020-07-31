<?php

class user extends model {

    public $id;
    public $username;
    public $password;
    public $admin;

    public function insert(){
        // Insertamos un elemento en la tabla user con los valores que tenemos en la instancia actualmente
        $sql = "INSERT INTO user(username, password, admin) VALUES('" . $this->username . "', '" . $this->password . "', '" . $this->admin . "')"; 
        $this->database->query($sql);
    }

    public function getByUsername(){
        // Enviamos el sql a la base de datos
        $sql = "SELECT * FROM user WHERE username = '" . $this->username . "'";
        $result = $this->database->query($sql);

        // Obtenemos un elemento del resultado del pedido que hicimos
        // en forma de objeto(que seria como una clase por eso accedemos a las columnas como propiedades)
        $user_data = $result->fetch_object();

        // Verificamos que nos haya retornado algo la base de datos
        if($user_data === NULL) return false;

        // Asignamos el resultado que obtuvimos de la db en esta misma clase
        $this->username = $user_data->username;
        $this->password = $user_data->password;
        $this->admin = $user_data->admin;
        $this->id = $user_data->ID;

        // Retornamos true
        return true;
    }
}