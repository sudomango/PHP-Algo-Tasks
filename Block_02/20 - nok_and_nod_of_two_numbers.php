<?php

function main()
{
  $number_a = intval(readline("Введите первое натуральное число: "));
  $number_b = intval(readline("Введите второе натуральное число: "));

  echo "\nНОД двух чисел $number_a и $number_b будет равен " . find_nod($number_a, $number_b) . "." . PHP_EOL;
  echo "НОК двух чисел $number_a и $number_b будет равен " . find_nok($number_a, $number_b) . "." . PHP_EOL;
}

# Находим НОД, используя Алгоритм Евклида: Всегда делим большее число на меньшее до тех пор, пока одно из них не разделится на другое без остатка.

function find_nod($num_a, $num_b)
{
  while ($num_a != 0 && $num_b != 0) {
    if ($num_a > $num_b) $num_a = $num_a % $num_b;
    elseif ($num_a < $num_b) $num_b = $num_b % $num_a;
    else return $num_a; # Если оба числа равны, то одно из них - точно НОД.
  }

  return ($num_a + $num_b); # Одно из них будет равно 0 (условие выхода из цикла), поэтому фактически мы возвращаем только одно число.
  # Альтернативные варианты: max($num_a, $num_b) или использовать тернарный оператор.
}

# Есть ещё алгоритм нахождения НОД через вычитание. Принцип в целом довольно похож на Алгоритм Евклида.

function find_gcd($num_a, $num_b)
{
  while ($num_a !== $num_b) {
    if ($num_a > $num_b) $num_a = $num_a - $num_b;
    else $num_b = $num_b - $num_a;
  }

  return $num_a; # Так как равенство num_a и num_b - это условие выхода из цикла, то нам всё равно какое из них возвращать.
}

# Для вычисления НОК существует формула: НОК(a, b) = a * b / gcd(a, b).

function find_nok($num_a, $num_b)
{
  return intdiv($num_a * $num_b, find_gcd($num_a, $num_b));
}

main();