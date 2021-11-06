<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="find_n_primes.php">
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
        for ($i=1; $i<=$num; $i++) {
            if ($num%$i == 0) {
                $divisors[] = $i;
            }
        }
        return $divisors;
    }

    function isPrimeNum($num){
        if(getDivisors($num) == 2) {
            return True;
        }
        // Esto seria lo mismo pero en una sola line
        //return count(getDivisors($num) == 2);
        return False;
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE
        $i = 0;
        $primers = Array();

        while (count($primers) > $num) {
            $i++;
            if (isPrimerNum($i)) {
                $primers[] = $i;
            }
        }
        echo "First".$num." prime numbers are<br>";
        foreach ($primers as $primer) {
            echo $primer."<br>";
        }
    }
    ?>
</div>
</body>
</html>