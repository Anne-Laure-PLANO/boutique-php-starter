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
       
        1 =>["name" =>"pantalon"],
        2 =>["name" =>"chaussures"],
        3 =>["name"=>"Veste"],
        4 =>["name"=>"Chaussettes"],
        5 =>["name"=>"T-Shirt"]

    ];
 
    $id = htmlspecialchars(($_GET["id"])?? null);
    $isProductExist = array_key_exists($id, $products);
    ?>
    <div>
        <h1>Produit recherché : <?=($isProductExist)? $products[$id]["name"]: "produit non trouvé";?></h1>
    </div>
</body>
</html>