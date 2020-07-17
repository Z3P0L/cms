<?php

session_start();
if (isset($_SESSION['login'])) echo "Bienvenido :)";
else header('Location: login/login.php');


?>