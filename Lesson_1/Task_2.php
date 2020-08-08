<?php

function divider($number)
{
    $divider = (int)sqrt($number);
    if ($number % $divider === 0) {

    }
    return $result;
}

$number1 = 13195;
$number2 = 600851475143;

echo divider($number1); //29

echo divider($number2);