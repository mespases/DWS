<?php
    include_once "../DB/db.php";

    if (isset($_POST["mail"]) && isset($_POST["password"])) {
        $pass = crypt($_POST["password"], bin2hex(random_bytes(10)));
        $sql = "INSERT INTO `users`(`mail`, `password`) VALUES ('".$_POST["mail"]."','".$pass."')";
        $conn = new DB();
        $conn->default();
        $conn->query($sql);
        $conn->close();
        header("Location: listHotelsController.php");
    }

    include_once "../Views/registerView.php";
?>