<?php
   
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        #On récupère les données utilisateur :
        $name = htmlspecialchars($_POST["username"]);
        $nameAlphaNumerique = ctype_alnum($name);
        $nameLength = strlen($name);
        $mail = htmlspecialchars($_POST["mail"]);
        $password1 = htmlspecialchars($_POST["password1"]);
        $password2 = htmlspecialchars($_POST["password2"]);

        #variables de retour :
        $erreurName = $erreurMail = $erreurPassword = false;

        if (!$nameAlphaNumerique){
            $erreurName .= "Le nom doit comporter uniquement des lettres et des chiffres. <br>";
        }
        if ($nameLength<3 || $nameLength>20){
            $erreurName .= "Le nom doit comporter entre 3 et 20 caractères. <br>";
        }      
        
        if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $erreurMail = "La saisie d'un email valide est requis. <br>";
        }
        
        if($password1 !== $password2 ){
            $erreurPassword .= "Les mots de passe ne correspondent pas. <br>";
        } 
        if (strlen($password1)<8){
            $erreurPassword .= "Le mot de passe doit contenir au minimum 8 caractères. <br>";
        }
        if (!$erreurMail && !$erreurName && !$erreurPassword) {
            $welcome = "Bienvenue " . $name;
        }else {
            $accesRefuse= "Erreur : accès refusé. Veuillez recommencer.<br>";
        }
       
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

        <h1>Créer un compte : </h1>
    <form action="" method="POST">
        <div>
            <label for="username"> Votre pseudo : (3 à 20 caractères) </label>
            <input type="login" name="username" id="username" <?=($_SERVER["REQUEST_METHOD"]=="POST" && !$erreurName)?'value="'.$name.'"':"";?>> <br>
            <?=($_SERVER["REQUEST_METHOD"]=="POST" && $erreurName)? $erreurName:"";?><br>

            <label for="mail"> adresse mail : </label>
            <input type="email" name="mail" id="mail"<?=($_SERVER["REQUEST_METHOD"]=="POST"&& !$erreurMail)?'value="'.$mail.'"':"";?>> <br><br>
                 <?=($_SERVER["REQUEST_METHOD"]=="POST" && $erreurMail)? $erreurMail:"";?><br>

            <label for="password1"> Mot de passe : </label>
            <input type="password" name="password1" id="password1"<?=($_SERVER["REQUEST_METHOD"]=="POST" && !$erreurPassword)?'value="'.$password1.'"':"";?>> <br><br>
                        <?=($_SERVER["REQUEST_METHOD"]=="POST" && $erreurPassword)? $erreurPassword:"";?><br>

            <label for="password2"> Saisissez de nouveau votre mot de passe : </label>
            <input type="password" name="password2" id="password2" <?=($_SERVER["REQUEST_METHOD"]=="POST" && !$erreurPassword)?'value="'.$password2.'"':"";?>> <br><br>
            
            <button type="submit" name="button"> Envoyer </button>
        </div>

    </form>


</body>
</html>