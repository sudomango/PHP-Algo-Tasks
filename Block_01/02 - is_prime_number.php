<?php

# Пока мы используем только простые оптимизации, без применения сложных алгоритмов.

function main()
{
  $user_number = intval(readline("Введите любое целое число и узнайте, является ли оно простым: "));
  echo "Ответ: ", true_bool(is_prime_number($user_number)) . "\n";
  
  echo "\nПростые числа от 1 до 100: ";

  # Для проверки распечатаем все простые числа от 1 до 100.
  for ($number = 1; $number <= 100; $number++) {
    if (is_prime_number($number)) {
      echo $number . " ";
    }
  }
  echo "\n";
}

# Основная функция, которая проверяет, является ли переданное в аргументах число простым.
function is_prime_number($number)
{

  if ($number < 2) return False;
  if ($number == 2) return True;
  if ($number % 2 == 0) return False;

  $max_number = floor(sqrt($number)); # Поиск множителей только в диапазоне 2..sqrt(x).

  # Действуем с шагом 2, так как чётные множители нас не интересуют.
  for ($divider = 3; $divider <= $max_number; $divider += 2) {
    if ($number % $divider == 0) {
      return False;
    }
  }

  return true;
}

# Функция true_bool (применительно к булевым переменным) возвращает нам нормальные "True" и "False" вместо автокаста PHP.
function true_bool($bool_value)
{
  return $bool_value ? "True" : "False";
}

main();