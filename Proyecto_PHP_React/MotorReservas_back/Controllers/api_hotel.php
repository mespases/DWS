<?php

/**
 * @var hotel $hotel
 */

if (isset($_GET["id"])) {
    include_once "../Models/MainModel.php";
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");

    session_start();

    $model = new MainModel();
    $hotels = $model->getHotel($_GET["id"]);

    $post_arr = Array();
    $post_arr["info"] = Array();

    foreach ($hotels as $hotel) {
        $item_arr = Array(
            'id' => $hotel->getId(),
            'name' => $hotel->getName(),
            'description' => $hotel->getDescription(),
            'street' => $hotel->getStreet(),
            'town' => $hotel->getTown(),
            'score' => $hotel->getScore(),
            'basicPrice' => $hotel->getBasicPrice(),
            'deluxePrice' => $hotel->getDeluxePrice(),
            'images' => $hotel->getImages()
        );
        array_push($post_arr["info"], $item_arr);
    }


    echo json_encode($post_arr);
} else {
    die("El id no ha sido pasado como parametro");
}

?>