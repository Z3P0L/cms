<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("includes/database.php");
  include("includes/model.php");
  include("includes/user.php");

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

  if ($valid) {
    if ($result === false) exit("Usuario no registrado");
    if (!password_verify($password, $user->password)) exit("Usuario o contraseña incorrecta");

    session_start();
    $_SESSION['login'] = $username;

    header('Location: ../index.php');
  } else {
    echo "<h2> Faltan espacios por llenar </h2>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("meta.php"); ?>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
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
        <button class="button">Entrar</button>
    </form>
</body>
</html>