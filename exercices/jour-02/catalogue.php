<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$products = [
    [ "name" => "brouette", "price" => 250,"stock" => 20 ],
    [ "name" => "pelle", "price" => 60,"stock" => 40 ],
    [ "name" => "rateau", "price" => 40,"stock" => 10 ],
    [ "name" => "pioche", "price" => 30,"stock" => 25 ],
    [ "name" => "paire de gants", "price" => 10,"stock" => 54 ]
];

?>
<p>Mon tableau : <br>
<?= var_dump($products) ?></p>
<p>Prix du premier produit : <?= $products[0]["price"] ?></p>
<p>Mon dermier produit est : <?= $products[count($products)-1]["name"] ?> stock du dernier produit : <?= $products[count($products)-1]["stock"] ?> </p>

<p>Ajout de produit au stock du 2ème produit (indice 1) : + 10 produits : <br>
Le stock de mon produit est initialement de : <?= $products[1]["stock"] ?> ; il passe à : <?= $products[1]["stock"] +=10 ; ?>
</p>


</body>
</html>