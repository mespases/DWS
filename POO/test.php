<?php

    $pass = "root";

    echo "</h1>Contraseña normal: ".$pass."</h1>";

    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    echo "<h1>Contraseña cifrada: ".$hash_pass."</h1>";

    if (password_verify($pass, $hash_pass)) {
        echo "hola";
    } else {
        echo "adios";
    }

?>
