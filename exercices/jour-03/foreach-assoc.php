<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $personne = [ "name" => "Anne-Laure", "age" => "20 ans et des brouettes" , "city" => "Grenoble", "job" => "étudiante"] ;
    ?>

<p>
    Who I am : <br>
    <ul>
        <?php
        foreach ($personne as $item => $value) {
            echo "<strong> $item : </strong> " . $value . "<br>";
        }
        ?>

    </ul>

</p>

</body>
</html>