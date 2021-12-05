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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El usuario o la contraseña no son correctos',
        })
    </script>
</body>
</html>