<?php

class car{
    public string $brand;
    public string $model;
    public int $year;

    public function __construct(string $brand, string $model, int $year){
        $this ->brand = $brand;
        $this ->model = $model;
        $this->year = $year;
    }

    public function getAge():int{
        return 2026-$this->year;
    }
    public function display():void{
        echo $this->brand . " " .$this->model . " " . $this->getAge() . " ans.";
    }
}

$clio = new car("Renault", "Clio", 2006);
$peugeot = new car("Peugeot", "308", 2008);
$meriva = new car("Opel", "Meriva", 2015);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>J'ai 3 voitures : </p>
    <ul>
        <li><?=$clio->display()?></li>
        <li><?=$peugeot->display()?></li>
        <li><?=$meriva->display()?></li>
    </ul>
</body>
</html>