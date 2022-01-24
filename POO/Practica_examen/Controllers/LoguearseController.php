<?php

include_once "../DB/db.php";

    if (isset($_POST["mail"]) && isset($_POST["password"])) {
        $conn = new DB();
        $sql = "SELECT * FROM `users` WHERE mail = '".$_POST["mail"]."';";
        $conn->default();
        $query = $conn->query($sql);
        $conn->close();
        $result = $query->fetch_assoc();

        if (crypt($_POST["password"], $result["password"]) == $result["password"]) {
            session_start();
            $_SESSION["user"] = $result["id"];
            header("Location: listHotelsController.php");
        } else {
            echo "<script> alert('El usuario no es correcto')</script>";
        }
    }

    include_once "../Views/LoginView.php"
?>
