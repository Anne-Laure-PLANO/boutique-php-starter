<?php
$name = "My wonderful product";
$price = 50.99;
$stock = true;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $name ?></title>
</head>
<body>
    <h1><?= $name ?></h1>
<p><?=$price?></p>
<span><?=$stock? "En Stock" :"En Rupture";?></span>




</body>
</html>