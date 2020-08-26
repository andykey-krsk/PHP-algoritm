<?php
/* 3*. Доработать алгоритм бинарного поиска
для нахождения кол-ва повторений в массиве.
Сложность O(logn) не должна измениться.
Учтите, что массив длиной n может состоять из одного значения
[4, 4, 4, 4, ...(n)..., 4]
*/

function findNumberCount(&$array, $number)
{
    $start = 0;
    $end = count($array) - 1;
    $index = null; //индекс найденного
    $left = null; //индекс крайнего левого найденного
    $right = null; //индекс крайнего правого найденного
    while ($start < $end) {
        $index = binarySearch($array, $number, $start, $end);
        if ($index) { //что то нашел
            if ($left === null) {
                $left = $index;
            }
            if ($right === null) {
                $right = $index;
            }
            $end = $index - 1;
        } else {
            echo "ЧИСЛО НЕ НАЙДЕНО";
        }
    }
    return $right - $left + 1;
}

function binarySearch(&$myArray, $num, $start, $end)
{
    if ($start == $end) return $start;

    while ($start < $end) {
        $base = floor(($start + $end) / 2);
        if ($myArray[$base] == $num) {
            return $base;
        } elseif ($myArray[$base] < $num) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    echo "ЧИСЛО НЕ НАЙДЕНО." . PHP_EOL;
    return null;
}

$arr1 = [1, 1, 1, 2, 3, 4, 5, 6, 7, 8, 8, 9, 10];
$num1 = 1;
$arr2 = [1, 2, 2, 2, 2, 3, 4, 5, 6, 7, 8, 8, 9, 10];
$num2 = 2;
$arr3 = [1, 1, 1, 2, 3, 3, 3, 3, 4, 5, 6, 7, 8, 8, 9, 10];;
$num3 = 5;

echo findNumberCount($arr1, $num1);
echo '<br><br>';

echo findNumberCount($arr2, $num2);
echo '<br><br>';

echo findNumberCount($arr3, $num3);
echo '<br><br>';

echo binarySearch($arr3, 5, 0, 15);
echo '<br><br>';