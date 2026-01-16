<?php
class Client{
    private string $name;
    private float $balance;
    
    public function __construct(string $name, float $balance){
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $amount) : float{ # pour ajouter de l'argent
        return $this->balance += $amount;
    }

    public function withdraw(float $amount) : float{ 
        if ($this->balance-$amount>=0){
            return $this->balance-=$amount ;
         }else{
            echo" compte en banque de " .$this->name. " : erreur: pas assez de sous, va bosser feignasse !";
            return $this->balance;
         }
            
    }
    public function getBalance(){ # pour consulter son solde : 
        echo "compte en banque : " .$this->name . ", votre solde est de : " .number_format($this->balance, 2, ",", " "). "€.<br>" ;
    }   
}
$PierreAccount = new Client("Pierre", 1000.00);
$PierreAccount->getBalance();
$PierreAccount->withdraw(3);
$PierreAccount->deposit(300000);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Histoire de la vie</h1>
    <p>Pierre est un jeune homme plein de vie et d'entrain qui débute dans la vie. Il se présente à la banque pour l'ouverture d'un compte. Sa mamie qu'il adore lui a donné 1 000€ et Pierre compte bien enregistrer cette somme sur un compte.</p>
    <p>Pierre se présente au guichet pour créer son compte. Il consulte son tout nouveau solde : </p>
    <p><?=$PierreAccount->getBalance();?></p>
    <p>Tout content, Pierre rentre chez lui. Sur le chemin du retour, il s'arrête à un Kebab pour fêter ça. Son menu lui coute 15,70€.</p>
    <?php $PierreAccount->withdraw(15.70);?>
    <p>Pierre consulte de nouveau son compte en banque :</p>
    <p><?=$PierreAccount->getBalance();?></p>
    <p>Pierre trouve qu'il n'a pas assez d'argent donc il s'arrête au bureau de Tabac pour acheter un ticket de Loto. Il tente sa change pour 3€.</p>
    <?php $PierreAccount->withdraw(3);?>
    <p>Pierre consulte de nouveau son compte en banque :</p>
    <p><?=$PierreAccount->getBalance();?></p>
    <p>Pierre a décidément de la veine, il vient de gagner 300 000€ au Loto ! </p>
    <?php $PierreAccount->deposit(300000)?>
    <p>Il consulte de nouveau son compte en banque : </p>
    <p><?=$PierreAccount->getBalance();?></p>
    <p>Il décide d'acheter un voilier pour fêter ça. Montant de l'achat : 300 900 € .</p>
    <?php $PierreAccount->withdraw(300900);?>
    <p>Il consulte de nouveau son compte en banque : </p>
    <p><?=$PierreAccount->getBalance();?></p>
    <p>En rentrant chez lui, il roule trop vite et se fait attraper par la gendarmerie. Il doit payer une amende de 100€.</p>
    <?php $PierreAccount->withdraw(100);?>
    <p>Aïe aïe aïe... Le banquier appelle Pierre pour le disputer pour sa mauvaise gestion financière. L'état envoie un recommandé à Pierre pour le mettre en demeure de payer son amende. Pierre est dans la merde. Désolée Pierre mais il ne fallait pas faire le con ! </p>
    <p>Cette petite histoire s'arrête ici car j'ai encore beaucoup de travail et d'exercices à réaliser. Si vous avez pris la peine de lire tout ceci, chapeau à vous. Vous avez ainsi pu constater que mes fonctions en PHP fonctionnent parfaitement et que 5 minutes se sont déjà écoulées depuis le moment où vous avez commencé à lire. Peut-être serait-il temps de changer de fichier ?</p>
    <p>Ne faites pas comme Pierre, gérez mieux vos ressources ! </p>
    <p>Moi je dis ça, je dis rien... </p>
    <p>;)</p>
</p>
</body>
</html>