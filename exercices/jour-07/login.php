<?php
session_start();

$BDDUserName= "admin";
$BDDPassword = "1234";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $userName = (htmlspecialchars($_POST["userName"]))??"";
    $password = (htmlspecialchars($_POST["password"]))??"";

    if ($userName===$BDDUserName && $password===$BDDPassword){
        $_SESSION["user"]=$userName;
        header("location:dashboard.php");

        $acces=true;
    } else {
        $acces=false;
        $html2= "<div>
        <h1>Accès refusé</h1>
        <p> Identifiants et mots de passe incorrects, veuillez réessayer.</p>
        </div>";
    }
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
    <form action="" method="POST">
        <div>
            <h1>Se connecter</h1>
            <div>
                <label for="userName"> Identifiant :</label>
                <input type="text" name="userName" id="userName">
            </div>
            <div>
                <label for="password"> Mot de passe :</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Se connecter</button>
        </div>
        <div style="<?=($_SERVER["REQUEST_METHOD"]=="POST")?
            "display:contents": "display:none";?>">
            <?=($_SERVER["REQUEST_METHOD"]=="POST"&& $acces)?"": $html2;?> </div>


    </form>
</body>
</html>

