<html>
<head>
    <title>Lista</title>
</head>
<style>
    .hoteles {
        display: flex;
        flex-direction: column;
        border: 2px solid black;
        margin: 2rem;
        padding: 1rem;
        width: 40rem;
    }

    a {
        color: black;
        text-decoration: none;
    }

    img {
        width: 40rem;
    }
</style>
<body>
    <h1>Lista de todos los hoteles disponibles</h1>
        <?php
        //var_dump($json_list);
            foreach ($json_list as $item) {
                echo "<a href='../Controllers/hotelController.php?id=".$item["id"]."'>";
                echo "<section class='hoteles'>";
                echo "<h2>".$item["name"]."</h2>";
                echo "<img src='".$item["images"][0]["url"]."' alt='".$item["id"]."' />";
                echo "</section>";
                echo "</a>";
            }

        ?>

</body>
</html>