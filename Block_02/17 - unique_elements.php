<?php

declare(strict_types = 1);

require_once __DIR__ . "/../useful_functions.php";

# Строго говоря, в PHP уже реализован метод array_unique, поэтому решение данной задачи носит скорее учебный характер.

function main()
{
  $array = useful\random_array(-10, 10, 20, "y");
  echo "\nSource Array = " . PHP_EOL;
  useful\print_array($array);

  echo "\nUnique Elements From Array = " . PHP_EOL;

  echo "Sorted: ";
  useful\print_array(uniques_sorted($array));

  echo "Keep Order: ";
  useful\print_array(unique_elements($array));
}

# Сортируем список, после чего поочерёдно проверяем элементы на уникальность.
function uniques_sorted(array $user_array): array
{
  sort($user_array);
  $uniques = [];

  for ($index = 0; $index < count($user_array); $index++) {
    $current = $user_array[$index];
    if ($index === 0) {
      $next = $user_array[$index + 1];
      if ($current !== $next) {
        $uniques[] = $current;
      }
    }
    elseif ($index === count($user_array) - 1) {
      $previous = $user_array[$index - 1];
      if ($current !== $previous) {
        $uniques[] = $current;
      }
    } else {
      $next = $user_array[$index + 1];
      $previous = $user_array[$index - 1];

      if ($current !== $next && $current !== $previous) {
        $uniques[] = $current;
      }
    }
  }

  return $uniques;
}

# Альтернативная реализация, в которой мы используем функцию array_count_values.
function unique_elements(array $user_array): array
{
  $uniques = [];

  foreach ($user_array as $x) {
    if (array_count_values($user_array)[$x] === 1) {
      $uniques[] = $x;
    }
  }

  return $uniques;
}

main();