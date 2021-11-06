<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){
    $elephantsSorted = $elephants;

    for ($i = 0; $i < count($elephantsSorted); $i++) {
        for ($j = 0; $j < count($elephantsSorted); $j++) {
            if ($elephantsSorted[$j]['number'] > $elephantsSorted[$j+1]['number'] && $elephantsSorted[$j+1]['number'] !== null) {
                $n1 = $elephantsSorted[$j];
                $n2 = $elephantsSorted[$j+1];
                $elephantsSorted[$j] = $n2;
                $elephantsSorted[$j+1] = $n1;
            }
        }
    }
    return $elephantsSorted;
}

function printElephants($elephants) {
    $elephantsSorted = getSortedElephantsByNumber($elephants);

    for ($i = 0; $i < count($elephants); $i++) {
        echo "<tr>";
        echo "<td>".$elephants[$i]['number']."</td>";
        echo "<td>".$elephants[$i]['name']."</td>";
        echo "<td>".$elephants[$i]['species']."</td>";
        echo "<td>".$elephantsSorted[$i]['number']."</td>";
        echo "<td>".$elephantsSorted[$i]['name']."</td>";
        echo "<td>".$elephantsSorted[$i]['species']."</td>";
        echo "</tr>";
    }
}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Elephants (<?php echo count($elephants); ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
        printElephants($elephants);

    ?>
    </tbody>
</table>
</body>
</html>
