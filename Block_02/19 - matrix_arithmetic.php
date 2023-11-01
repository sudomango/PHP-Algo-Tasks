<?php

function main()
{
  $source_matrix = [
    [1, 5, 8, 0, 4],
    [-10, 2, -3, 12, 1],
    [18, 3, 0, 42, 10],
    [0, 0, 0, 1, -15],
    [16, 4, 5, 6, 12]
  ];

  echo "Исходная матрица:" . PHP_EOL;
  print_matrix($source_matrix);

  echo "\nТранспонированная матрица:" . PHP_EOL;
  print_matrix(transp_matrix($source_matrix));

  echo "\nСумма элементов с чётными индексами на главной диагонали = " . sum_of_main($source_matrix) . PHP_EOL;
  echo "Последняя цифра суммы всех элементов на главной и побочной диагоналях = " . last_digit_of_sum($source_matrix) . PHP_EOL;

  $min_element = last_minimal($source_matrix);
  echo "Минимальный элемент матрицы и координаты его последнего вхождения = " . $min_element["min"] . ", " . $min_element["index_i"] . ", " . $min_element["index_j"] . PHP_EOL;
}

# Функция для нахождения самого длинного (по количеству символов) элемента в матрице.
function max_in_matrix($user_matrix)
{
  $max_length = 0;
  foreach ($user_matrix as $row) {
    foreach ($row as $element) {
      $length = strlen((string)$element);
      if ($length > $max_length) {
        $max_length = $length;
      }
    }
  }
  return $max_length;
}

function print_matrix($user_matrix)
{
  $max_length = max_in_matrix($user_matrix);
  foreach ($user_matrix as $i => $row) {
    foreach ($row as $j => $value) {
      $spaces = str_repeat(" ", $max_length - strlen((string)$value));
      if ($j !== count($row) - 1) {
        echo "$spaces $value ";
      } else {
        echo "$spaces $value " . PHP_EOL;
      }
    }
  }
}

# Функция возвращает нам транспонированную матрицу.
function transp_matrix($user_matrix)
{
  $t_matrix = [];
  $n = count($user_matrix);

  for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
      $t_matrix[$i][$j] = $user_matrix[$j][$i];
    }
  }

  return $t_matrix;
}

# Функция суммирует элементы с чётными индексами на главной диагонали.
function sum_of_main($user_matrix)
{
  $sum = 0;
  $n = count($user_matrix);

  for ($i = 0; $i < $n; $i += 2) {
    $sum += $user_matrix[$i][$i];
  }

  return $sum;
}

# Последняя цифра суммы всех элементов главной и побочной диагонали матрицы.
function last_digit_of_sum($user_matrix)
{
  $sum = 0;
  $n = count($user_matrix);

  for ($i = 0; $i < $n; $i++) {
    $sum += $user_matrix[$i][$i] + $user_matrix[$n - 1 - $i][$i];
  }

  $last_digit = $sum % 10;
  return $last_digit;
}

# Функция выводит индексы последнего минимального элемента матрицы.
function last_minimal($user_matrix)
{
  $min = $user_matrix[0][0];
  $indexes = [0, 0];
  $n = count($user_matrix);

  for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
      if ($user_matrix[$i][$j] < $min) {
        $min = $user_matrix[$i][$j];
        $indexes = [$i, $j];
      } elseif ($user_matrix[$i][$j] === $min) {
        $indexes = [$i, $j];
      }
    }
  }

  return ["min" => $min, "index_i" => $indexes[0], "index_j" => $indexes[1]];
}

main();