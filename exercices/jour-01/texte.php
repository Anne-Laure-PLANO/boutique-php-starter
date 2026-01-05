<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jour 1 exercice 5 - PHP </title>
</head>
<body>

<?php
$brand = "Nike";
$model = "Air Max";
?>

<p>Affichage avec concaténation : <br>
<?php echo "Chaussures " . $brand ." ". $model; ?>
</p>

<p>Affichage avec interpolation : <br>
<?php echo "Chaussures {$brand} {$model}"; ?>
</p>

<p>Affichage avec sprintf() : <br>
<?php echo sprintf("Chaussures %s %s", $brand, $model);
?>
</p>

<?php
$price = 99.99;
echo "Prix : $price €";  // Que s'affiche-t-il ?  => le prix apparaît
echo 'Prix : $price €';  // Et là ? => la variable n'est pas remplacée par sa valeur. La raison : l'utilisation de ' au lieu de "
?>

</body>
</html>