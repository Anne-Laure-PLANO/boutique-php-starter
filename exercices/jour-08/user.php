<?php

class user{
    public string $name;
    public string $email;
    public DateTime $registrationDate;

    public function __construct(string $name, string $email, ?string $registrationDate = null){
        $this->name = $name;
        $this ->email = $email;
        $this ->registrationDate = ($registrationDate)? new DateTime($registrationDate) : new DateTime();
    }

    public function isNewMember (){
        $today = new DateTime();
        $interval = $today->diff($this->registrationDate);
        if (($interval->days)<30){
            return true;
        } else {
            return false;        
        }
    }
}
$Marie = new user("Marie", "marie@gmail.com", "11-12-1991");
$Pierre = new user("Pierre", "pierre@gmail.com");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?=($Marie->isNewMember())? $Marie->name ." est un nouveau membre.": $Marie->name ." Barre-toi l'ancêtre !";?></p>
    <p><?=($Pierre->isNewMember())? $Pierre->name ." est un nouveau membre.": $Marie->name ." Barre-toi l'ancêtre !";?></p>

</body>
</html>