<?php
include ("t3.php");
    $id = $_GET["id"];
    $locodelto = new BDD();
    $result = $locodelto->select();

    for ($i = 0; $i < count($result); $i++) {
        if ($result[$i]["id"] == $id) {
            echo "<p>".$result[$i]["name"]."</p><br>";
        }
    }

?>
