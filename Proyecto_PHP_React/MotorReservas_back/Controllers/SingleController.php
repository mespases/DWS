<?php

session_start();

include_once "../Models/SingleModel.php";

if (isset($_GET["id"])) {
    $model = new SingleModel();
    $hotel = $model->getHotel($_GET["id"]);
} else {
    header("location: MainController.php");
}

require_once "../Views/SingleView.phtml";

?>