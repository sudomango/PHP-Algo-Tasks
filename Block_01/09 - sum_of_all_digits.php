<?php

function main()
{
  $str_number = readline("Введите число: ");

  $result_sum = 0;

  # Подсчитываем сумму чисел через перевод в строку и регулярного выражения "[0-9]".
  # Преимущество регулярного выражения: у нас есть универсальное решение задачи для всех целых и вещественных чисел.

  if (can_be_number($str_number)) {
    for ($i = 0; $i < strlen($str_number); $i++) {
      $char = $str_number[$i];
      if (preg_match("/[0-9]/", $char)) {
        $result_sum += intval($char);
      }
    }
    echo "Сумма всех чисел числа $str_number равна $result_sum." . PHP_EOL;
  } else {
    echo "Скорее всего, вы опечатались при вводе числа." . PHP_EOL;
  }

}

function can_be_number($user_string)
{
  $pattern = "/^[+-]?\d+[\.]?\d*$/";
  return (bool)preg_match($pattern, $user_string);
}

main();