<?php

include_once "../Models/SignupModel.php";

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    if ($_POST["password"] == $_POST["password2"]) {
        $model = new SignupModel();
        if ($model->checkUserExists($_POST["email"])) {
            die("User already exists");
        } else {
            $model->newUser($_POST["email"], $_POST["password"]);
            header("Location: SigninController.php");
        }
    } else {
        die("Password error");
    }
} else {
    require_once "../Views/SignupView.phtml";
}

?>