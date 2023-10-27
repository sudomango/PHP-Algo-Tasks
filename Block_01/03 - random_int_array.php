<?php

function main()
{
  $min_value = intval(readline("Введите минимальное значение: "));
  $max_value = intval(readline("Введите максимальное значение: "));
  $count = intval(readline("Введите количество случайных элементов: "));
  $repeat = readline("Могут ли числа повторяться? (y или n): ");

  echo print_array(random_array($min_value, $max_value, $count, $repeat));
}

function random_array($min, $max, $count, $rep)
{
  # Проверяем, не ввёл ли пользователь количество элементов больше, чем возможно уникальных чисел в указанном диапазоне.
  if ($rep === "n" && ($count > $max - $min + 1)) {
    echo "Запрашиваемое количество элементов превышает допустимый диапазон. Будут выведены все числа указанного диапазона в случайном порядке.\n";
    $count = $max - $min + 1;
  }

  $result_array = [];

  for ($index = 0; $index < $count; $index++) {
    if ($rep === "y") {
      array_push($result_array, rand($min, $max));
    } else {

      # Пока не получим уникальное значение, повторяем генерацию случайного числа.
      $rand_number = rand($min, $max);

      while (in_array($rand_number, $result_array, true)) {
        $rand_number = rand($min, $max);
      }

      array_push($result_array, $rand_number);
    }
  }

  return $result_array;
}

# Функция print_array распечатывает массив в одну строку без использования print_r и var_export.
function print_array($user_array)
{
  echo implode(", ", $user_array) . PHP_EOL;
}

main();