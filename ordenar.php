<html lang="es">
<head>
    <title>Ordenar</title>
</head>
<body>
    <?php
      function ordenar() {
          $numeros = [2, 7, 5, 3, 4, 6, 8, 1, 9, 42, 32, 21];

          for ($j = 0; $j < count($numeros); $j++) {
              for ($i = 0; $i < count($numeros); $i++ ) {
                      if ($numeros[$i] > $numeros[$i+1] && $numeros[$i+1] != null) {
                          $n1 = $numeros[$i];
                          $n2 = $numeros[$i+1];
                          $numeros[$i] = $n2;
                          $numeros[$i+1] = $n1;
                      }
              }
          }
          foreach ($numeros as $num) {
              echo $num."<br>";
          }
      }

      ordenar();

    ?>
</body>
</html>