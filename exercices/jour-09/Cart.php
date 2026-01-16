<?php
require("CartItem.php");

class Cart{
    private static array $arrayCarts=[];

    function __construct(CartItem $CartItem){
        self::$arrayCarts[] = $CartItem ;
    }
    
    public function add(CartItem $addCartItem):array{
        if (in_array($addCartItem,self::$arrayCarts )){
            self::$arrayCarts[$addCartItem]->quantity+=1;
            return self::$arrayCarts;
        }else {
            self::$arrayCarts[] = $addCartItem;
            return self::$arrayCarts;
        }
    }

    public function remove(CartItem $removeItem) : array{
        #vérifier que le produit est dans le tableau :
        if(in_array($removeItem,self::$arrayCarts)){
            #trouver l'emplacement du produit dans le tableau
            $locationRemoveItem = array_search($removeItem, self::$arrayCarts);
            #supprimer item concerné
            return array_splice(self::$arrayCarts,$locationRemoveItem);
        }else{
            echo "erreur, produit non trouvé.";
            return self::$arrayCarts;
        }                   
    }

    
    public function update(CartItem $CarteConcernee, int $newQuantity) : array{
        if (in_array($carteConcernee, self::$arrayCarts)){
            $idCarteConcernee= array_search($carteConcernee, self::$arrayCarts);
            if ($newQuantity >0){
                self::$arrayCarts[$idCarteConcernee]->modifyQuantity($newQuantity);
                return self::$arrayCarts[$CarteConcernee];
            } if ($newQuantity===0) {
                return remove(self::$arrayCarts[$CarteConcernee]);
            }
        } else{
            echo "erreur, le produit est introuvable <br>";
        }
    }


    public function getTotal():float{
        $totalCart;
        foreach (self::$arrayCarts as $cart){
            $totalCart += $cart->getTotal();
        }
        return $totalCart;
    }

    #calcul du nombre total d'articles :
    public function count(){
        $totalCarts;
        foreach(self::$arrayCarts as $cart){
            $totalCarts += $cart->getQuantity();
        }
        return $totalCarts;
    }


    #supprime entièrement le contenu de la carte
    public function clear(){
        return self::$arrayCarts =[];
    }


    public function displayCart():void{
        Echo "Dans mon panier il y a : <br>";
        foreach (self::$arrayCarts as $object){
            echo $object->getQuantity() ." article(s) de " .$object->getProduct()->getName(). "<br>" ;
            //var_dump( $object);
        }
    }
}
$panier = new Cart($CartePantalon);
$panier->add($achatLaveVaisselle);
$panier->add($tshirt);
$panier->update($tshirt,12);
$panier->displayCart();

?>