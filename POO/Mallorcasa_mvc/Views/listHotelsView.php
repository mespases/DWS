<html>
<head>
    <title>List</title>
</head>
<body>
<?php

    foreach ($hoteles as $hotel) {
        echo "<div>";
        echo "<h1>".$hotel->getCity()->getName()."</h1>";
        echo "<img src='".$hotel->getMultimedias()->getUrl()."'/>";
        echo "<h2>Precio: ".$hotel->getPrice()."</h2>";
        echo "</div>";
    }

?>
</body>
</html>