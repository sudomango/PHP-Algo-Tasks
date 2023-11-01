<?php

require_once __DIR__ . "/../useful_functions.php";

# Решето Эратосфена является очень эффективным алгоритмом для поиска простых чисел: О(n * log(log n)).

function main()
{
  $user_n = intval(readline("Введите максимальное число, до которого мы ищем простые числа: "));

  echo "Простые числа от 2 до $user_n включительно с использованием Решета Эратосфена:\n";
  useful\print_array(prime_soe($user_n));
}

function prime_soe($max_number)
{
  # Создаём список чисел от 0 .. max_number, по умолчанию все числа считаются простыми (True).
  # Сами числа мы будем брать из индексов, в значении будут храниться только True и False, это должно уменьшить объём потребляемой памяти.

  $sieve = array_fill(0, $max_number + 1, True);
  $sieve[0] = False; $sieve[1] = False; # 0 и 1 не являются простыми числами по определению.

  $max_sqrt = floor(sqrt($max_number));

  for ($number = 2; $number <= $max_sqrt; $number++) {
    # Если число = простое, то мы удаляем из решета все числа, кратные ему. Сначала кратные 2, потом кратные 3 и т. д.
    if ($sieve[$number]) {
      foreach (range($number ** 2, $max_number, $number) as $multiple) {
        if ($multiple % $number === 0) $sieve[$multiple] = False;
      }
    }
  }

  # Теперь нам нужно достать все индексы, которые соответствуют простым числам, и создать из них отдельный список.

  $prime_numbers = array_keys($sieve, True);
  return $prime_numbers;
}

main();