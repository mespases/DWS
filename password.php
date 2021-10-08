<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<style>
    .center {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .title {
        font-size: 2.5em;
        line-height: .6666666667em;
        padding-top: 2.6666666667em;
    }

    .input {
        border-radius: 10px;
        border: 1px solid #000;
    }

    .submit {
        margin-top: 23px;
        height: 35px;
        width: 100px;
        border-radius: 10px;
        border: 1px solid #000;
    }
</style>
<body>
    <form class="center" method="post" action="password.php">

        <h2 class="title">Como de segura es tu password</h2>

        <input class="input" type="password" name="pass"/>
        <input class="submit" type="submit"/>
    </form>
<?php
    // puede comprobar 1000 passwords por segundo
    // Cambiar color de fondo y mostrar un mensaje dependiendo de lo segura que sea la contraseña
    // cada caracter introducido, comprobarlo en ASCII 256 elevado al numero de caracteres

    // pillar contraseña y pasarla a caracteres
    // comprobar que numero en la tabla del ascii es cada caracter y sumarlos

    // < 1.000 -> instant
    // 1.000 - 59.999 -> seg
    // 60.000 - 3.599.999 -> min
    // 3.599.999 - 84.399.999 -> horas
    // 34.000.000 - 2.678.399.999 -> dias
    // 2.678.399.999 ->  meses
    // -> años

    function howTime($pass) {
        // modificar todo
        $longitud = pow(256, strlen($pass));

        if ($longitud < 59999) {
            changeBackground('red');
        } else if ($longitud < 3599999) {
            changeBackground('yellow');
        }
    }

    function parseTime($pass) {
        $longitud = pow(256, strlen($pass));
        $timeSeconds = $longitud/1000;

        if ($timeSeconds < 60) {

        }
    }

    function changeBackground($color) {
        echo "<style type='text/css'>
            body {
            background-color: ".$color.";
            }
        </style>";
    }

    if (isset($_POST["pass"])) {
        $pass = strval($_POST["pass"]);

        howTime($pass);
    }

?>
</body>
</html>