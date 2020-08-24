<?php
/* 3*. Доработать алгоритм бинарного поиска
для нахождения кол-ва повторений в массиве.
Сложность O(logn) не должна измениться.
Учтите, что массив длиной n может состоять из одного значения
[4, 4, 4, 4, ...(n)..., 4]
*/

function findNumberCount($array, $number){
    $count = 0;

    return $count;
}

$arr1 = [1,1,1,2,3,4,5,6,7,8,8,9,10];
$num1 = 1;
$arr2 = [1,2,2,2,2,3,4,5,6,7,8,8,9,10];
$num2 =2;
$arr3 = [1,1,1,2,3,3,3,3,4,5,6,7,8,8,9,10];;
$num3 =3;

echo findNumberCount($arr1,$num1);
echo '<br><br>';

echo findNumberCount($arr2,$num2);
echo '<br><br>';

echo findNumberCount($arr3,$num3);
echo '<br><br>';

function binarySearch($myArray, $num)
{
    $start = 0;
    $end = count($myArray) - 1;
    $n = 0;

    while ($start < $end) {
        $n++;
        $base = floor(($start + $end) / 2);
        echo "Проверяется элемент с индексом: $base" . PHP_EOL;

        if ($myArray[$base] == $num) {
            echo "Количество итераций: $n искомого числа $num под индексом $base " . PHP_EOL;
            return $base;
        } elseif ($myArray[$base] < $num) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    echo "ЧИСЛО НЕ НАйДЕНО. Количество итераций: $n" . PHP_EOL;
    return null;
}