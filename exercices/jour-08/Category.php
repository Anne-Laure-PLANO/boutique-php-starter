<?php
class Category{
    private static int $nextId =1;
    private int $id;
    public string $nom;
    public string $description;

    function __construct(string $nom, string $description ){
        $this ->id = self::$nextId++;
        $this->nom = $nom;
        $this->description = $description;
    }
    public function getSlug($text){
        $slug= strtolower($text); #transforme les MAJ en min
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug); #supprime les accents
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug); #supprime les caractères non autorisés
        $slug= str_replace(" ","-",$slug); #remplace les espaces par des tirets
        $slug = trim($slug, '-'); #supprime les tirets en début et fin
        return $slug;
    }
}

$Loisirs= new Category("loisirs", "Super moment de détente trop agréable et bien souvent trop rare");
$Sport= new Category("Sport", "Moment où tu bouges ton corps pour éviter de rouiller!");
$Detente= new Category("Détente", "Et si on faisait une bonne, petite sieste régénérative ?");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Ma catégorie : <?=$Loisirs->nom?> // version slugée : <?=$Loisirs->getSlug($Loisirs->nom)?></p>
    <p>Ma description : <?=$Loisirs->description?> // version slugée : <?=$Loisirs->getSlug($Loisirs->description)?> </p>
    
    <p>Ma catégorie : <?=$Sport->nom?> // version slugée : <?=$Sport->getSlug($Sport->nom)?></p>
    <p>Ma description : <?=$Sport->description?> // version slugée : <?=$Sport->getSlug($Sport->description)?> </p>
    
    <p>Ma catégorie : <?=$Detente->nom?> // version slugée : <?=$Detente->getSlug($Detente->nom)?></p>
    <p>Ma description : <?=$Detente->description?> // version slugée : <?=$Detente->getSlug($Detente->description)?> </p>

</body>
</html>