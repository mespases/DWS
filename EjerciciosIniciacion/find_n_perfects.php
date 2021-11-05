<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfects.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function getDivisors($num){
        $divisors = Array();
        for ($i=1; $i<$num; $i++) {
            if ($num%$i == 0 || $num != $num) {
                $divisors[] = $i;
            }
        }
        return $divisors;
    }

    function isPerfectNum($num){
        $divisors = getDivisors($num);

        if (array_sum($divisors) == $num) {
            return true;
        }
        return false;
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        $n = 1;

        for ($i = 0; $i < $num; $i++) {
            while (!isPerfectNum($n)) $n++;

            echo $n."<br>";
            $n++;
        }
    }
    ?>
</div>
</body>
</html>