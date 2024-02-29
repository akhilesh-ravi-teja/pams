<?php 

$array = array(3, 5, 2, 9);
$duplicates = array_duplicates($array);
var_dump($duplicates);
$newArra = [];
function array_duplicates(array $array)
{
    return array_diff_assoc($array, array_unique($array));
}
