<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("database.php");
  include("user.php");

  $bring = new user();
  $username = $_POST["username"];
  $password = $_POST["password"];

  $bring->username = $username;
  $bring->password = $password;
  $bring->insert();

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
        <br>Username <input type="text" name="username"></br>
        <br>Password <input type="password" name="password"></br>
        <br><input type="submit" value="Register"></br>
    </form>

</body>
</html>