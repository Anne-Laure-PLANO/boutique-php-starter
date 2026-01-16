<?php
#fichier récupéré et utilisé dans catalogue.php ; les réponses à l'exercice 5 sont donc commentés.
class Product {
    public static int $nextId=1;
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public int $stock;
    public string $category;

    public function __construct(string $name, string $description, float $price, int $stock, string $category){
                $this->id = self::$nextId++;
                $this->name = $name;
                $this->description = $description;
                $this->price = $price;
                $this->stock = $stock;
                $this->category = $category;
    }
    public function getPriceIncludingTax(float $vat):float{
        return $this->price *(1+($vat/100));
    }
    public function isInStock(): bool{
        return ($this->stock>0);
    }
    public function reduceStock(int $quantity) : int{
        if($this->stock- $quantity>=0){
        return $this->stock -= $quantity;
        }else {
            echo "erreur, pas assez de stock";
            return $this->stock;
        }
    }
    public function applyDiscount(float $percentage) : float{
       return $this->price *= (1-$percentage/100) ;
    }
}

# $Jean = new Product("Jean","Super Jean moulant pour petites pommes.", 39.99 , 20, "pantalon"); # création d'un nouveau produit

#$Jean->id;
#$Jean->name;
#$Jean->category;
#$Jean ->description;
#$Jean->price; # avant TVA et remise
# $Jean->getPriceIncludingTax(20); # prix avec TVA de 20%
#$Jean->applyDiscount(10); # Prix TTC avec 10% de remise
#($Jean->isInStock())?"En stock (".$Jean->stock.")":"En rupture"; # affichage conditionnel en fonction du stock
?>

