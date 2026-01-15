<?php
#appel de la BDD :
$pdo = new PDO(
    "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
    "dev", 
    "dev",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

#préparation à l'affichage des produits :
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

#récupération des données formulaire :
$rName = htmlspecialchars(($_GET["requestName"])??"");

#recherche avec MySQL :
$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(["%$rName%"]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


#avec PHP :
// if (!empty($rName)){
//     $resultatRecherche=[];
//     foreach ($products as $item){
//         if(stripos($item["name"], $rName)!== false){ #!==false car stripos peut retourner 0 si la chaine commence au début
//             $resultatRecherche[] = $item;
//         }
//     }
// }

if(!empty($result)){
    $tableauABoucler = $result;
    $rechercheEchec=false;
} else {
    if (!empty($rName)){
        $rechercheEchec=true;
    }else {
        $resultatRecherche=false;
    }
    $tableauABoucler=$products;
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
    <h1 style="text-align:center">Mon catalogue</h1>
    <main style="display:flex">
        <div class="recherche" style="width:25% ; padding : 10px;background-color:#dbd6d6ff ;margin-right:5px; border:1px solid grey">
            <h2>Recherche :</h2>
            <form action="" method="get">
                <div>
                    <label for="requestName">Recherche par nom : </label>
                    <input type="text" name="requestName" id="requestName">
                </div>
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div>
        <h2>Mes produits:</h2>
            <?=($rechercheEchec)?"<p>produit non trouvé</p>":"";?>
            <div style="display:flex; gap:10px ; flex-wrap:wrap">
                <?php foreach ($tableauABoucler as $item): ?>
                    <div style="width:200px;border:1px grey solid ; border-radius:30px; padding:10px; background-color: #dbd6d6ff">
                        <h3><?=$item["name"]?></h3>
                        <p>
                            <?=$item["description"]?><br>
                            <?=$item["category"]?><br>
                            <?=$item["price"]?>€ <br>
                            <?=($item["stock"])?"En stock (".$item["stock"].")":"En rupture";?>
                        </p>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </main>
</body>
</html>