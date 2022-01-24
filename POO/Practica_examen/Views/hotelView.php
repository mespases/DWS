<html>
<head>
    <title>Hotel</title>
</head>
<style>
    .fl {
        display: flex;
        flex-wrap: wrap;
    }

    div img {
        height: 100px;
    }

    h3 {
        width: 100%;
    }
</style>
<body>
    <a href="../Controllers/listHotelsController.php" >Volver a la pagina de antes</a>

    <h1>Hotel: <?php echo $one_hotel->getId() ?></h1>
    <div class="fl">
    <?php
        foreach ($one_hotel->getMultimedias() as $multi) {
            echo "<img src='".$multi->getUrl()."' />";
        }
    ?>
        <h3>Propietario
            <?php
                if ($one_hotel->getUser()->getMail() != "-") {
                    echo $one_hotel->getUser()->getMail();
                } else {
                    echo "No tiene propietario";
                }

            ?></h3>

        <?php
            session_start();

            $a = $_SESSION["user"];
            if ($_SESSION["user"] == $one_hotel->getUser()->getId()) {
                echo "<form action='' method='post'>";
                    echo "<input type='submit' value='Vender'>";
                echo "</form>";
            } else if ($_SESSION["user"] != 0){
                echo "<form action='' method='post'>";
                    echo "<input type='submit' value='Comprar'>";
                echo "</form>";
            }
        ?>
    </div>
</body>
</html>