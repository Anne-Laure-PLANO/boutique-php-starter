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
        [
        "name" => "baskets",
        "description" => "Superbes basket de course ou de rando, on s'en fout.",
        "price" => 28.99,
        "stock" => 20
        ],
        [
        "name" => "T-Shirt",
        "description" => "T-shirt trop de la mode, à porter à l'endroit pour plus de confort.",
        "price" => 18.99,
        "stock" => 10
        ],
        [
        "name" => "Short",
        "description" => "Pantalon raccourcis pour pouvoir montrer vos magnifiques genoux.",
        "price" => 15.99,
        "stock" => 0
        ],
        [
        "name" => "Pantalon",
        "description" => "Pantalon stretch et moulant pour montrer à tout le monde que vous avez un joli boule.",
        "price" => 35.99,
        "stock" => 10
        ],
        [
        "name" => "robe",
        "description" => "Jolie robe rouge taillant aussi bien les hommes que les femmes.",
        "price" => 40.99,
        "stock" => 2
        ]
    ]
?>
<div style = "display:flex ; flex-wrap : wrap ; gap : 10px">
    <?php foreach ($products as $item) :?>
        <div style="padding : 10px; width : 30% ; background-color : #b9b2b2ff ; border: 1px solid grey ; border-radius : 30px" >
            <h2><?=$item["name"] ?></h2>
            <p><?=$item["description"] ?> </p>
            <p><?=$item["price"] ?>€</p>
            <?=($item["stock"]>0 )? "<p style=\"color:green\" >" . $item["stock"] . " article(s) en stock. </p>" : "<p style = \"color: red \"> En rupture. </p>"; ?>

        </div>
    <?php endforeach;?>
</div>

</body>
</html>