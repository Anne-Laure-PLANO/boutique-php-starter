<?php
require("Category-and-Product.php");

class CartItem{

    public function __construct(
        private Product $product,
        private int $quantity = 1

    ){
    }
    public function getTotal(){
        return $this->quantity * $this->getProduct()->getprice();
    }

    public function getProduct(){
        return $this->product;
    }
    
    public function getQuantity(){
        return $this->quantity;
    }
    public function modifyQuantity($newQuantity){
        return $this->quantity = $newQuantity;
    }
    public function incremente($add){
        return $this->quantity += $add;
    }

    public function decremente($less){
        return $this->quantity -= $less;
    }
}

$tshirt= new CartItem($tshirt, 1 );
//$NewCartItem->incremente(9);
//echo $NewCartItem->getTotal();
$CartePantalon = new CartItem($pantalon);
//echo $CartePantalon->getTotal();

$achatLaveVaisselle = new CartItem($laveVaisselle);
//echo $achatLaveVaisselle->getTotal();

?>