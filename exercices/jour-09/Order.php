<?php
require("Cart.php");
require("User.php");

Class Order {
    private static int $nextId=1;
    private int $id;
    private DateTimeImmutable $date;
    private string $statut;
    
    public function __construct(
        private User $user,
        private Cart $items
    ){
        $this->id = self::$nextId++;
        $this->date = new DateTimeImmutable();
        $this->statut="En préparation";
    }
    
    public function getItemCount():int{
        return $this->items->count();
    }


    public function getTotal():float{
        return $this->items->getTotal();
    } 

    public function setStatut(string $newStatut) :void{
        $this->statut = $newStatut;
    }

}
$panierJeanClaude = new Order($jeanClaude, $panier);
// $totalArticleJeanClaude = $panierJeanClaude->getItemCount();
// echo "total article : ".$totalArticleJeanClaude. "<br>";
// $totalPanierJeanClaude = $panierJeanClaude->getTotal();
// echo "total panier : ".$totalPanierJeanClaude. "€ <br>";
// $panier->displayCart();

?>
