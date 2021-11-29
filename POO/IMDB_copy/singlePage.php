<?php
include ("BD_movies.php");
$bd = new BD_movies();
$num = $bd->getNumeroDePeliculas();

if (isset($_GET["id"]) && $_GET["id"] <= $num) {
    $peli = $bd->selectOnePelicula($_GET["id"]);
} else {
    $peli = $bd->selectOnePelicula(15);
}

function randFilms() {
    global $num, $bd;
    $numPeliculas = $num;
    $arr = [];
    $films = [];

    while (count($arr) < 5) {
        $randomNumber = rand(1, intval($numPeliculas["numero"]));
        if (!in_array($randomNumber, $arr)) {
            $arr[] = $randomNumber;
        }
    }



    for ($i = 0; $i < 5; $i++) {
        $films[] = $bd->selectOnePelicula($arr[$i]);
    }

    return $films;
}
$slider = randFilms();
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
            <form action="singlePage.php" method="GET">
                <input type="text" name="id">
                <button type="submit" class="btn btn-success transparetn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </nav>
    <!-- content -->
    <div class="content">
        <div class="trailer">
            <iframe src="<?php echo $peli->getTrailer(); ?>?autoplay=1&mute=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <!-- ?autoplay=1&mute=1 -->
        </div>
        <div class="right">
            <div class="top">
                <img src="<?php echo "img/".$peli->getImagen(); ?>" alt="<?php echo $peli->getTitulo(); ?>">
                <h5><?php echo $peli->getTitulo(); ?> (<?php echo $peli->getAno(); ?>) <i class="fas fa-star amarillo"></i><p class="val w">/10</p><p class="val"><?php echo $peli->getValoracion(); ?><p></h5>
                <p class="line">Genero:</p> <p><?php
                    $elements = count($peli->getGeneros());
                    $count = 0;
                    foreach ($peli->getGeneros() as $genero) {
                        if (++$count == $elements) {
                            echo $genero->getNombre();
                        } else {
                            echo $genero->getNombre().", ";
                        }
                    };?></p>
            </div>
            <hr>
            <div class="bottom">
                <h5 class="white">Director:</h5>
                <h5> <?php
                    $elements = count($peli->getDirectores());
                    $count = 0;
                    foreach ($peli->getDirectores() as $director) {
                        if (++$count == $elements) {
                            echo $director->getNombre();
                        } else {
                            echo $director->getNombre().", ";
                        }
                    };?></h5>
                <h5 class="white">Actores: </h5>
                <h5><?php
                    $elements = count($peli->getActores());
                    $count = 0;
                    foreach ($peli->getActores() as $actor) {
                        if (++$count == $elements) {
                            echo $actor->getNombre();
                        } else {
                            echo $actor->getNombre().", ";
                        }
                    } ;?></h5>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <ul id="autoWidth" class="cs-hidden">

            <?php foreach ($slider as $i) {?>
                <li>
                    <div class="film">
                        <a href="singlePage.php?id=<?php echo $i->getId(); ?>"><img src="<?php echo "img/".$i->getImagen(); ?>" alt="<?php echo $i->getTitulo(); ?>" style="width: 300px"></a>
                    </div>
                </li>
            <?php } ?>
            
        </ul>
    </footer>

</body>
<script>
      $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        auto:true,
        loop:true,
        pauseOnHover: true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        }
    });
  });

</script>
<?php $bd->closeMySQL(); ?>
</html>