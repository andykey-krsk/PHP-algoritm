<?php

/*3. Требуется написать метод, принимающий на вход размеры двумерного массива
 * и выводящий массив в виде инкременированной цепочки чисел,
 * идущих по спирали против часовой стрелки.
 * */

function spiralFilling($x, $y)
{
    if ($x === 0 || $y === 0) {
        echo "Error" . "<br>";
    } else {
        $array = array_fill(0, $y, array_fill(0, $x, 0));
        $count = 1;
        $direction = 0;
        $i = -1; //строка x
        $j = 0; //столбец y
        $x1 = 0; //коэф строки
        $y1 = 0; //коэф столбца
        $countMax = $x * $y;
        while ($count <= $countMax) {
            switch ($direction) {
                case 0: //вниз
                    if ($i < ($y - 1 - $y1)) {
                        $i++;
                    } else {
                        $direction++;
                        $j++;
                    }
                    break;
                case 1: //вправо
                    if ($j < ($x - 1 - $x1)) {
                        $j++;
                    } else {
                        $direction++;
                        $i--;
                    }
                    break;
                case 2: //вверх
                    if ($i > $y1) {
                        $i--;
                    } else {
                        $direction++;
                        $j--;
                        $y1++;
                    }
                    break;
                case 3: //влево
                    if ($j > (1 + $x1)) {
                        $j--;
                    } else {
                        $direction = 0;
                        $i++;
                        $x1++;
                    }
                    break;
            }
            $array[$i][$j] = str_pad((string)$count, strlen($countMax),"0", STR_PAD_LEFT);
            $count++;
        }
    }
    return $array;
}

function printMatrix($array)
{
    if (empty($array)) {
        echo "Массив пуст";
    } else {
        foreach ($array as $itemX) {
            $string = "";
            foreach ($itemX as $itemY) {
                $string .= $itemY . " | ";
            }
            echo $string . "<br>";
        }
    }
}

$x = 10;
$y = 20;

$array = spiralFilling($x, $y);

printMatrix($array);