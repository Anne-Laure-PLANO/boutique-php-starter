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
    private static int $nextId=1;
    private int $id;
    private DateTimeImmutable $dateCreation;

    public function __construct(
        private string $name,
        private string $description,
        private float $price,
        private int $stock,
        private Category $category, // Relation !
        
    ) {
        self::$arrayProducts[] = $this;
        $this->id = self::$nextId++ ;
        $this->dateCreation = new DateTimeImmutable();
    }
    
    public function getName(): string {
        return $this->name;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getCategory(): Category {
        return $this->category;
    }
}

$clothes = new Category("Vêtements");
$informatique = new Category("Informatique");
$electromenager = new Category("Electroménager");
$loisirs= new Category("Loisirs");

$tshirt = new Product("T-shirt","super T-Shirt tout neuf", 29.99, 300, $clothes);
$laveVaisselle = new Product("Lave-vaisselle","super lave-vaisselle tout beau", 200, 50, $electromenager);
$ordinateur = new Product("Ordinateur portable","une magnifique tablette qui peut s'ouvrir et se fermer.", 900, 100, $informatique);
$imprimante = new Product("Imprimante Jet d'Encre","blabla de description", 150, 60, $informatique);
$pantalon = new Product("Pantalon Stretch", "blabla", 39.99, 160, $clothes);
$velo = new Product("Vélo", "sdgtkhfjksdyhrodtuj",150.99, 590, $loisirs);

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