<?php
require("Product.php");

$Jean = new Product("Jean","Super Jean moulant pour petites pommes.", 39.99 , 20, "pantalon");
$Tshirt = new Product("T-shirt","T-shirt en coton bio très confortable.", 19.99, 50, "haut");
$Veste = new Product("Veste","Veste imperméable idéale pour la mi-saison.", 89.90, 15, "manteau");
$Robe = new Product("Robe","Robe élégante parfaite pour les soirées d'été.", 59.99, 10, "robe");
$Short = new Product("Short","Short léger et respirant pour le sport.", 24.99, 30, "bas");
$catalogue = [$Jean, $Tshirt, $Veste, $Robe, $Short];

#ne fonctionne que pour des tableaux d'objet
function calculeTotalStock(array $produits) : int{
    $total=0;
    foreach($produits as $product){
        $total+= $product->stock;
    }
    return $total;
}

#ne fonctionne que pour des tableaux d'objet
function calculePrixTotal(array $produits) : float{
    $total=0;
    foreach($produits as $product){
        $total+= ($product->price * $product->stock);
    }
    return $total;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Catalogue</h1>
    <div style="display:flex ; flex-wrap:wrap; gap:10px">
        <?php foreach ($catalogue as $product): ?>
            <div style = "padding: 10px;border: 1px solid grey; width:200px; border-radius:20px; background-color: #eee9e9ff">
                <h2><?=$product->name?></h2>
                <p><?=$product->id?></p>
                <p><?=$product->category?></p>
                <p><?=$product->description?></p>
                <p><?=number_format($product->getPriceIncludingTax(20), 2, ",", " ")?>€ TTC</p>
                <?=($product->isInStock())?"<p>En stock (".$product->stock.")</p>":"<p>En rupture </p>";?>
            </div>
        <?php endforeach; ?>

    </div>
    <div>
        <p>Nombre d'article total : <?=$resultat=calculeTotalStock($catalogue)?> articles. </p>
        <p>Prix total : <?=number_format($resultat=calculePrixTotal($catalogue), 2, ",", " ")?>€ </p>

    </div>
</body>
</html>
