<?php 
$nom = "Mon produit";
$description = "Ce produit est génial.";
$prixHT = 27;
$TVA = 20;
$stock = true;
$discount = 10;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jour 1 exercice final - PHP </title>
</head>
<body>
    <div style="background-color:#D9D7D7 ; width: 720px ; border-radius:40px ; border : 1px black solid ; margin:10px ; padding : 20px" >
        <h1 style="color:green ; text-align:center ; font-size:40px"><?= $nom?></h1>
        <img style="width:500px ; border-radius:50px ; margin-left : 110px " src="https://img01.ztat.net/article/spp-media-p1/309e037ca1b94cdcb8d7f398f8c940a1/f5ebd7f1cde04ac994e61c99c583c996.jpg?imwidth=1800" alt=<?= $nom ?>>
        <p style="font-size:28px"><?=$description?></p>
        <p style="font-size:25px ; text-align: right ; margin-right : 40px"><?= $stock ? "En stock" : "En rupture";?></p>
        <div style="font-size:38px"><s>prix TTC : <?= number_format($prixHT*(1+$TVA/100), 2, ',')?> €</s></div>
        <div style="color:red ; font-size:25px ; text-align : center">Remise spéciale de <span style="font-size:40px"><?= $discount?> %</span>, soit un prix total de <span style="font-size:40px"><?= number_format(($prixHT*(1+$TVA/100))*(1-$discount/100), 2, ',') ?>€ ! </span></div>
        
    </div>
</body>
</html>