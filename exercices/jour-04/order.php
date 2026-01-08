<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $status = "shipped";
        $class = "";
        $etat = "";

        switch ($status) {
            case "standby" :
                $class = "color: #cc8340ff";
                $etat = "le statut est Standby";
                break;
            case "validated" :
                $class = "color: #2e6e1aff";
                $etat = "le statut est Validated";
                break;
            case "shipped" :
                $class = "color: #5df321ff";
                $etat = "le statut est shipped";
                break;
            case "delivered" :
                $class = "color: #105720ff";
                $etat = "le statut est delivered";
                break;
            case "canceled" :
                $class = "color : #f70707ff";
                $etat = "le statut est canceled";
                break;
        }
    ?>
<div>
    <h1>Statut :</h1>
    <p style = "<?=$class ?>" > Etat : <?=$etat?></p>
</div>


<?php
    $produitVendu = "alimentaire";

    $TVA = match($produitVendu) {
        "electronique" => 20,
        "alimentaire" => 5.5,
        "electromenager" =>10,
        default => "erreur, le produit n'est pas interprété."
    }

?>
<div>
    <h2>Produit vendu :</h2>
    <p>type de produit : <?=$produitVendu?></p>
    <p>TVA concernée : <?=$TVA?></p>

</div>

</body>
</html>