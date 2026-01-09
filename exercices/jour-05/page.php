<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "helpers.php"?>
</head>
<body>
<h1>Catalogue</h1>    
<div style ="display:flex ; flex-wrap : wrap ; gap : 5px">
    <?php foreach ($catalogue as $item):?>
        <div style="width:180px; border : 1px solid black ; border-radius:20px; padding : 10px; background-color: #dad8d8ff">
            <h2><?=$item["name"]?></h2>
            <p> <?=$item["description"]?><br>
            <?= formatPrice($item["prix"],"€"); ?>
            <?php $enStock = isInStock($item["stock"]);?><br>
            <?=($enStock)?"<strong> Disponible (".$item["stock"]. ")</strong>": "<span> En rupture </span>";?>
        </p>

        </div>
    <?php endforeach ?>

</div>

</body>
</html>