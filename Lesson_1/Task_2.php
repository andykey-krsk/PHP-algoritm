<?php

function divider($number)
{
    $max = (int)sqrt($number); //определяем верхиний предел поиска
    for ($i = $max; $i > 1; $i--) { //перебор от верхнего предела вниз
        if (($number % $i === 0)) { //проверка делится ли нацело
            if (isSimple($i)) { //проверка является ли простым
                return $i;
            }
        }
        if ($i === 2){
            return "Число простое";
        }
    }
}

function isSimple($number)
{
    $countDev = 0;
    $i = 2;
    while (($i <= $number) && ($countDev <= 1)) {
        if (($number % $i) === 0) {
            $countDev++;
        }
        $i++;
    }
    if ($countDev <= 1) {
        return true; //простое
    } else {
        return false; //составное
    }
}

$number1 = 13195;
$number2 = 600851475143;
$number3 = 257;
$number4 = 514;

echo divider($number1); //29
echo "\n";

echo divider($number2);
echo "\n";

echo divider($number3);
echo "\n";

echo divider($number4);//257
echo "\n";

echo divider(6857);