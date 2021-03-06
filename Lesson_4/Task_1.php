<?php
/*
1. Реализовать функцию a+b, где каждое из чисел а и b
имеет не менее 1000 разрядов.
Числа хранятся в файле chisla.txt на двух строчках.
Ответ вписать на третью строчку
*/

//генерация случайного числа
function getBigNumber($capacity)
{
    $bigNumber = '';
    for ($i = 1; $i <= $capacity; $i++) {
        $bigNumber .= random_int(0, 9);
    }
    return $bigNumber;
}

//запись результата в файл
function putOperand($operand, $value, $filename)
{
    $file = fopen($filename, "r+");
    if ($file) {
        // Считываем содержимое в массив, разбиение происходит по строкам
        $file_array = file($filename);
        // заменяем строку
        $file_array[$operand - 1] = $value . "\r\n";
        //очищаем файл чтоб не оставалось "хвостов"
        file_put_contents($filename, '');
        // Записываем массив обратно в файл
        for ($i = 0; $i < 3; $i++) {
            fwrite($file, $file_array[$i]);
        }
        fclose($file);
    } else {
        echo("Ошибка открытия файла");
    }
}

//считавание операндов
function getOperand($operand, $filename)
{
    $file = new SplFileObject($filename);
    if (!$file->eof()) {
        $file->seek($operand - 1);
        return $file->current();
    }
}

//эксперимент
//не придумал как красиво решить проблему с хвостами
function test($operand, $value, $filename)
{
    $file = new SplFileObject($filename, 'r+');
    if (!$file->eof()) {
        $a = $file->fgets();
        $b = $file->fgets();
        $size = strlen($value . $a . $b);
        $file->fwrite($value);
        $file->ftruncate($size);
    }
}

function bigAddition($a, $b)
{
    //задаем разрядность преобразования
    $capacity = 4;
    //преодразуем строку в массив и разворачиваем его
    $reversed_a = array_reverse(str_split(trim($a), $capacity));
    $reversed_b = array_reverse(str_split(trim($b), $capacity));

    //узнаем размерность каждого массива
    $len_a = count($reversed_a);
    $len_b = count($reversed_b);

    if ($len_a >= $len_b) {
        $len = $len_a;
    } else {
        $len = $len_b;
    }

    $mind = 0;
    $sum = [];
    for ($i = 0; $i < $len; $i++) {
        $sum[$i] = $reversed_a[$i] + $reversed_b[$i] + $mind;
        if (strlen($sum[$i]) > $capacity) {
            $mind = 1;
            $sum[$i] -= pow(10, $capacity);
        }
        $sum[$i] = str_pad($sum[$i], $capacity, '0', STR_PAD_LEFT);
    }
    return $mind . implode('', array_reverse($sum));
}

$filename = 'chisla.txt';
//putOperand(1, getBigNumber(100000), $filename);
//putOperand(2, getBigNumber(100000), $filename);

//test(3, '123456', $filename);

$operand1 = getOperand(1, $filename);
$operand2 = getOperand(2, $filename);

putOperand(3, bigAddition($operand1, $operand2), $filename);