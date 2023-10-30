<?php

namespace useful;

# Использование всех функций данного модуля: useful\<function>($args...);

# Функция pp печатает переданный ей аргумент с добавлением перехода на новую строку.

function pp($user_text)
{
  echo $user_text . PHP_EOL;
}

# Функция is_leap_year проверяет, является ли указанный год високосным.

function is_leap_year($year)
{
  if (($year % 400 === 0) || (($year % 4 === 0) && ($year % 100 !== 0))) {
    return True;
  } else {
    return False;
  }
}

# Функция delta_time вычисляет разницу между двумя временными точками в секундах.
# Может быть полезно для замеров времени работы алгоритма.
# Для установки временной точки используйте функцию time_a = microtime(true);

function delta_time($time_a, $time_b)
{
  echo "Времени прошло: " . $time_b - $time_a . " сек." . PHP_EOL;
}

# Функция true_bool (применительно к булевым переменным) возвращает нам нормальные "True" и "False" вместо автокаста PHP.

function true_bool($bool_value)
{
  return $bool_value ? "True" : "False";
}

# Функция is_prime_number проверяет, является ли указанное число простым (улучшенный наивный алгоритм).

function is_prime_number($number)
{

  if ($number < 2) return False;
  if ($number == 2) return True;
  if ($number % 2 == 0) return False;

  $max_number = floor(sqrt($number));

  for ($divider = 3; $divider <= $max_number; $divider += 2) {
    if ($number % $divider == 0) {
      return False;
    }
  }

  return true;
}

# Функция random_array генерирует массив случайных целых чисел.

function random_array($min = -100, $max = 100, $count = 10, $rep = "y")
{
  if ($rep === "n" && ($count > $max - $min + 1)) {
    $count = $max - $min + 1;
  }

  $result_array = [];

  # Перебираем индексы в стиле Python и Ruby.
  foreach (range(0, $count - 1) as $index) {
    if ($rep === "y") {
      array_push($result_array, rand($min, $max));
    } else {

      do {
        $rand_number = rand($min, $max);
      } while (in_array($rand_number, $result_array, true));

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

# Функция swap меняет значения у двух целочисленных переменных без использования третьей.

function swap(int $a, int $b)
{
  $a = $a ^ $b;
  $b = $a ^ $b;
  $a = $a ^ $b;

  return [$a, $b];
}

# Функция раскладывает целое неотрицательное число в массив, состоящий из его цифр.

function num_to_array($number)
{
  $str_number = (string)$number;
  $result_array = str_split($str_number);
  return $result_array;
}

# Функция, обратная предыдущей = собирает целое неотрицательное число из массива отдельных цифр.

function array_to_num($user_array)
{
  $str_number = implode("", $user_array);
  return $str_number;
}