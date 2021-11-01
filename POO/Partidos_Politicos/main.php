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
        <select name="sorting" class="select">
            <option value="general">Resultados generales</option>
            <option value="provincia">Filtrar por provincia</option>
            <option value="partido">Filtrar por partido</option>
        </select>
        <button class="btn" type="submit">Sort</button>
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
    ?>
    </form>
</header>
<h1 class="titulo_grafico">Resultado elecctoral: <?php if ($prov != "") echo $prov; else if ($part != "") echo $part; else echo "Elecciones Generales"?></h1>
<section class="container_grafico">
    <div class="grafico"></div>
    <!-- Esto se repite por cada partido -->
    <div class="partidos">
        <div class="container_leyenda">
                <span class="leyenda_all">
                    <span style="background-color:var(--color_PP);"></span>
                    <p class="partido">30% PP</p>
                </span>
        </div>
        <div class="container_leyenda">
                <span class="leyenda_all">
                    <span style="background-color: var(--color_vox);"></span>
                    <p class="partido">30% VOX</p>
                </span>
        </div>
        <div class="container_leyenda">
                <span class="leyenda_all">
                    <span style="background-color: var(--color_PSOE);"></span>
                    <p class="partido">40% PSOE</p>
                </span>
        </div>

        <?php

        ?>

        <p class="total">Votos totales: 1000000000</p>
    </div>
</section>
</body>
<style>
    :root {
        --color_PP: #1DB4E8;
        --color_PSOE: #DF0818;
        --color_vox: rgb(4, 122, 4);
    }

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

    .grafico {
        width: 400px;
        height: 400px;
        border-radius: 50%;

        <?php
            $resultXdistrito = $logica->getResultxProvincias($prov);
            echo 'background-image: conic-gradient(#1DB4E8 30%, var(--color_vox) 30% 50%, var(--color_PSOE) 40%);';

        ?>

        box-shadow: 1px 1px 5px 1px rgb(70, 70, 70);
        position: absolute;
    }

    .a {
        background-image: conic-gradient(#1DB4E8 30%,
        var(--color_vox) 30% 60%, var(--color_PSOE) 60% 100%);
    }

    span > span {
        width: 15px;
        height: 15px;
        margin-right: 8px;
        border-radius: 3px;
        background-color: red;
    }

    .partidos {
        margin-left: 440px;
        margin-top: 135px;
        position: absolute
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

    .total {
        color: #fff;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding: 10px;
        border-radius: 3px;
        background-color: rgb(30, 50, 70);
    }

    form, form + select {
        margin-top: 0px;
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

    .select:hover {
        box-shadow: 1px 1px 16px 3px rgb(70, 70, 70), 1px 1px 50px 3px rgb(15, 17, 27);
    }

    .btn:hover {
        box-shadow: 1px 1px 16px 3px rgb(70, 70, 70), 1px 1px 50px 3px rgb(15, 17, 27);
    }
</style>
</html>