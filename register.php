<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("includes/database.php");
  include("includes/model.php");
  include("includes/user.php");
  include("includes/utils.php");

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
    $bring->admin = 'no_admin';
    $bring->insert();
  
    header('Location: /login.php'); // Redirecciona al login
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("meta.php"); ?>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class="input" type="text" name="username">
            </div>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" name="password">
            </div>
        </div>
        <button class="button">Registrar</button>
        <a button class="button" href="login.php">¿Ya tienes cuenta?</a>
    </form>
</body>
</html>