<?php
/*
2. Для натуральных чисел a и n вычислить a^n.
Входные числа имеют диапазон 1 <= a <= 9 и 1 <= n <= 1000.
Ответ вывести в файл otvet.txt
*/

$a = 10;
$n = 250;
$filename = 'otvet.txt';

function putFile($value, $filename)
{
    $file = new SplFileObject($filename, 'w');
    if (!$file->eof()) {
        $file->fwrite($value);
    }
}

function bigPower($a, $n)
{
    if ($n == 0) {
        return 1;
    }

    if ($n == 1 || $a == 1 || $a == 0) {
        return $a;
    }

    return $a * bigPower($a, $n-1);
}

putFile(bigPower($a, $n), $filename);