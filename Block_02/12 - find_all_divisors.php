<?php

require_once __DIR__ . "/../useful_functions.php";

function main()
{
  echo "Все делители числа 128: ";
  useful\print_array(find_divisors(128));
  echo "Все делители числа 303: ";
  useful\print_array(find_divisors(303));
  echo "Все делители числа 1139: ";
  useful\print_array(find_divisors(1139));
  echo "Все делители числа 2080: ";
  useful\print_array(find_divisors(2080));
}

# Проверить правильность работы программы можно здесь:
# https://onlinemathtools.com/find-all-divisors

function find_divisors($number)
{
  $divisors = [];

  # Как и в случае с простыми числами, поиск ведём только до sqrt(number).
  $max_border = floor(sqrt($number));

  for ($div = 1; $div <= $max_border; $div++) {
    if ($number % $div === 0) {
      array_push($divisors, $div);
      # Подбираем вторую пару для первого делителя.
      if (intdiv($number, $div) != $div) {
        array_push($divisors, intdiv($number, $div));
      }
    }
  }

  sort($divisors);
  return $divisors;
}

main();