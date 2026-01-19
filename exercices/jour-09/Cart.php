<?php
require("CartItem.php");

class Cart{
    private array $arrayCarts=[];

    function __construct(? CartItem $cartItem = null){
        $this->arrayCarts = [] ;

        if ($cartItem !== null) {
        $this->addCartItem($cartItem);
        }
    }

//testée, fonctionne.
    public function addCartItem(CartItem $cartItem):array{
        $id = array_search($cartItem, $this->arrayCarts, true);
        if ($id !== false){
            $cartItem->incremente(1);
        }else {
            $this->arrayCarts[] = $cartItem;
        }
        return $this->arrayCarts;
    }
//testée, fonctionne.
    public function remove(CartItem $removeItem) : array{
        #vérifier que le produit est dans le tableau :
        if(in_array($removeItem,$this->arrayCarts, true)){
            #trouver l'emplacement du produit dans le tableau
            $locationRemoveItem = array_search($removeItem, $this->arrayCarts, true);
            #supprimer item concerné
            array_splice($this->arrayCarts,$locationRemoveItem,1);
            return $this->arrayCarts;
        }else{
            echo "<br> erreur, produit non trouvé.<br>";
            return $this->arrayCarts;
        }                   
    }

//testée, fonctionne.
    public function update(CartItem $carteConcernee, int $newQuantity) : array{
        $idCarteConcernee= array_search($carteConcernee, $this->arrayCarts, true);
        if ($idCarteConcernee === false && $newQuantity>0){
            $this->addCartItem($carteConcernee);
                return $this->arrayCarts;
        } 
        if ($idCarteConcernee !== false){
            if ($newQuantity >0){
                $carteConcernee->modifyQuantity($newQuantity);
            } else {
                $this->remove($carteConcernee);
            }
        }
        return $this->arrayCarts;
    }
    

//testée, fonctionne.
    public function getTotal():float{
        $totalCart=0;
        foreach ($this->arrayCarts as $cart){
            $totalCart += $cart->getTotal();
        }
        return $totalCart;    
    }

//testée, fonctionne.
    #calcul du nombre total d'articles :
    public function count() : int{
        $totalCarts = 0;
        foreach($this->arrayCarts as $cart){
            $totalCarts += $cart->getQuantity();
        }
        return $totalCarts;    
    }

//testée, fonctionne.
    #supprime entièrement le contenu de la carte
    public function clear(): array{
        return $this->arrayCarts =[];
    }

// testée, fonctionne
    public function displayCart():void{
        Echo "<br> Dans mon panier il y a : <br>";
        foreach ($this->arrayCarts as $object){
            echo $object->getQuantity() ." article(s) de " .$object->getProduct()->getName(). "<br>" ;
            //var_dump( $object);
        }
    }
}
$panier = new Cart($CartePantalon);
$panier->addCartItem($achatLaveVaisselle);
$panier->addCartItem($tshirt);
// $panier->displayCart();

// $panier->update($tshirt,10);
$panier->addCartItem($velo);
// $panier->displayCart();

// $panier->remove($velo);
// $panier->displayCart();
// $panier->remove($velo);
// $panier->displayCart();
// $panier->getTotal();
// $panier->count();

// //$panier->clear();
// $panier->displayCart();
$panier->addCartItem($achatLaveVaisselle);
// $panier->displayCart();

?>