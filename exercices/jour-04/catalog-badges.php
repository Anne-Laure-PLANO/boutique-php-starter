<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$catalogue = [
    [
        "nouveau" => true,
        "name" => "Pantalon",
        "image" => "https://vstreet.eu/375-large_default/pantalon-moto-chino-beige-vstreet.jpg",
        "categorie" => "vêtements",
        "description" => "description du produit.",
        "prix" => 20.00,
        "promo" => 10,
        "stock" => 0
    ],
    [
        "nouveau" => false,
        "name" => "Veste",
        "image" => "https://media.istockphoto.com/id/1152838910/fr/photo/blazer-bleu-fonc%C3%A9-m%C3%A2le-sur-le-fond-isol%C3%A9.jpg?s=612x612&w=0&k=20&c=1A7rDysV6aT-5fd56VSgyzL0tHdUnMYGEiK6-g7iPaQ=",
        "categorie" => "vêtements",
        "description" => "description du produit.",
        "prix" => 20.00,
        "promo" => 0,
        "stock" => 50
    ],
    [
        "nouveau" => true,
        "name" => "Chemise",
        "image" => "https://produit-pacifique.com/14214-large_default/chemise-hawaienne-bleu-ananas.webp",
        "categorie" => "vêtements",
        "description" => "description du produit.",
        "prix" => 20.00,
        "promo" => 20,
        "stock" => 50
    ],
    [
        "nouveau" => false,
        "name" => "Chaussures",
        "image" => "https://product-cdn-frz.alltricks.com/large/939/449939/2449939/4693307",
        "categorie" => "chaussures",
        "description" => "description du produit.",
        "prix" => 50.00,
        "promo" => 0,
        "stock" => 10
    ],
    [
        "nouveau" => false,
        "name" => "Chaussettes",
        "image" => "https://www.funkyfeets.com/cdn/shop/files/Bee-Bee-ManyMornings-57501047.jpg?v=1753053322&width=600",
        "categorie" => "accessoires",
        "description" => "description du produit.",
        "prix" => 8.00,
        "promo" => 0,
        "stock" => 5
    ],
    [
        "nouveau" => false,
        "name" => "Doudoune",
        "image" => "https://www.m-d-r.com/13968-product_large/doudoune-homme.jpg",
        "categorie" => "vêtements",
        "description" => "description du produit.",
        "prix" => 150.00,
        "promo" => 15,
        "stock" => 10
    ],
    [
        "nouveau" => true,
        "name" => "Echarpe",
        "image" => "https://img.loopper.com/resize/storage/webshop/articles/anda/wearables___christmas/68b82cc05a141_740X550.webp?gclid=EAIaIQobChMIg9jU-L35kQMVTqVQBh0lQRDyEAQYBCABEgIFofD_BwE",
        "categorie" => "accessoires",
        "description" => "description du produit.",
        "prix" => 50.00,
        "promo" => 0,
        "stock" => 0
    ],
    [
        "nouveau" => false,
        "name" => "Collier",
        "image" => "https://www.rivluxe.fr/cdn/shop/files/2220392CN01_963838b2-85d9-4ee6-9a88-6aebb0bd8cad.jpg?v=1761394888",
        "categorie" => "accessoires",
        "description" => "description du produit.",
        "prix" => 350.00,
        "promo" => 5,
        "stock" => 2
    ],
    [
        "nouveau" => true,
        "name" => "Montre",
        "image" => "https://www.3suisses.fr/media/produits/lotus-montres/img/montre-homme-lotus-18938-1-bracelet-acier-argent_3606682_1140x1140.webp",
        "categorie" => "accessoires",
        "description" => "description du produit.",
        "prix" => 10550.00,
        "promo" => 15,
        "stock" => 3
    ]
];
    ?>

    <?php
        $countRupture=0;
        $countPromo=0;
        foreach ($catalogue as $item){
            if ($item["promo"]>0){
                $countPromo +=1;
            }
            if ($item["stock"]===0){
                $countRupture +=1 ;
            }
        }
        echo "<p>nombre d'articles en promotion : " .$countPromo ."</p>";
        echo "<p>nombre d'articles en rupture : " .$countRupture . "</p>";

        ?>
<div style="display:flex ; flex-wrap:wrap ; gap : 10px">

    <?php foreach ($catalogue as $item):?>
        <div style="border :1px solid black ; background-color:#EEEEEE ; width:200px"  >
            <h3><?=$item["name"]?></h3>
            <p><?=($item["stock"]>0)?"Stock : ". $item["stock"] : "En rupture";?></p>
            <?= ($item["nouveau"])?"<button> nouveau </button>" :"";?>
            <?= ($item["promo"]>0)? "<button> en solde !</button>":"";?>
            <?= ($item["stock"]<5 && $item["stock"]!==0)? "<button> dernier (". $item["stock"] ."</button>":"";?>
            <?= ($item["stock"]===0)? "<button>En rupture</button>":"";?>

            <img style = "width : 80%; margin : 10%" src="<?=$item["image"]?>" alt="image de <?=$item["name"]?>">
            <p><?=$item["description"]?></p>
            <p><?=number_format($item["prix"], 2, ",", " ")?> €</p>
            <?php if ($item["promo"]>0): ?>
                <p>PROMO : - <?=$item["promo"]?>% !</p>
                <p>nouveau prix : <?=number_format($item["prix"]*(1-$item["promo"]/100), 2, ",", " ")?> €</p>
            <?php endif ?>
            <button <?=($item["stock"]===0)?"style=\"background-color: #adaaaaff\" :disabled ": "style=\"background-color: #df6565ff\"";?>> Ajouter au panier </button>
        </div>

    <?php endforeach      ?>      
</div>

</body>
</html>