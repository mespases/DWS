<?php

/**
 * @var hotel $hotel
 */

include_once "../Models/MainModel.php";
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

session_start();

$model = new MainModel();
$hotels = $model->getHotels();

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

//require_once "../Views/MainView.phtml";

?>