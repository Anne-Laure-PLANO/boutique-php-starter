<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function e($variable){
    return htmlspecialchars($variable);
}

    ?>
    <form action="" method="post">
        <ul>
            <li><label for="name"> Votre nom : </label>
            <input type="text" id="name" name = "name"  ></li>
            <li><label for="mail">Votre e-mail : </label>
            <input type="email" name = "mail"  id="mail" ></li>
            <li><textarea name="message" name ="message" id="message"  placeholder = "mon message..."></textarea></li>
        </ul>
    <button type="submit" name="button"> Envoyer </button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = e($_POST["name"]);
        $mail = e($_POST["mail"]);
        $message = e($_POST["message"]);
        $messageLength = strlen($message);
        $erreur="";
        
        if (empty($name)){
            $erreur .= "Erreur : votre nom est requis.<br>";
            
        }
        if (empty($mail) && (!filter_var($mail, FILTER_VALIDATE_EMAIL))){
            $erreur .= "Erreur : une adresse mail valide est requise.<br>";
        
        }
        if (empty($message)){
            $erreur .= "Erreur : un message est requis. <br>";
            
        }elseif ($messageLength<10){
            $erreur .= "Erreur : le message doit contenir au minimum 10 caractères. <br>";
        }
        if ($erreur===""){
        echo "name user : " . $name;
        echo "<br>";
        echo "mail user : " . $mail;
        echo "<br>";

        echo "message user : " . $message;
        } else {
            echo "connexion impossible, veuillez recharger la page et recommencer.<br>";
            echo "Erreurs relevées : <br>" .$erreur ;
        }
    }
    ?>

</body>


</html>