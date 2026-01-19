<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    #$date1 = date('2024/06/01');
    #$date2 = date('2026/01/04');
    
#echo int($date2-$date1);

    ?>
    
<?php
$today = new DateTime(date('Y-m-d'));
$older = new DateTime('2025-01-01');
$interval = ($today->diff($older))->days;
var_dump($interval);
echo $interval;
// %a will output the total number of days.
#echo $interval->format("%a ")."\n";

?>
    </body>
</html>