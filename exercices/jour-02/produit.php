<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$product = [
    "name" => "produit 1",
    "description" => "description produit 1",
    "price" => 28.99,
    "stock" => true,
    "category" => "category produit 1",
    "brand" => "brand produit 1",
]

?>

<div>
    <h1><?= $product["name"] ?></h1>
    <p><?= $product["description"] ?></p>
    <p><?= $product["price"] ?></p>
    <p><?= $product["stock"]? "En stock" : "En rupture"; ?></p>
    <p><?= $product["category"] ?></p>
    <p><?= $product["brand"] ?></p>

</div>
<?php
echo $product["dateAdded"] = "2026.01.06";
$product = array_merge($product, ["test" =>"essai"]);
var_dump($product);

echo $product["test"];
?>
<p>Prix promotionnel -10% : <?=round($product["price"] *= (1-10/100), 2) . "€ "?></p>

<p>Tentative d'accès à une clé qui n'existe pas : <?= $product["bla?"]?></p>



</body>
</html>