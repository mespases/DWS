<?php
    session_start();

    echo $_SESSION["loggedIn"];

    if (!$_SESSION["loggedIn"]) {
        header("Location: iniciarSesion.php");
    }
?>

<html>
<head>
    <title>Titulo</title>
</head>
<body>
<h1>Estas logueado</h1>
</body>
</html>
