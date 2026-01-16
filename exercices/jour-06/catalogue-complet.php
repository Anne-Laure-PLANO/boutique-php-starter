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

$categorie = [];
foreach ($products as $item){
    if (!in_array($item["category"], $categorie)){
        $categorie[]=$item["category"];
    }
}
    $rNom = (isset($_GET["rechercheParNom"]))? htmlspecialchars($_GET["rechercheParNom"]):"";
    $rCategorie = (isset($_GET["rechercheParCategorie"]))? htmlspecialchars($_GET["rechercheParCategorie"]):"";
    $rPrixMin = (isset($_GET["RecherchePrixMin"]))? htmlspecialchars($_GET["RecherchePrixMin"]):"";
    $rPrixMax = (isset($_GET["recherchePrixMax"]))? htmlspecialchars($_GET["recherchePrixMax"]):"";
    $rPrixCroissant = (isset($_GET["prixCroissant"]))? $_GET["prixCroissant"]:"";
    $rPrixDecroissant = (isset($_GET["prixDecroissant"]))? $_GET["prixDecroissant"]:"";
    $rOrdreAZ = (isset($_GET["ordreAZ"]))? $_GET["ordreAZ"]:"";
    $rOrdreZA = (isset($_GET["ordreZA"]))? $_GET["ordreZA"]:"";
    $rPagination = (isset($_GET["pagination"]))? $_GET["pagination"]:"";



$filtered = array_filter($products,function ($item) use ($rCategorie, $rNom){
    if (stripos($item["name"], $rNom)===false)return false;
    if ($rCategorie !==$item["category"])return false;

    return true;
});
var_dump($filtered);
if(!empty($filtered)){
    $tableauABoucler = $filtered;
}else {
    $tableauABoucler = $products;
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
    <main style="display:flex">
        <navFiltrer style="width:30%;padding:10px">
            <h2>Filtre de recherches</h2>
            <form action="" method="GET">
                <div>
                    <label for="rechercheParNom">Recherche par nom :</label><br>
                    <input type="text" value="" name="rechercheParNom" id="rechercheParNom">

                </div>
                <div>
                    <h2>Recherche par catégorie : </h2>    
                    <label for="rechercheParCategorie">Recherche par catégories :</label><br>
                    <select name="rechercheParCategorie">
                        <option value="">--Veuillez sélectionner une catégorie--</option>
                        <?php foreach($categorie as $item):?>
                            <option value="<?=$item?>"><?=$item?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                <h2>Recherche par prix : </h2>   
                    <label for="RecherchePrixMin">Prix min :</label>
                    <input type="number" name="recherchePrixMin" id="RecherchePrixMin" value=""> <br><br>
                    
                    <label for="RecherchePrixMax">Prix max :</label>
                    <input type="number" name="recherchePrixMax" id="RecherchePrixMax" value=""> <br><br>
                    
                    <input type="checkbox" value="prixCroissant" name="prixCroissant" id="prixCroissant">
                    <label for="prixCroissant">Prix croissant </label><br>
                    
                    <input type="checkbox" value="prixDecroissant" name="prixDecroissant" id="prixDecroissant">
                    <label for="prixDecroissant">Prix décroissant</label><br><br>
                    
                    <input type="checkbox" value="ordreAZ" name="ordreAZ" id="ordreAZ">
                    <label for="ordreAZ">Nom A-Z </label><br>
                    
                    <input type="checkbox" value="ordreZA" name="ordreZA" id="ordreZA">
                    <label for="ordreZA">Nom Z-A</label><br><br>
                </div>
                <div>
                    <input type="checkbox" name="pagination" id="pagination" value="10">
                    <label for="pagination"> 10 produits par page </label>
                </div>
                <button type="submit">Rechercher</button>
            </form>

        </navFiltrer>    
        <section>

            <p>X produits trouvés : </p>
            <div style="display:flex ; flex-wrap:wrap; gap:5px">
                <?php foreach ($tableauABoucler as $item):?>
                    <article style="width:20% ; min-width:150px; background-color: #c8c3c3ff;border:1px grey solid ; border-radius:30px; padding:10px ">
                        <h4 style="text-align:center"><?=$item["name"]?></h4>
                        <p><?=$item["category"]?></p>
                        <p><?=$item["price"]?>€</p>
                        <?=($item["inStock"])?"<p style=\"font-weight:bold; text-align:right ; color:green\">En stock</p>":"<p style=\"font-weight:bold ; text-align:right ; color:red\">En rupture </p>"?>
                     
                    </article>
                <?php endforeach?>
            </div>

        </section>
    </main>
</body>
</html>