<?php

include_once "../Models/hotelModel.php";

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $hotel = new hotelModel();

        $one_hotel = $hotel->getPropierties($id);
        include_once '../Views/hotelView.php';
    } else {
        header("Location: listHotelsController.php");
    }


?>