<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 0;
        $b = "";
        $c = null;
        $d = false;
        $e = "0";
$tableauValeur = [
    "0" => 0 ,
     "\"\"" => "" , 
     "null" => null , 
     "false" => false ,
     "\"0\"" => "0"
     ];

foreach ($tableauValeur as $key => $value) {
$result = ($a == $value);
$result2 = ($a === $value);

var_dump("comparaison avec double égal de 0 et " . $key . " : " . $result . "." );
echo "<br>";

var_dump("comparaison avec triple égal de 0 et " . $key . " : " . $result2. ".");
echo "<br><br>";
}

    
?>


</body>
</html>