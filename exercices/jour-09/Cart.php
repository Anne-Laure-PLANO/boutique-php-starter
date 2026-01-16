<?php
require("CartItem.php");

class Cart{
    private static array $arrayCarts=[];

    function __construct(CartItem $CartItem){
        self::$arrayCarts[] = $CartItem ;
    }
    
    public function add(CartItem $addCartItem):array{
        if (in_array($addCartItem,self::$arrayCarts )){
            return self::$arrayCarts[$addCartItem]->quantity+=1;
        }else {
            return self::$arrayCarts[]+= $addCartItem;
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
        if ($newQuantity !==0){
            self::$arrayCarts[$CarteConcernee]->quantity = $newQuantity;
            return self::$arrayCarts[$CarteConcernee];
        } else {
            return remove(self::$arrayCarts[$CarteConcernee]);
        }
    }
}
$panier = new Cart($CartePantalon);
$panier->add($achatLaveVaisselle);


?>