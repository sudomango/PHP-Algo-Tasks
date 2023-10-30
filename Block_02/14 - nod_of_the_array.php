<?php

require_once "../useful_functions.php";

function main()
{
  $new_array = array(54, 576, 450, 162, 144);
  echo "\nSource Array = " . implode(", ", $new_array) . "\n";
  echo "НОД для всех чисел в указанном массиве будет равен " . array_gcd($new_array) . ".\n";
}

# Вспомогательная функция, позволяющая найти НОД(a, b) через последовательное вычитание чисел.

function find_gcd($num_a, $num_b)
{
  while ($num_a !== $num_b) {
    if ($num_a > $num_b) $num_a = $num_a - $num_b;
    else $num_b = $num_b - $num_a;
  }

  return $num_a;
}

function array_gcd($user_array)
{
  $gcd = find_gcd($user_array[0], $user_array[1]);

  for ($index = 2; $index < count($user_array); $index++) {
    $gcd = find_gcd($gcd, $user_array[$index]);
  }

  return $gcd;
}

main();