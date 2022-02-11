<html>
<head>
    <title><?php echo $json_api["name"]?></title>
</head>
<style>
    .imgs {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
    img {
        width: 30rem;
    }
</style>
<body>
    <a href="../Controllers/listController.php">Back to list</a>
    <h1><?php echo $json_api["name"] ?></h1>

    <?php
        echo "<div class='imgs'>";
        foreach ($json_api["images"] as $item) {
            echo "<img src='".$item["url"]."' alt='".$json_api["id"]."'/>";
        }
        echo "<p>".$json_api["description"]."</p>";

        echo "</div>";
    ?>
</body>
</html>
