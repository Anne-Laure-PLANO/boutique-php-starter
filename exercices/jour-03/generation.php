<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $products = [];
    
    for ($i=0 ; $i<10 ; $i++) {
        $products[$i] = ["name" => "produit ".$i , "prix" => rand(10, 100), "stock" => rand(0, 50)]
    ;}
    var_dump($products);
    ?>
<div style = "display:flex ; flex-wrap:wrap ; gap : 10px">
    <?php foreach ($products as $item): ?>
        <div style="padding : 10px; border: 1px black solid ; background-color :rgba(233, 186, 115, 0.5) ; border-radius:30px; width : 15%">
            <h1><?=$item["name"]?></h1>
            <p> <?=$item["prix"]?> € </p>
            <p> quantité en stock : <?=$item["stock"]?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>