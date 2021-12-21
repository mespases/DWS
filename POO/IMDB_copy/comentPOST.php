<?php

include_once "BD_movies.php";

$bd = new BD_movies();
session_start();

/** Insertamos el comentario si lo recibimos */
if (isset($_POST["coment"]) && $_POST["coment"] != "") {
    $bd->insertComentario($_SESSION["film_id"], $_SESSION["user_id"], $_POST["coment"], $_POST["like"]);
}

if (isset($_SESSION["film_id"])) {
    header("Location: singlePage.php?id=".$_SESSION["film_id"]);
} else {
    header("Location: index.php");
}



?>