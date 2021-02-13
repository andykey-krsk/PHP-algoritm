<?php
/*1. Дан массив из n элементов, начиная с 1.
Каждый следующий элемент равен (предыдущий + 1).
Но в массиве гарантированно 1 число пропущено.
Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1
*/

$arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16];//11
$arr2 = [1, 2, 4, 5, 6];//3
$arr3 = [];
$arr4 = [2, 3, 4, 5, 6];//1
$arr5 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function missedNum($array)
{
    if (empty($array) || $array[0] != 1) {
        return 1;
    }

    if ($array[count($array) - 1] == count($array)){
        echo "Массив норм!";
        return null;
    }
    $start = 0;
    $end = count($array) - 1;
    $n = 0;
    $base = 0;
    while ($start < $end) {
        $n++;
        $base = floor(($start + $end) / 2);
        if ($array[$base] == $base + 1) {
            $start = $base;
        } else {
            $end = $base;
        }
        if ($array[$end] - $array[$start] == 2) {
            return $array[$end] - 1;
        }
    }
    echo "ЧИСЛО НЕ НАйДЕНО. Количество итераций: $n" . PHP_EOL;
    return null;
}

echo missedNum($arr1);
echo '<br><br>';

echo missedNum($arr2);
echo '<br><br>';

echo missedNum($arr3);
echo '<br><br>';

echo missedNum($arr4);
echo '<br><br>';

echo missedNum($arr5);
echo '<br><br>';
