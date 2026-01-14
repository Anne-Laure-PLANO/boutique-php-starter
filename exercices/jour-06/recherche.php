<?php
    $products=["pomme", "banane", "poire", "prune", "avocat", "saumon", "salade", "olive", "tomate","courgette"];

    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        if (isset($_GET["barreRecherche"])){
        $recherche = htmlspecialchars($_GET["barreRecherche"]);
        foreach($products as $item){
            if (preg_match("/".$item."/", $recherche)){
                $produitRecherche = $item;
                break;
            }else {
                $produitRecherche = "produit non trouvé";
            }
        }
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
    <form action="" method="GET">
        <div>
            <label for="recherche">Saisissez le produit recherché : </label>
            <input type="text" name="barreRecherche" id="recherche">
            <button type="submit">Rechercher</button>
        </div>

    </form>
    <?php if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["barreRecherche"])):?>

    <div>
        <h3>Résultat de la recherche :</h3>
        <p><?= $produitRecherche ?> </p>
    </div>
    <?php endif ?>
</body>
</html>