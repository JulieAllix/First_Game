<?php

$namesList = [
    1 => 'Karen',
    2 => 'Michel',
    3 => 'Jean-Jacques'
];

$namesListLength = count($namesList);
$randomId = rand(1, $namesListLength);
$randomName = $namesList[$randomId];

?>

