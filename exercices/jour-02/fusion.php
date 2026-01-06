<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$clothes = ["T-shirt", "Jean", "Pull"];
$accessories = ["Ceinture", "Montre", "Lunettes"];

$catalog = array_merge($clothes, $accessories);
var_dump($catalog);
?>
<p>Mon catalogue de vêtements : <?= var_dump($clothes) ?></p>
<p>Mon catalogue d'accessoires : <?= var_dump($accessories) ?></p>
<p>L'ensemble de mes articles : <?= var_dump($catalog) ?></p>
<p>Nombre total de produits : <?= count($catalog) ?></p>
<p>Ajoute un produit au début du tableau : </p>
<?php
array_unshift($catalog, "nouvel article");
var_dump($catalog);
?>
</body>
</html>