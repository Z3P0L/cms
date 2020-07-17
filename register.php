<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("database.php");
  include("user.php");
  include("utils.php");

  $valid = true;
  $bring = new user();
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($username)) {
    echo "Ingrese un usuario";
    $valid = false;
  }

  if (empty($password)) {
    echo "<br> Ingrese una contraseña </br>";
    $valid = false;
  }

  if (strlen($username) < 3){
    echo "<br> El usuario debe tener más de 3 caracteres </br>";
    echo $msg;
    $valid = false;
  }

  if(strlen($password) < 5){
    echo "La contraseña debe tener más de 5 caracteres";
    echo $msg;
    $valid = false;
  }

  if ($valid) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $bring->username = $username;
    $bring->password = $hash;
    $bring->insert();
  
    header('Location: login.php'); // Redirecciona al login
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS</title>
</head>
<body>
  <form method="POST" action="register.php">
    <h1>Register</h1>
    <label>
      username 
      <input type="text" name="username">
    </label>
    <label>
      Password 
      <input type="password" name="password">
    </label>
    <label>
    <button>Registrar</button>
    </label>
  </form>
</body>
</html>