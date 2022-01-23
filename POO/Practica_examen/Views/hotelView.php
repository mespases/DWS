<html>
<head>
    <title>Hotel</title>
</head>
<body>

    <h1>Hotel: <?php echo $one_hotel->getId() ?></h1>
    <?php
        foreach ($one_hotel->getMultimedias() as $multi) {
            echo "<img src='".$multi->getUrl()."' />";
        }
    ?>
</body>
</html>