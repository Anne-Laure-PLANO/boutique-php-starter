<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function greet(){
     echo "Bienvenue sur la boutique !";
}


function getClient($name){
    echo "Bonjour " . $name;
}
    ?>

    <h1><?=greet()?></h1>

    <p><?=getClient("Anne-Laure")?></p>
    <p><?=getClient("Josephine")?></p>
    <p><?=getClient("Martin")?></p>


</body>
</html>