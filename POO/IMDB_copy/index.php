<?php
include_once "BD_movies.php";
$bd = new BD_movies();

if (isset($_GET["search"])) {
    $allFilms = $bd->selectBySearch($_GET["search"]);
} else {
    $allFilms = $bd->selectAllPeliculas();
}

$bd->closeMySQL();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB</title>

    <script src="https://kit.fontawesome.com/867eec2026.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/lightslider.js"></script>
    <link type="text/css" rel="stylesheet" href="css/lightslider.css" />  
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.png" />
</head>

<body>
    <!-- header -->
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <div class="search_bar">
            <form action="index.php" method="GET">
                <input type="text" name="search">
                <button type="submit" class="btn btn-success transparetn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </nav>

    <section class="all_movies">

        <?php foreach ($allFilms as $film) {?>

        <div class="film_box">
            <a href="singlePage.php?id=<?php echo $film->getId();?>" class="overlay">
                <i class="fas fa-play"></i>
            </a>
            <div class="img_box">
                <img src="img/<?php echo $film->getImagen(); ?>" alt="<?php echo $film->getTitulo(); ?>">
            </div>
            <a href="singlePage.php?id=<?php echo $film->getId();?>">
                <div class="text_box">
                    <span class="puntuacion"><?php echo $film->getValoracion();?></span>
                    <div class="bottom">
                        <div class="movie_name">
                            <span><?php echo $film->getAno(); ?></span>
                            <strong><?php echo $film->getTitulo(); ?></strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
</body>
</html>