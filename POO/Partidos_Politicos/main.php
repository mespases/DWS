<?php
include ("logica.php");
$logica = new logica();

$provincias = $logica->getProvincias();
$partidos = $logica->getPartidos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elecciónes</title>
</head>
<body>
<header>
    <form action="main.php" method="post">
        <?php

            $sortby = "";
            $part = "";
            $prov = "";

            if (isset($_POST["sorting"])) {
                $sortby = strval($_POST["sorting"]);
            }
            if (isset($_POST["provincia"])) {
                $prov = strval($_POST["provincia"]);
            }
            if (isset($_POST["partido"])) {
                $part = strval($_POST["partido"]);
            }

            if ($sortby != "provincia" && $sortby != "partido") {
                echo '<select name="sorting" class="select" id="selection">';
                echo '<option value="general">Resultados generales</option>';
                echo '<option value="provincia">Filtrar por provincia</option>';
                echo '<option value="partido">Filtrar por partido</option>';
                echo '</select>';
            }

            if ($sortby == "provincia") {
                echo "<select name='provincia' class='select'>";
                for ($i = 0; $i < count($provincias); $i++) {
                    echo "<option value='". $provincias[$i]->getNombre() ."'>". $provincias[$i]->getNombre() ."</option>";
                }
                echo "</select>";

            } else if ($sortby == "partido") {
                echo "<select name='partido' class='select'>";
                for ($i = 0; $i < count($partidos); $i++) {
                    echo "<option value='". $partidos[$i]->getNombre() ."'>". $partidos[$i]->getNombre() ."</option>";
                }
                echo "</select>";
            }
            echo '<button class="btn" type="submit">Sort</button>';


        ?>
    </form>
</header>
<h1 class="titulo_grafico">Resultado elecctoral: <?php if ($prov != "") echo $prov; else if ($part != "") echo $part; else echo "Elecciones Generales"?></h1>

<?php
    $provinciasFilter = $logica->getResultxProvincias($prov);

    if ($prov != "") {
        echo '<section class="container_grafico">';
        echo '<div class="grafico"></div>';
        echo '<div class="content_p">';
        for ($i = 0; $i < count($provinciasFilter); $i++) {
            echo '<div class="partidos">';
            echo    '<div class="container_leyenda">';
            echo        '<span class="leyenda_all">';
            echo            '<span style="background-color:'.$provinciasFilter[$i]->getColor().';"></span>';
            echo            '<p class="partido">'.$provinciasFilter[$i]->getPorcentaje().'% '.$provinciasFilter[$i]->getAcronimo().' | '.$provinciasFilter[$i]->getEscanos().' escaños</p>';
            echo        '</span>';
            echo    '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</section>';

    }

?>

        <?php

        ?>


    </div>
</section>-->
</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: rgb(15, 17, 27);
    }

    .titulo_grafico {
        margin-top: 100px;
        text-align: center;
        color: #fff;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .container_grafico {
        width: 600px;
        height: 550px;
        justify-content: space-around;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
        margin-top: 90px;
    }

    .content_p {
        margin-left: 440px;
        margin-top: 66px;
        position: absolute
    }

    .grafico {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background-image: conic-gradient(
        <?php
        $cont = 0;
        for ($i = 0; $i < count($provinciasFilter); $i++) {
            if ($i == count($provinciasFilter)-1) {
                echo $provinciasFilter[$i]->getColor().' ';
                echo $cont.'% '.$provinciasFilter[$i]->getPorcentaje().'%';
            } else {
                echo $provinciasFilter[$i]->getColor().' ';
                echo $cont.'% '.($provinciasFilter[$i]->getPorcentaje() + $cont).'%,';
            }

            $cont += $provinciasFilter[$i]->getPorcentaje();
        }
        ?>);

        box-shadow: 1px 1px 7px 2px rgb(70, 70, 70);
        position: absolute;
    }

    span > span {
        width: 15px;
        height: 15px;
        margin-right: 8px;
        border-radius: 3px;
        background-color: red;
    }

    .leyenda_all {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .partido {
        color: #fff;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        line-height: 1.6;
    }

    form, form + select {
        margin-top: -86px;
        float: right;
        padding-right: 15px;
    }

    .btn {
        background-color: #fff;
        border: none;
        border-radius: 5px;
        height: 30px;
        width: 75px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        transition-duration: 0.4s;
    }

    .select {
        background-color: #fff;
        border: none;
        border-radius: 5px;
        height: 30px;
        width: 190px;
        margin-right: 10px;
        font-size: 16px;
        cursor: pointer;
        transition-duration: 0.4s;
    }

    .btn:hover, .select:hover {
        box-shadow: 1px 1px 17px 3px rgb(70, 70, 70), 1px 1px 60px 3px rgb(15, 17, 27);
    }
</style>
</html>