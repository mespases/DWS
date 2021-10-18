<html lang="es">
<head>
    <title>Christmas tree</title>
</head>
<body>
<form method="post" action="christmas_tree.php">
    <label>
        Number of flats:
        <input type="text" name="numFlats"/>
    </label>
    <input type="submit"/>
</form>
<div style="background-color: skyblue; display: inline-block;">
    <?php

        function imprime($numero) {
            $espacios = $numero;
            $asteriscos = 1;
            for ($i = 0; $i < $numero; $i++) {
                echo "<br>";

                printEspacios($espacios);
                printAsteriscos($asteriscos);
                printEspacios($espacios);

                $asteriscos += 2;
                $espacios -= 1;
            }
        }

        function printEspacios($espacios) {
            for ($j = 0; $j < $espacios; $j++) {
                echo "<span style='color: skyblue'>*</span>";
            }
        }

        function printAsteriscos($asteriscos) {
            for ($k = 0; $k < $asteriscos; $k++) {
                echo "<span style='color: forestgreen'>*</span>";
            }
        }

        if (isset($_POST["numFlats"])) {
            $num = intval($_POST["numFlats"]);
            imprime($num);
        }
    ?>
    <!--<span style='color: skyblue'>*</span>
        <span style='color: forestgreen'>*</span>-->
</div>
</body>
</html>