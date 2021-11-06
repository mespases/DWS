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

    .mesage {
        margin-top: 60px;
        padding: 12px;
        border: 4px solid #00000026;
    }
</style>
<body>
    <form class="center" method="post" action="password.php">

        <h2 class="title">Como de segura es tu password</h2>

        <input class="input" type="password" name="pass"/>
        <input class="submit" type="submit"/>
    </form>
<?php

    function diccionario() {
        return $diccionarioPasswords = ["123456", "123456789", "111111", "password", "qwerty", "abc123", "12345678", "password1", "1234567", "123123", "1234567890", "000000",
            "12345", "iloveyou", "1q2w3e4r5t", "1234", "123456a", "qwertyuiop", "monkey", "123321", "a123456789", "love12", "batman", "internet", "pokemon", "212121",
            "qweasdzxc", "letmein", "secrert", "xxxxxx", "00000", "valentina", "a1b2c3", "741852963", "austin", "monica", "qaz123", "love1", "loveu", "music1", "jessie",
            "246810", "midnight", "manchester", "9876543210", "december", "booboo1", "shorty1", "12345abc", "sweety", "hardcore", "cowboys", "sydney", "alex", "scorpio",
            "1234512345", "qq12345", "qq123456", "onelove", "bond007"];
    }

    function respuesta($pass) {
        $longitud = pow(256, strlen($pass));
        $timeSeconds = $longitud/1000;
        $dicc = diccionario();

        if ($timeSeconds < 60 || in_array($pass, $dicc)) {
            setBackground("#E74C3C");
            echo "<h2 class='center mesage'>Instant</h2>";
        } else if ($timeSeconds < 3600) {
            $min = intval($timeSeconds/60);
            setBackground("#DC7633");
            echo "<h2 class='center mesage'>".$min." min</h2>";
        } else if ($timeSeconds < 216000) {
            $horas = intval(($timeSeconds/60)/60);
            setBackground("#F4D03F");
            echo "<h2 class='center mesage'>".$horas." horas</h2>";
        } else if ($timeSeconds < 5184000) {
            $dias = intval((($timeSeconds/60)/60)/24);
            setBackground("#F5B041");
            echo "<h2 class='center mesage'>".$dias." dias</h2>";
        } else if ($timeSeconds < 160704000) {
            $meses = intval(((($timeSeconds/60)/60)/24)/31);
            setBackground("#2980B9");
            echo "<h2 class='center mesage'>".$meses." meses</h2>";
        } else {
            $years = intval((((($timeSeconds/60)/60)/24)/31)/12);
            setBackground("#27AE60");
            echo "<h2 class='center mesage'>".$years." años</h2>";
        }

        if (in_array($pass, $dicc)) {
            echo "<p class='center'>Esta contraseña se encuentra dentro de las 100 contraseñas mas usadas</p>";
        }
    }

    function setBackground($color) {
        echo "<style type='text/css'>
            body {
            background-color: ".$color.";
            }
        </style>";
    }

    if (isset($_POST["pass"])) {
        $pass = strval($_POST["pass"]);

        respuesta($pass);
    }

?>
</body>
</html>