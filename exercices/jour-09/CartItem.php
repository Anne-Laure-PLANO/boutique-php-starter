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
    
    public function incremente($add){
        return $this->quantity += $add;
    }

    public function decremente($less){
        return $this->quantity -= $less;
    }
}

$NewCartItem= new CartItem($tshirt, 1 );
$NewCartItem->incremente(9);
echo $NewCartItem->getTotal();
?><br><?php
$CartePantalon = new CartItem($pantalon, 10);
echo $CartePantalon->getTotal();
?><br><?php

$achatLaveVaisselle = new CartItem($laveVaisselle);
echo $achatLaveVaisselle->getTotal();

?>