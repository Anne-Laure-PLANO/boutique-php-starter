<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 1 exercice 3 - PHP</title>
</head>
<body>
    
<?php 
$priceExcludingTax = 100;
$vat = 20;
$quantity = 3;
?>
<p>Montant de la TVA : <?=$vat ?> pourcents. </p> 

<p>Prix TTC unitaire : <?=$priceExcludingTax *(1+ $vat/100) ?> euros.</p> 
<p>Le total pour la quantité commandée : <?=$quantity * $priceExcludingTax *(1+ $vat/100) ?> euros.</p> 


</body>
</html>