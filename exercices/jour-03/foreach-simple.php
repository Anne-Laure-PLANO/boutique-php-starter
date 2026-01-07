<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $tableau =         ["Anne-Laure", " Louise" , "Jacqueline" , "Thomas" , "Nathan"];
        $compteur = 1;
    ?>
    <ul>
        <?php
foreach ($tableau as $item){
    echo " <li> ". $compteur . " " . $item . "<br>" ;
    $compteur++;
}
?>
</ul>

</body>
</html>