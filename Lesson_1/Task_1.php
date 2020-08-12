<?php

function brackets($string)
{
    $arr_const = [")" => "(", "]" => "[", "}" => "{"];
    $stack = new SplStack();
    $arr = str_split($string);
    foreach ($arr as $item) {
        if ($item === "\"") $quotes++;
        if (($item === "(") || ($item === "[") || ($item === "{")) { //все открывающие в стек
            $stack->push($item);
        }
        if (($item === ")") || ($item === "]") || ($item === "}")) { //появилась закрывающая
            $letter = $stack->pop(); //достаем из стека верхнюю
            if ($arr_const[$item] === $letter) { //определить что это за скобка
                $result = true;
            } else {
                $result = false;
                break;
            }
        }
    }
    return $result === true && $stack->count() === 0 && $quotes % 2 === 0;
}

$str1 = "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}";
$str2 = "((a + b)/ c) - 2";
$str3 = "([ошибка)";
$str4 = "(\")"; //с кавычками не додумал пока

echo brackets($str1) ? "OK" : "Error";
echo "\n";

echo brackets($str2) ? "OK" : "Error";
echo "\n";

echo brackets($str3) ? "OK" : "Error";
echo "\n";

echo brackets($str4) ? "OK" : "Error";
echo "\n";