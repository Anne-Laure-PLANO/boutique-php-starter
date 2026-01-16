<?php

class Category {
    private static int $autoIncrement = 1; #PRIVATE : permet la modification en interne de la class de la variable.
    public readonly int $id; # readonly : attribut qui permet uniquement la lecture, mais pas la modification de la variable.
    public static array $arrayCategory =[]; # tableau relevant les noms des Category créées, pour pouvoir boucler dessus pour l'affichage.
    
    public function __construct(
        public string $name 
        ) {
        $this->id = self::$autoIncrement++;
        self::$arrayCategory[] = $this; # chaque objet créé est placé dans un tableau présent dans la classe.
    }
    
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }
     
}


class Product {
    public static array $arrayProducts = [];
    
    public function __construct(
        private string $name,
        private float $price,
        private Category $category // Relation !
    ) {
        self::$arrayProducts[] = $this;
    }
    
    public function getName(): string {
        return $this->name;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getCategory(): Category
    {
        return $this->category;
    }
}

$clothes = new Category("Vêtements");
$informatique = new Category("Informatique");
$electromenager = new Category("Electroménager");

$tshirt = new Product("T-shirt", 29.99, $clothes);
$laveVaisselle = new Product("Lave-vaisselle", 200, $electromenager);
$ordinateur = new Product("Ordinateur portable", 900, $informatique);
$imprimante = new Product("Imprimante Jet d'Encre", 150, $informatique);
$pantalon = new Product("Pantalon Stretch", 39.99, $clothes);

// #Version moche, longue et pénible, surtout si 200 produits :
// // echo $tshirt->getCategory()->getName(); // "Vêtements"
// // echo $imprimante->getCategory()->getName(); // "Vêtements"
// // echo $laveVaisselle->getCategory()->getName(); // "Vêtements"
// // echo $pantalon->getCategory()->getName(); // "Vêtements"
// // echo $ordinateur->getCategory()->getName(); // "Vêtements"

// #Version propre et automatique :
// foreach(Category::$arrayCategory as $category){ # Les :: servent à sélectionner une variable statique dans une classe
//     echo "La catégorie : ". $category->getName() . " contient : <br>"; #il faut mieux créer/appeler une méthode pour récupérer un résultat.
//     foreach (Product::$arrayProducts as $product){
//         if ($product->getCategory()===$category){
//         echo $product->getName()."<br>";
//         }
//     }
// }
?>