<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   
   $array = ["Vêtements", "Chaussures", "Accessoires", "Sport"];
   var_dump($array);
   ?>

    <p>Vérification si "Chaussures" existe dans le tableau : <?= in_array("Chaussures", $array)? "Oui !" : "Non..." ; ?></p>
    <p>Vérifie si "Électronique" existe : <?= in_array("Electronique", $array)? "Yess ! " : "Raté..."; ?></p>
    <p>Trouvons l'index de "Sport" : La réponse : <?= array_search("Sport", $array) ?></p>

</body>
</html>