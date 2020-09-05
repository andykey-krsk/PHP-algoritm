<?php
/*
2. Для натуральных чисел a и n вычислить a^n.
Входные числа имеют диапазон 1 <= a <= 9 и 1 <= n <= 1000.
Ответ вывести в файл otvet.txt
*/

$a = 9;
$n = 999;
$filename = 'otvet.txt';

function putFile($value, $filename)
{
    $file = new SplFileObject($filename, 'w');
    if (!$file->eof()) {
        $file->fwrite($value);
    }
}

function power($a, $n)
{
    if ($n == 0) {
        return 1;
    }

    if ($n == 1 || $a == 1 || $a == 0) {
        return $a;
    }
    if ($n % 2 == 1) {
        return $a * bigPower($a, $n - 1);
    } else {
        $b = bigPower($a, $n / 2);
        return $b * $b;
    }
}

//putFile(power($a, $n), $filename);

function bigPower($a, $n)
{
    if ($n == 0) {
        return 1;
    }

    if ($n == 1 || $a == 1 || $a == 0) {
        return $a;
    }

    $temp = [];

    for ($i = 0; $i < $n; $i++) {

    }
}

bigPower($a,$n);