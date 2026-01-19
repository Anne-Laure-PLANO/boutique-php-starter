<?php
Class User{

    private DateTimeImmutable $dateInscription;
    private array $arrayAddresses; 

    public function __construct(
        private string $name,
        private string $email,
    )  {
        $this->dateInscription = new DateTimeImmutable(date('d-m-Y'));
        $this->arrayAddresses = [];
    }

    public function addAddress (Address $address):array {
        $this->arrayAddresses[] = $address;
        return $this->arrayAddresses;
        }

    public function getAddresses():void{
        echo "Adresse(s) de {$this->name} : <br>";    
        foreach ($this->arrayAddresses as $key => $address){
            echo "adresse numéro ".$key+1 ." : <br>";    
                $address->getAddress();
        }
    }

    public function getDefaultAddress():void{
            echo "Adresse(s) par défaut de {$this->name} : <br>";    
            echo $this->arrayAddresses[0]->getAddress();
    } 
}


Class Address {

    public function __construct(
        private string $rue,
        private string $codePostal,
        private string $ville,
        private string $pays = "France"
    ){}

    public function getAddress(){
        echo "{$this->rue} <br>{$this->codePostal} {$this->ville} <br> {$this->pays}<br>";
    }
    
}
$jeanClaudeAddresses = new Address("110 rue de la Défausse","38570", "Tu as perdu" );
$jeanClaude = new User ("Jean-Claude DUS", "jean-claude@gmail.com", $jeanClaudeAddresses );
$jeanClaude->addAddress($jeanClaudeAddresses);
//$jeanClaude->getAddresses();
$jeanClaudeAddresses2 = new Address("94 rue de ta Maman", "01350","Dans le respect des Saintes Ecritures");
$jeanClaude->addAddress($jeanClaudeAddresses2);
//$jeanClaude->getAddresses();
//$jeanClaude->getDefaultAddress();
?>