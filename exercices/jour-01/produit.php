<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 1 exercice 1 - PHP </title>
</head>
<body>
    


<?php 
$name = "Bottes d'hiver";
$price = 79.99;
$stock = 25;
$onSale = true; ?>

<?php echo "variable name : " ;
var_dump($name);?> <br> 

<?php echo "variable price : " ;
var_dump($price);
 ?><br>

<?= "variable on stock : " ;
var_dump($stock); ?><br>

<?php echo "variable on sale : " ;
var_dump($onSale);
?><br>
<?php echo "Le produit ". $name . " coûte " . $price . " euros.";
?>

</body>
</html>