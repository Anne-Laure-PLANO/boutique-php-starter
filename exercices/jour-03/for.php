<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Affiche les nombres de 1 à 10 avec la boucle For :
    <?php
    for ($i=1 ; $i<=10 ; $i++) {
        echo $i . "  ";
    }
    ?>
    </p>

    <p>Affiche les nombres pairs de 2 à 20  avec la boucle For :
    <?php
    for ($i=2 ; $i<=20 ; $i +=2) {
        echo $i . "  ";
    }
    ?>
    </p>

    <p>Affiche un compte à rebours de 10 à 0 avec la boucle For :
    <?php
    for ($i=10 ; $i>=0 ; $i--) {
        echo $i . "  ";
    }
    ?>
    </p>

    <p>Crée une table de multiplication (de 1 à 10) pour le nombre 7 :<br>
    <?php
    for ($i=0 ; $i<=10 ; $i++) {
        echo $i . " x 7 = " . $i*7 . "<br>";
    }
    ?>
    </p>
</body>
</html>