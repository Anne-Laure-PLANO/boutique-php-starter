<?php
$products = [
    [
        "name" => "Ordinateur portable",
        "price" => 899.99,
        "category" => "Informatique",
        "inStock" => true
    ],
    [
        "name" => "Souris",
        "price" => 19.99,
        "category" => "Informatique",
        "inStock" => true
    ],
    [
        "name" => "Clavier",
        "price" => 49.99,
        "category" => "Informatique",
        "inStock" => false
    ],
    [
        "name" => "Écran 24 pouces",
        "price" => 179.99,
        "category" => "Informatique",
        "inStock" => true
    ],
    [
        "name" => "Casque audio",
        "price" => 59.99,
        "category" => "Audio",
        "inStock" => true
    ],
    [
        "name" => "Enceinte Bluetooth",
        "price" => 89.99,
        "category" => "Audio",
        "inStock" => false
    ],
    [
        "name" => "Smartphone",
        "price" => 699.99,
        "category" => "Téléphonie",
        "inStock" => true
    ],
    [
        "name" => "Coque téléphone",
        "price" => 14.99,
        "category" => "Accessoires",
        "inStock" => true
    ],
    [
        "name" => "Chargeur USB",
        "price" => 24.99,
        "category" => "Accessoires",
        "inStock" => false
    ],
    [
        "name" => "Tablette",
        "price" => 329.99,
        "category" => "Téléphonie",
        "inStock" => true
    ],
    [
        "name" => "Imprimante",
        "price" => 149.99,
        "category" => "Bureautique",
        "inStock" => true
    ],
    [
        "name" => "Scanner",
        "price" => 129.99,
        "category" => "Bureautique",
        "inStock" => false
    ],
    [
        "name" => "Webcam",
        "price" => 39.99,
        "category" => "Informatique",
        "inStock" => true
    ],
    [
        "name" => "Disque dur externe",
        "price" => 99.99,
        "category" => "Stockage",
        "inStock" => true
    ],
    [
        "name" => "Clé USB",
        "price" => 12.99,
        "category" => "Stockage",
        "inStock" => false
    ]
];

# Préparation d'un tableau de catégories pour liste de sélection:
$categorie=[];
foreach ($products as $item){
    if (!in_array($item["category"], $categorie)){
        $categorie[]= $item["category"];
    }
}

# On détermine le prix le plus élevé du catalogue :
$prixMax=0;
foreach($products as $item){
    if($item["price"]>$prixMax){
        $prixMax=(number_format($item["price"]/10, 0))*10;
    }
}

# On détermine le plus petit prix du catalogue:
$prixMin=$prixMax;
foreach($products as $item){
    if($item["price"]<$prixMin){  
        $prixMin=(number_format($item["price"]/10, 0))*10;
    }
}

$barreRecherche = $categorieRecherche = $prixMaxRecherche = $enStockRecherche="";
#Récupération des valeurs du formulaire :
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if (isset($_GET["barreRecherche"])){
        $barreRecherche = htmlspecialchars($_GET["barreRecherche"]);
    }
    if (isset($_GET["categorie"])){
        $categorieRecherche = $_GET["categorie"];
    }
    if (isset($_GET["prixMax"])){
        $prixMaxRecherche = $_GET["prixMax"];
    }
    if (isset($_GET["inStock"])){
        $enStockRecherche = $_GET["inStock"];
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Recherche produits :</h2>
        <form action="" method="GET">
            <div>
                <label for="barreRecherche"> Recherche par nom : </label>
                    <input type="text" name="barreRecherche" id="barreRecherche" value="<?=($_SERVER["REQUEST_METHOD"]=="GET")? $barreRecherche:"";?>">
            </div>    
            <div>
                <label for="categorie"> Recherche par catégorie : </label>
                <select name="categorie" id="categorie">
                    <option value="">--Please choose an option--</option>
                    <?php foreach ($categorie as $item):?>
                        <option value="<?=$item?>" <?=($_SERVER["REQUEST_METHOD"]=="GET" && $categorieRecherche===$item)?"selected":"";?> ><?=$item?></option>
                    <?php endforeach ?>
                </select>   
            </div>
            <div>
                <label for="prixMax"> Filtre par prix max : </label>
                <input type="number" name="prixMax" value="<?=($_SERVER["REQUEST_METHOD"]==="GET"&& $prixMaxRecherche)? $prixMaxRecherche:"";?>" step="10" min="<?=$prixMin?>" max="<?=$prixMax?>" id="prixMax">
            </div>            
            <div>
                <label for="inStock">Filtre par stock : </label>
                <input type="checkbox" name="inStock" id="inStock" <?=($_SERVER["REQUEST_METHOD"]=="GET"&& $enStockRecherche)?"checked":"";?>>
            </div>
            <button type="submit">Envoyer</button>
        </form>
</body>
</html>