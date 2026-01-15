<?php 
session_start(); 
$username= ($_SESSION["user"])??"";

if (!$username){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>Bonjour <?=$username?></h1>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>