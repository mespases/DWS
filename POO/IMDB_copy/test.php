<?php

         $host = "localhost";
         $username = "root";
         $password = "";
         $bd_name = "bd_movies";

    $conn = new mysqli($host, $username, $password, $bd_name);

    $query ='INSERT INTO usuarios VALUES (null, "Miguel", "admin@admin.com", "root");';

    if (!mysqli_query($conn, $query)) {
        echo '<script>alert("mal")</script>';
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
