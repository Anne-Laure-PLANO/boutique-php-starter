<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
function calculateIncludingTax ($prixExcludingTax, $rate){
    return $prixExcludingTax + $rate;  
}

function calculateVAT ($prixExcludingTax, $rate){
    return $prixExcludingTax*($rate/100);  
}


function calculateDiscount ($price, $percentage){
    return $price*(1-$percentage/100);  
}
?>

<p>calcul de prix : <br>
Calcul TVA (20%) : <?=$TVA= calculateVAT(100, 20);?><br>
Prix TTC (prix HT : 100€) : <?=$prixTTC=calculateIncludingTax(100, $TVA); ?> € <br>
Prix après remise (-10%) : <?= $prixRemise=calculateDiscount($prixTTC, 10);?> €<br>
</p>



</body>
</html>