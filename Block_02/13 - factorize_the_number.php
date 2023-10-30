<?php

# Основная теорема арифметики:
# Любое натуральное число n > 1, можно разложить в произведение простых чисел, причём это разложение единственно верное с точностью до порядка следования сомножителей

function main()
{
  $number = intval(readline("Введите число, которое необходимо разложить на простые множители: "));
  $factors = factorize($number);

  if (count($factors) > 0) {
    echo "Простые множители числа $number: " . implode(" * ", $factors) . "\n";
  } else {
    echo "Во входные данные, скорее всего, закралась ошибка. Пожалуйста, перепроверьте.\n";
  }
}

function factorize($n_number)
{
  $factors = [];
  $div = 2;

  # Для проверки используем возведение в квадрат вместо sqrt(n_number).
  while ($div * $div <= $n_number) {
    # Можно конечно использовать while (div <= floor(sqrt(n_number))).
    if ($n_number % $div === 0) {
      array_push($factors, $div);
      $n_number = intdiv($n_number, $div);
    } else {
      if ($div === 2) $div += 1;
      else $div += 2; # Всё чётные числа можно пропустить, так как они не являются простыми на 100%.
    }
  }

  if ($n_number > 1) array_push($factors, $n_number);
  return $factors;
}

main();