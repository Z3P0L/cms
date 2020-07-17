<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("database.php");
  include("user.php");

  $username = $_POST['username'];
  $password = $_POST['password'];
  $valid = true;

  if (empty($username)){
    $valid = false;
  }

  if (empty($password)){
    $valid = false;
  }

  $user = new user();
  $user->username = $username;
  $result = $user->getByUsername();

  if($valid){
  if ($result === false) exit("Usuario no registrado");
  if (!password_verify($password, $user->password)) exit("Usuario o contraseña incorrecta");

  exit("Success");
  // header('Location: /site/index.php');

  }

  else{
    echo "<h2> Faltan espacios por llenar </h2>";
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
  <h1>Login</h1>
  <form method="POST" action="login.php">
    <label>
      Username
      <input type="text" name="username"/>
    </label>
    <label>
      Password
      <input type="password" name="password"/>
    </label>
    <button>Entrar</button>
  </form>
</body>
</html>