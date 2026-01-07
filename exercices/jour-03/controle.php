<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $catalogue = [];

        for ($i=0 ; $i<10 ; $i++) {
            $catalogue[$i] = ["name" => "produit " . $i , "stock" => $i*3+1, "prix" => $i*20+10];
        }
        $catalogue[8]["prix"] = 200;
        $catalogue[4]["stock"] = 0;
        $catalogue[9]["stock"] = 0;
        $catalogue[6]["stock"] = 0;


        
    ?>
        <h2>Affichage du tableau entier :</h2>
    <div style="display:flex ; flex-wrap:wrap ; gap : 5px">
        <?php foreach ($catalogue as $item): ?>
            <div style=" padding : 5px ; width:150px ; border : 1px solid black ; border-radius : 20px ; background-color : #73d6b9">
                    <h2><?=$item["name"]?></h2>
                    <p>Prix : <?=$item["prix"] ?> €</p>
                    <p> Stock : <?= $item["stock"] ?> </p>
                </div>
        <?php endforeach; ?> 
    
    </div>
    <h2>Affichage du tableau avec produits en stock :</h2>
        <div style="display:flex ; flex-wrap:wrap ; gap : 5px">
            <?php foreach ($catalogue as $item): ?>
                <?php if ($item["stock"]===0) : continue; ?>
                <?php else : ?>
                <div style=" padding : 5px ; width:150px ; border : 1px solid black ; border-radius : 20px ; background-color : #d66d90">
                        <h2><?=$item["name"]?></h2>
                        <p>Prix : <?=$item["prix"] ?> €</p>
                        <p> Stock : <?= $item["stock"] ?> </p>
                    </div>
                    <?php endif; ?>
            <?php endforeach; ?> 
        
        </div>

    <h2>Affichage du tableau filtré : stock >0 et prix >100€ ; + arrêt de la recherche au 1er produit trouvé :</h2>
    <div style="display:flex ; flex-wrap:wrap ; gap : 5px">
        <?php foreach ($catalogue as $item) : ?>
            <?php if ($item["prix"] >100 && $item["stock"]>0) :?>
                <div style=" padding : 5px ; width:150px ; border : 1px solid black ; border-radius : 20px ; background-color : #9e73d6">
                    <h3><?=$item["name"]?></h3>
                    <p>Prix : <?=$item["prix"] ?> €</p>
                    <p> Stock : <?= $item["stock"] ?> </p>
                </div>
                <?php break; ?>
            <?php else : continue;?>
            <?php endif; ?>
        <?php endforeach; ?> 
    </div>

    <h2>Affiche uniquement les produits en stock et < 100€ :</h2>
    <div style="display:flex ; flex-wrap:wrap ; gap : 5px">
        <?php foreach ($catalogue as $item) : ?>
            <?php if ($item["prix"] >100 && $item["stock"]>0) :?>
                <div style=" padding : 5px ; width:150px ; border : 1px solid black ; border-radius : 20px ; background-color : #d49a69ff">
                    <h3><?=$item["name"]?></h3>
                    <p>Prix : <?=$item["prix"] ?> €</p>
                    <p> Stock : <?= $item["stock"] ?> </p>
                </div>
            <?php else : continue;?>
            <?php endif; ?>
        <?php endforeach; ?> 
    </div>
</body>
</html>