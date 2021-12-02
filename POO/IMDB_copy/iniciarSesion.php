<?php
include_once "BD_movies.php";

$bd = new BD_movies();

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

<body class="sign_in">
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
            <a href="iniciarSesion.php">Iniciar Sesión</a>
        </div>
    </nav>

    <div class="sesion_box">
        <section class="sesion">
            <form action="#" method="GET">
            <p><i class="fas fa-user"></i><input type="email" placeholder="email" name="email"></p>
            <p><i class="fas fa-key"></i><input type="password" placeholder="password" name="password"></p>
                <button type="submit">Iniciar sesión</button>
            </form>
            <?php

                if (isset($_GET["email"])) {
                    $email = $_GET["email"];
                } if (isset($_GET["password"])) {
                    $password = $_GET["password"];
                }

                if (isset($email) && isset($password) && $bd->authentifyUser($email, $password)) {
                    header("Location: index.php");
                } else if (isset($email) && isset($password) && $email != "" && $password != ""){
                    echo "<script>alert('El usuario o contraseña no son correctos')</script>";
                }
            ?>
        </section>
    </div>

</body>
</html>
<?php $bd->closeMySQL(); ?>