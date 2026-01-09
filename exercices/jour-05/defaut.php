<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

function formatPrice($amount, $currency, $decimals ){
    return number_format($amount, $decimals) . $currency;
}
    ?>

<p>
    formatage de 25.6*17,2 : <?=formatPrice((25.6*17.2), "$", 2);?><br>
    formatage de 99.999 : <?=formatPrice((99.999), "€", 0);?><br>
    formatage de 99.999 : <?=formatPrice((99.999), "$", 2);?>
</p>

</body>
</html>