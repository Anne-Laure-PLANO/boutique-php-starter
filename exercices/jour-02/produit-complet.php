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
        "name" => "blabla",
        "images" => ["https://www.zalando.fr/adidas-originals-campus-00-s-unisex-baskets-basses-dark-greenoff-white-ad115o1il-m11.html", "https://www.histoiredor.com/dw/image/v2/BCQS_PRD/on/demandware.static/-/Sites-THOM_CATALOG/default/dwfb362d27/images/13660075277-master_HO.jpg?sw=1024&sh=1024", "https://www.abatella.com/wp-content/uploads/2025/12/kf-S4bb4f36e5fbd4975b89fe8b30abc11cdz.webp"],
        "sizes" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Mell Finne", "rating" => 2, "comment" => "Produit très réussi, finitions impeccables."],
            ["author" => "Mister P", "rating" => 3, "comment" => "J'ai rarement vu un produit d'une qualité si exceptionnelle."],
            ["author" => "Dolores Ombrage", "rating" => 4, "comment" => "Un pur produit conforme à mes attentes."]
        ]
    ];
?>
<p>Affiche  : <br>
La deuxième image : <img style="width:200px" src="<?= $product["images"][1] ?>" alt="2ème image"> <br>
Le nombre de tailles disponibles : <?= count($product["sizes"]) ?> <br>
La note du premier avis : <?= $product["reviews"][0]["rating"] ?>

</p>
</body>
</html>