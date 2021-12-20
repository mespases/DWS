<?php
include ("BD_movies.php");
$bd = new BD_movies();
session_start();

$num = $bd->getNumeroDePeliculas();

/** Si recibe un numero mayor al de los id de dentro de la bd nos carga el 15 */
if (isset($_GET["id"]) && $_GET["id"] <= $num) {
    $peli = $bd->selectOnePelicula($_GET["id"]);
} else {
    $peli = $bd->selectOnePelicula(15);
}

$_SESSION["film_id"] = $peli->getId();


/** Devuelve una array de 5 peliculas generadas aleatoriamente, funcion para el slider */
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <form action="index.php" method="GET">
                <input type="text" name="search">
                <button type="submit" class="btn btn-success transparetn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="sign_in_a">

            <?php
            if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
                echo "<a href='iniciarSesion.php'>Iniciar Sesión</a>";
            } else {
                echo "<a href='close.php'>Cerrar Sesión</a>";
            }
            ?>

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

    <!-- Slider -->
    <div class="slider">
        <ul id="autoWidth" class="cs-hidden">

            <?php foreach ($slider as $i) {?>
                <li>
                    <div class="film">
                        <a href="singlePage.php?id=<?php echo $i->getId(); ?>"><img src="<?php echo "img/".$i->getImagen(); ?>" alt="<?php echo $i->getTitulo(); ?>" style="width: 300px"></a>
                    </div>
                </li>
            <?php } ?>
            
        </ul>
    </div>

    <section class="comments">
        <h3>Comentarios</h3>

        <?php if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) { ?>
            <form action="#" method="POST">
                <textarea placeholder="Añade un nuevo comentario" rows="4" cols="10" maxlength="255" readonly id="text"></textarea>
                <div class="comment_btn">
                    <div class="puntuation">
                        <i class="fas fa-thumbs-up"></i>
                        <p class="dios"><i class="fas fa-thumbs-down"></i></p>
                    </div>
                    <button>Publicar</button>
                </div>
            </form>
        <?php } else { ?>
            <form action="comentPOST.php" method="POST">
                <textarea placeholder="Añade un nuevo comentario" rows="4" cols="10" maxlength="255" name="coment"></textarea>
                <div class="comment_btn">
                    <button>Publicar</button>
                </div>
            </form>
         <?php } ?>

        <!-- Lista de comentarios -->
        <p>Comentarios más recientes</p>
        <hr/>
        <ul class="comment_list" style="color: white">

            <?php
                foreach ($peli->getComentarios() as $comentario) {
            ?>
            <li>
                <article>
                    <i class="fas fa-user-circle"></i>
                    <div class="text">
                        <h4><?php echo $comentario->getNombre(); ?></h4>
                        <p><?php echo $comentario->getCommentario(); ?></p>
                    </div>
                </article>
            </li>
            <?php } ?>
        </ul>
    </section>

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

      document.getElementById("text").addEventListener('click', function () {
          Swal.fire({
              icon: 'warning',
              title: 'Inicia Sesión',
              text: 'No puedes añadir un comentario sin iniciar sesión',
          })
      })

</script>
<?php $bd->closeMySQL(); ?>
</html>