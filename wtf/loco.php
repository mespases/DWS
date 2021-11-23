<html>
<header>
    <title>Me cago en dios</title>
</header>
<body>
<?php
    $arr = [1,2,3,4,5];

    for ($i = 0; $i < count($arr); $i++) {
        echo '<p>casa '.$arr[$i].'</p>';
        echo '<a href="loco2.php?id='.$arr[$i].'">aqui</a><br><br>';
    }
?>

</body>
</html>
