<html>
<head>
    <title>Pagina uno</title>
</head>

<body>

    <a href="../Controllers/LoguearseController.php">Login</a>
    <?php
        foreach ($hotels as $hotel) {
            echo "<a href='../Controllers/hotelController.php?id=".$hotel->getId()."'>";
            echo "<section>";
            echo "<p>".$hotel->getId()."</p>";
            echo "<img src='".$hotel->getMultimedias()[0]->getUrl()."' width='300px'/>";
            echo "<h3>".$hotel->getCountryId()->getName()."</h3>";
            echo "<p>".$hotel->getPrice()." €</p>";
            echo "</section>";
            echo "</a>";
        }
    ?>

</body>
</html>