<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>age.php</title>
</head>
<body>
    <?php
$tableauAge = [2 , 17, 18, 23, 25, 26, 64, 65, 66];

foreach ($tableauAge as $age) {
    echo "la personne a " . $age . " ans. <br>";

    if ($age>=65) {
        echo "senior <br>";
    } elseif ($age>=26) {
        echo "Adult <br>";
    } elseif ($age>=18) {
        echo "Young adult <br>";
    } else {
        echo "Minor <br>";
    }
     echo "<br>";
}

    ?>

</body>
</html>