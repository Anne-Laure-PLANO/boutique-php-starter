<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $stock = 10;
    $active = true;
    $promoEndDate = "2026-02-31";
    $statutStock = "";
    $dateJour = date('Y-m-d');
    $etatPromo = "";

    if ($stock >0 && $active) {
        $statutStock = "available ";
        if ($dateJour < $promoEndDate){
            $etatPromo = "en promo";
        }
    } else {
        $statutStock = "out of stock";
    }
    
     
    echo "statut stock : " . $statutStock . "<br>";
    echo "statut promo : " . $etatPromo . "<br>";
?>


</body>
</html>