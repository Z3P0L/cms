<?php

session_start();
if (isset($_SESSION['login'])){
    session_destroy();
    exit("Sesion finalizada");
}
else{
    exit("Sesion finalizada");
}
?>