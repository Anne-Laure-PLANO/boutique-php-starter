<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$groceries = [ "pomme", "poire", "banane", "orange", "tomate"];
$totalArticle = count($groceries);

?>

<div>
    <h1>Mes articles </h1>
    <ul>
        <li>Premier article : <?= $groceries[0] ?> </li>
        <li> cinquième article : <?= $groceries[$totalArticle-1] ?> </li>
        <li> Nombre total d'article : <?= $totalArticle ?></li>
            <?= var_dump($groceries); ?>

    </ul>

</div>
<p>Ajout de concombre et salade à la liste, puis suppression du 3ème article (donc le 4ème car le tableau commence par 0) :</p>
<?php
    array_push($groceries, "concombre", "salade");
    echo $groceries[6];
    array_splice($groceries, 3, 1);
    var_dump($groceries);
?>


</body>
</html>