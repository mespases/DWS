<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../Models/listHotelsModel.php';

    $list = new listHotelsModel();

    $hotels = $list->getPropierties();

    include_once '../Views/listHotelsView.php'
?>