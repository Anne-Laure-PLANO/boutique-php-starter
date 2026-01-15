<?php
$pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev", "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

#préparation à l'affichage des produits :
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);


#récupération des boutons produits ajout, modification et suppression :
$modifyProduct = ($_GET["modify"])??false;
$keyModifyProduct = ($_GET["key"])??"";
$deleteProduct = ($_GET["delete"])??"";
$addProduct = ($_GET["addProduct"])??false;

#récupération des catégories nouveau produit :
$addNameProduct = htmlspecialchars(($_POST["newName"])??"");
$addCategoryProduct = htmlspecialchars(($_POST["newCategory"])??"");
$addDescriptionProduct = htmlspecialchars(($_POST["newDescription"])??"");
$addPriceProduct = ($_POST["newPrice"])?? null;
$addStockProduct = htmlspecialchars(($_POST["newStock"])??"");


#récupération des catégories modification produit :
$modifyNameProduct = htmlspecialchars(($_POST["modifyName"])??"");
$modifyCategoryProduct = htmlspecialchars(($_POST["modifyCategory"])??"");
$modifyDescriptionProduct = htmlspecialchars(($_POST["modifyDescription"])??"");
$modifyPriceProduct = ($_POST["modifyPrice"])?? null;
$modifyStockProduct = ($_POST["modifyStock"])??0;


#ajout nouveau produit dans SQL :
if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($addNameProduct) && !empty($addCategoryProduct) && !empty($addDescriptionProduct) &&!empty($addPriceProduct) &&!empty($addStockProduct)){
$stmt = $pdo->prepare("INSERT INTO products (name, price, stock, category, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$addNameProduct, $addPriceProduct, $addStockProduct, $addCategoryProduct, $addDescriptionProduct]);
    header("Location: admin-produits.php");
    exit;
}
# recherche produit à modifier dans sql :
if ($modifyProduct) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id LIKE ?");
    $stmt->execute([$keyModifyProduct]);
    $productToModify = $stmt->fetch(PDO::FETCH_ASSOC);
}
#intégration de la modification produit dans SQL :
if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($modifyNameProduct) && !empty($modifyCategoryProduct) && !empty($modifyDescriptionProduct) &&!empty($modifyPriceProduct) && !empty($modifyStockProduct)){
$stmt = $pdo->prepare("UPDATE products SET name = ? , price = ? , stock= ? , category = ?, description = ? WHERE id = ?");
    $stmt->execute([$modifyNameProduct, $modifyPriceProduct, $modifyStockProduct, $modifyCategoryProduct, $modifyDescriptionProduct, $keyModifyProduct ]);
    header("Location: admin-produits.php");
    exit;
}

#Action Delete :
if (!empty($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$deleteProduct]);
    header("Location: admin-produits.php");
    exit;
}

##Faire des fonctions qu'on appellera quand les boutons seront cliqués
$tableauABoucler = $products;
$rechercheEchec=false;

#récupération des données formulaire pour recherche :
$rName = htmlspecialchars(($_GET["requestName"])??"");
#recherche avec MySQL :
if (!empty($rName)){
    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->execute(["%$rName%"]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        $tableauABoucler = $result;
        $rechercheEchec=false;
    } else {
        $tableauABoucler=$products;
        $rechercheEchec=true; 
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface vendeur</title>
</head>
<body>
    <h1 style="text-align:center">Mon catalogue</h1>
    <main style="display:flex">
        <div class="recherche" style="width:30% ; padding : 10px ; background-color:#dbd6d6ff ;margin-right:5px; border:1px solid grey">
            <form action="" method="get">
                <h2>Recherche :</h2>
                <div>
                    <label for="requestName">Recherche par nom : </label>
                    <input type="text" name="requestName" id="requestName">
                </div>
                <button type="submit">Rechercher</button>
            </form>
            <form <?=($addProduct)?'style="display:contents"':'style="display:none"';?> action="" method="post">
                <h2>Nouveau Produit :</h2>
                <div>
                    <label for="newName">Nom produit : </label>
                    <input type="text" name="newName" id="newName">
                </div>
                <div>
                    <label for="newDescription">Description : </label>
                    <input type="text" name="newDescription" id="newDescription">
                </div>
                <div>
                    <label for="newCategory">Catégorie : </label>
                    <input type="text" name="newCategory" id="newCategory">
                </div>
                <div>
                    <label for="newPrice">Prix : </label>
                    <input type="number"  step="0.01" name="newPrice" id="newPrice">
                </div>
                <div>
                    <label for="newStock">Stock : </label>
                    <input type="number" name="newStock" id="newStock">
                </div>
                <button type="submit">Ajouter</button>
            </form>
            <form <?=($modifyProduct)?'style="display:contents"':'style="display:none"';?> action="" method="post">
                <h2>Modifier un produit :</h2>
                <div>
                    <label for="modifyName">Nom produit : </label>
                    <input type="text" value="<?=$productToModify["name"]?>" name="modifyName" id="modifyName">
                </div>
                <div>
                    <label for="modifyDescription">Description : </label>
                    <input type="text" value="<?=$productToModify["description"]?>" name="modifyDescription" id="modifyDescription">
                </div>
                <div>
                    <label for="modifyCategory">Catégorie : </label>
                    <input type="text" value="<?=$productToModify["category"]?>" name="modifyCategory" id="modifyCategory">
                </div>
                <div>
                    <label for="modifyPrice">Prix : </label>
                    <input type="number" value="<?=$productToModify["price"]?>" step="0.01" name="modifyPrice" id="modifyPrice">
                </div>
                <div>
                    <label for="modifyStock">Stock : </label>
                    <input type="number" value="<?=$productToModify["stock"]?>" name="modifyStock" id="modifyStock">
                </div>
                <button type="submit">Modifier</button>
            </form>
        </div>
        <div>
        <h2>Mes produits:</h2>
        <?=($rechercheEchec)?"<p>produit non trouvé</p>":"";?>

        <button><a href="admin-produits.php?addProduct=true">Ajouter un produit</a></button>
            <div style="display:flex; gap:10px ; flex-wrap:wrap">

                <?php foreach ($tableauABoucler as $item): ?>
                    <div style="width:300px;border:1px grey solid ; border-radius:30px; padding:10px; background-color: #dbd6d6ff">
                        <h3 style="display:inline"><?=$item["name"]?></h3><br>
                        <span><?=$item["description"]?></span><br>
                        <span><?=$item["category"]?></span><br>
                        <span><?=$item["price"]?>€ </span><br>
                        <span><?=($item["stock"])?"En stock (".$item["stock"].")":"En rupture";?></span><br>
                        <button><a href="admin-produits.php?modify=true&key=<?=$item["id"]?>">Modifier le produit</a></button>
                        <button onclick="return confirm('Are you sure you want to delete this item ?');"><a  href="admin-produits.php?delete=<?=$item["id"]?>">Supprimer le produit</a></button>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </main>
</body>
</html>