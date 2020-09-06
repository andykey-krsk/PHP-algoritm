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
        return $a * power($a, $n - 1);
    } else {
        $b = power($a, $n / 2);
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

    $result = 1;
    for ($i = 0; $i < $n; $i++) {
        $result = bigMult($result, $a);
    }
    return $result;
}

function bigMult($a, $b)
{
    if ($a == 0 || $b == 0) return 0;
    if ($a == 1) return $b;
    if ($b == 1) return $a;

    $result = '';
    //задаем разрядность преобразования
    $capacity = 1;
    //преодразуем строку в массив и разворачиваем его
    $reversed_a = array_reverse(str_split(trim($a), $capacity));
    $reversed_b = array_reverse(str_split(trim($b), $capacity));

    //узнаем размерность каждого массива
    $len_a = count($reversed_a);
    $len_b = count($reversed_b);

    for ($iA = 0; $iA < $len_a; $iA++) {
        for ($iB = 0; $iB < $len_b; $iB++) {
            $temp = $reversed_a[$iA] * $reversed_b[$iB];
        }
    }

    return $result;
}

bigMult($a, $n);

//bigPower($a,$n);