<html lang="es">
<head>
    <title>Ordenar</title>
</head>
<body>
    <?php
      function ordenar() {
          $numeros = [2, 7, 5, 3, 4, 6, 8, 1, 9, 42, 32, 21, 0];

          // Recorre el array
          for ($j = 0; $j < count($numeros); $j++) {
              // Aseguramos que este ordenado
              for ($i = 0; $i < count($numeros); $i++ ) {
                  // numeros[$i] = 7 > $numeros[$i+1] = 5 y       0 y null es lo mismo !==
                  // $numeros[$i+1] = 21 != null
                      if ($numeros[$i] > $numeros[$i+1] && $numeros[$i+1] !== null) {
                          $numeroGrande = $numeros[$i];
                          $numeroPeque = $numeros[$i+1];
                          $numeros[$i] = $numeroPeque;
                          $numeros[$i+1] = $numeroGrande;
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