<?php

    if (isset($_GET["id"])) {
        $api_url = "http://localhost/html/Proyecto_PHP_React/MotorReservas_back/Controllers/api_hotel.php?id=".$_GET["id"]."";
        $json_api = json_decode(file_get_contents($api_url), true)["info"][0];
        include_once "../View/hotelView.php";
    } else {
        header("Location: listController.php");
    }

?>