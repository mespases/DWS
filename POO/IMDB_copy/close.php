<?php
// Cerramos la sesion del usuario y redireccionamos a la pagina index.php
session_start();

$_SESSION["loggedIn"] = false;
session_destroy();
header("Location: index.php");

?>
