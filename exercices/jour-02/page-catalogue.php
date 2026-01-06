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
            ["nomProduit" => "Tarte aux pommes", "image" =>"https://i1.wp.com/www.la-gourmandise-avant-tout.com/wp-content/uploads/2020/11/tarte-aux-pomems-Cedric-Grolet-scaled.jpg?zoom=2&resize=1020%2C600&ssl=1", "description" => "pâte sablée recouverte d'une compotée de pommes et de pommes fraîchement découpées", "prixHT" => 20,50, "stock" => 20, "disponibilite" => true],
            ["nomProduit" => "Brownie", "image" =>"https://images.ricardocuisine.com/services/recipes/496x670_7799.jpg" , "description" => "Succulent gâteau au chocolat et aux noix", "prixHT" => 30,50, "stock" => 10, "disponibilite" => true],
            ["nomProduit" => "Cookies", "image" =>"https://i.notretemps.com/1200x0/smart/2025/04/09/cookie-chocolat-noisette.jpg", "description" => "petits galets de pâte fourrée aux pépites de chocolat", "prixHT" => 15,50, "stock" => 50, "disponibilite" => true],
            ["nomProduit" => "Brioche nature", "image" =>"https://images.getrecipekit.com/20230715085934-adobestock_70173735-min.jpeg?width=650&quality=90&", "description" => "Délicieuse brioche pur beurre cuite au four", "prixHT" => 35,50, "stock" => 10, "disponibilite" => true],
            ["nomProduit" => "Tarte au citron meringuée", "image" =>"https://www.latelierderoxane.com/blog/wp-content/uploads/img_1969-2-787x590.jpg", "description" => "Excellente tarte fournie d'une épaisse couche de citron, elle-même recouverte d'une délicieuse meringue moelleuse", "prixHT" => 40,50, "stock" => 10, "disponibilite" => true],
            ["nomProduit" => "Galette des rois", "image" =>"https://byacb4you.com/wp-content/uploads/2020/01/galette-rois-frangipane.jpg.webp", "description" => "Produit d'exception : délicieuse pâte feuilletée fourrée avec une excellente préparatino à base d'amandes dorées et caramélisées", "prixHT" => 20,50, "stock" => 20, "disponibilite" => true] 
            ]
    ?>
    <div style ="display: flex ; gap : 10px ; flex-wrap : wrap ">
        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[0]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[0]["image"] ?>" alt="<?= $catalogue[0]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[0]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[0]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[0]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>

        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[1]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[1]["image"] ?>" alt="<?= $catalogue[1]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[1]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[1]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[1]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>
        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[2]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[2]["image"] ?>" alt="<?= $catalogue[2]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[2]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[2]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[2]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>

        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[3]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[3]["image"] ?>" alt="<?= $catalogue[3]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[3]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[3]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[3]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>

        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[4]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[4]["image"] ?>" alt="<?= $catalogue[4]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[4]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[4]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[4]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>

        <div style= "display:flex; flex-direction:column; align-items:center ; width : 30% ; background-color : #DDDDDD ; border: 2px solid grey ; border-radius:30px ; padding:10px" >
            <h1 style="text-align:center"> <?= $catalogue[5]["nomProduit"] ?></h1>
            <img style ="width : 80%" src="<?= $catalogue[5]["image"] ?>" alt="<?= $catalogue[5]["nomProduit"] ?>">
            <p style="background-color:#EEEEEE ; padding: 10px ; border-radius:20px"><?= $catalogue[5]["description"] ?></p>
            <p style="color:red ; font-size:1.2REM ; text-align: right ; margin-right : 20px">Prix : <?= $catalogue[5]["prixHT"] ?> €</p>
            <p> Disponibilité : <?= $catalogue[5]["disponibilite"]? "En stock" : "En rupture"; ?> </p>
        </div>

    </div>

</body>
</html>