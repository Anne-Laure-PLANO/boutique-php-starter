<?php 
session_start();

$_SESSION["visits"] +=1;
$reset=($_GET["destroy"])?? false;
if ($reset){
    $_SESSION["visits"]=0;
    header("location:compteur.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Vous avez visité cette page <?=$_SESSION["visits"]?> fois.</p>
<a href="compteur.php">Rafraichir</a>
<a href="compteur.php?destroy=true">Restart</a>

</body>
</html>