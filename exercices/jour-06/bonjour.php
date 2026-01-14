<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
  <?php
  #méthode avec isset :
  if (isset($_GET["name"])) {
    $name = $_GET["name"];
  } else {
      $name = "Visiteur"; # -> valeur si nul.
  }

  echo "Bonjour ".$name."<br>";

  #méthode avec ?? :
  $age = $_GET["age"] ?? "60"; #"60" -> valeur si nul.
  
  echo "vous avez " .$age. " ans." 
  ?>
</body>
</html>