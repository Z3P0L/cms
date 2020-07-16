<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("database.php");
  include("user.php");

  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new user();
  $user->username = $username;
  $result = $user->getByUsername();

  if ($result === false) exit("Usuario no registrado");
  if ($user->password !== $password) exit("Usuario o contraseña incorrecta");

  exit("Success");
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