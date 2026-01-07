<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nbArticle =0;
    $catalogue = [
        [
            "name" => "pantalon",
            "image" => "https://vstreet.eu/375-large_default/pantalon-moto-chino-beige-vstreet.jpg",
            "description" => "description du produit.",
            "prix" => 20.00,
            "promo" => 10,
            "stock" => 0
        ],
        [
            "name" => "veste",
            "image" => "https://media.istockphoto.com/id/1152838910/fr/photo/blazer-bleu-fonc%C3%A9-m%C3%A2le-sur-le-fond-isol%C3%A9.jpg?s=612x612&w=0&k=20&c=1A7rDysV6aT-5fd56VSgyzL0tHdUnMYGEiK6-g7iPaQ=",
            "description" => "description du produit.",
            "prix" => 20.00,
            "promo" => 0,
            "stock" => 50
        ],
        [
            "name" => "chemise",
            "image" => "https://produit-pacifique.com/14214-large_default/chemise-hawaienne-bleu-ananas.webp",
            "description" => "description du produit.",
            "prix" => 20.00,
            "promo" => 20,
            "stock" => 50
        ],
        [
            "name" => "chaussures",
            "image" => "https://product-cdn-frz.alltricks.com/large/939/449939/2449939/4693307",
            "description" => "description du produit.",
            "prix" => 50.00,
            "promo" => 0,
            "stock" => 10
        ],
        [
            "name" => "chaussettes",
            "image" => "https://www.funkyfeets.com/cdn/shop/files/Bee-Bee-ManyMornings-57501047.jpg?v=1753053322&width=600",
            "description" => "description du produit.",
            "prix" => 8.00,
            "promo" => 0,
            "stock" => 5
        ],
        [
            "name" => "doudoune",
            "image" => "https://www.m-d-r.com/13968-product_large/doudoune-homme.jpg",
            "description" => "description du produit.",
            "prix" => 150.00,
            "promo" => 15,
            "stock" => 10
        ],
        [
            "name" => "Echarpe",
            "image" => "https://img.loopper.com/resize/storage/webshop/articles/anda/wearables___christmas/68b82cc05a141_740X550.webp?gclid=EAIaIQobChMIg9jU-L35kQMVTqVQBh0lQRDyEAQYBCABEgIFofD_BwE",
            "description" => "description du produit.",
            "prix" => 50.00,
            "promo" => 0,
            "stock" => 100
        ],
        [
            "name" => "Scooter",
            "image" => "https://www.quirumed.com/media/catalog/product/cache/a23985f02189aa18213cbf4c1c4b8fac/F/A/FASTI3MAX0052192_Foto_variante_233ebfe8-5e7c-4271-a3ea-4ba44e390983.jpg",
            "description" => "description du produit.",
            "prix" => 10550.00,
            "promo" => 5,
            "stock" => 2
        ],
        [
            "name" => "VTT",
            "image" => "https://www.staterabikes.fr/thumbnail/e5/11/11/1721315579/644013100-focus-jam-8.9-seitenansicht%20rechts_1920x1920.jpg?ts=1721315581",
            "description" => "description du produit.",
            "prix" => 1550.00,
            "promo" => 15,
            "stock" => 3
        ]
    ]

    ?>

    <h1>Catalogue</h1>
    <div>
        <h2>Nos produits</h2>
        <div style="display:flex ; flex-wrap:wrap ; gap:10px ; align-items:stretch">
            <?php foreach ($catalogue as $item): ?>
                <?php $nbArticle +=1; ?>
                <div style="padding : 10px; min-width:220px; max-width:22%; background-color:#EEEEEE ; border: 1px solid grey ; border-radius:30px">
                    <h3><?= $item["name"]?></h3>
                    <img style="width:100% ; height:180px ; margin:auto ; border : 1px solid #afaeaeff ; object-fit:cover;" src="<?=$item["image"]?>" alt="<?=$item["name"]?>">
                    <p><?= $item["description"] ?></p>
                    <?=($item["stock"]>0)? "<p style=\"color:green\"><b> En Stock </b></p>": "<p style=\"color:red\"><b> En rupture </b></p> ";?>
                    <?= ($item["stock"]<5 && $item["stock"]>0)? "<p style=\"color:blue\"> Vite, plus que ".$item["stock"] . " en stock ! </p>" : "" ; ?>
                    <?php if ($item["promo"]>0):?>
                        <p><s>Prix : <?=number_format($item["prix"], 2, ',', " ")?> €</s></p>
                        <div style="color:red">Promotion exceptionnelle de <?= $item["promo"]?>% !</div>
                        <p><b>Nouveau prix : <?=number_format($item["prix"]*(1+$item["promo"]/100),2 ,',', " ")?> €</b></p>

                    <?php else: ?>
                        <p><b>Prix : <?=number_format($item["prix"],2 ,',', " ")?> €</b></p>
                    <?php endif; ?>
                    <div></div>

                </div>
            <?php endforeach ;?>
        </div>
    </div>
    <p><?=$nbArticle?> articles affichés</p>

</body>
</html>