<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * @var multimedias $item
 */

    include_once "../Models/listHotelsModel.php";

    $model = new listHotelsModel();
    //$hoteles = $model->getList();

    $id = 153716981;
    $multimedia = $model->getMultimedias($id);

    $post_arr = Array();
    $post_arr["data"] = Array();

    foreach ($multimedia as $item) {
        $post_item = Array(
            "id" => $item->getId(),
            "property_id" => $item->getPropertyId(),
            "url" => $item->getUrl()
        );
        array_push($post_arr['data'], $post_item);
    }

    echo json_encode($post_arr);

?>
