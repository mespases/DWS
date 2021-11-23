<?php
include ("t3.php");

$a = new BDD();
$result = $a->select();

for ($i = 0; $i < count($result); $i++) {
    echo '<a href="loco3.php?id='.$result[$i]["id"].'">'.$result[$i]["id"].'</a><br><br>';
}

$a->close();

?>