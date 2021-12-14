<?php
include_once "BD_movies.php";

$bd = new BD_movies();
session_start();

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("Location: index.php");
}

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <form action="#" method="POST">
                <p><i class="fas fa-user"></i><input type="text" placeholder="nombre de usuario" name="nombre"></p>
                <p><i class="fas fa-envelope"></i><input type="email" placeholder="email" name="email"></p>
                <p><i class="fas fa-key"></i><input type="password" placeholder="password" name="password"></p>
                <p><i class="fas fa-key"></i><input type="password" placeholder="confirma tu contraseña" name="password2"></p>
                <button type="submit">Crear cuenta</button>
            </form>
            <?php

                if (isset($_POST["nombre"]) && $_POST["nombre"] != "" &&
                    isset($_POST["email"]) && $_POST["email"] != "" &&
                    isset($_POST["password"]) && $_POST["password"] != "" &&
                    isset($_POST["password2"]) && $_POST["password2"] != "")

                    if ($_POST["password"] == $_POST["password2"]) {
                        $bd->insertUsuario($_POST["nombre"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT));
                        $_SESSION["loggedIn"] = true;
                        $_SESSION["user_id"] = $bd->selectUserId($_POST["email"]);
                        header("Location: index.php");

                    } else {
                        echo "<script>
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Las contraseñas no coinciden',
                            })
                        </script>";
                    }
            ?>
            
        </section>
        <section class="createSesion">
            <p>¿Ya tienes cuenta en MallorcaFilms?</p>
            <a href="iniciarSesion.php">Iniciar sesión</a>
        </section>
    </div>

</body>
</html>
<?php $bd->closeMySQL(); ?>