<?php

    $api_url = "http://localhost/html/Proyecto_PHP_React/MotorReservas_back/Controllers/MainController.php";

    $json_list = json_decode(file_get_contents($api_url), true)["info"];

    include_once "../View/listView.php";
?>