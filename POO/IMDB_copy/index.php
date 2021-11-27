<?php
//include ("BD_movies.php");
//$bd = new BD_movies();
//$peli = $bd->selectOnePelicula(11);
//$bd->closeMySQL();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB</title>

    <script src="https://kit.fontawesome.com/867eec2026.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: rgb(24 24 24);
        }

        header {
            background-color: #100f0d;
        }

        .transparetn {
            background-color: transparent;
            color: white;
            border: none;
        }
        
        .amarillo {
            color: yellow;
        }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            <form action="singlePage.php" method="GET">
                <input type="text">
                <button type="submit" class="btn btn-success transparetn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </header>

    <!-- content -->
    <div class="content">
        <div class="trailer">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/EIyZqNbZQI8?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
        </div>
        <div class="right">
            <div class="top">
                <img src="img/joker-790658206-mmed.jpg" alt="joker">
                <h5>Joker (2019) 8.4<i class="fas fa-star amarillo"></i></h5>
                <p>Genero: Thriller, Aventura</p>
            </div>
            <hr>
            <div class="bottom">
                <h5 class="negrita">Director:</h5><h5> Tomeu el del pueblo</h5>
                <h5 class="negrita">Actores: </h5><h5>Actor romeo santos, julieta venega</h5>
            </div>
        </div>

    </div>



</body>
</html>