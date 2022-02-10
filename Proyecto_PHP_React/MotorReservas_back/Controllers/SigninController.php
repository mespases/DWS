<?php

include_once "../Models/SigninModel.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $model = new SigninModel();
    $user = $model->checkUser($_POST["email"], $_POST["password"]);
    if ($user->getId() > 0) {
        session_start();
        $_SESSION["userId"] = $user->getId();
        $_SESSION["userEmail"] = $user->getEmail();
        header("Location: MainController.php");
    } else {
        die("Sign in error");
    }
} else {
    require_once "../Views/SigninView.phtml";
}

?>
