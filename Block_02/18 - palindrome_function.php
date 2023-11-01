<?php

require_once __DIR__ . "/../useful_functions.php";

function main()
{
  $str_a = "Идем, молод, долом меди.";
  $str_b = "Искать такси.";
  $str_c = "Я тоже палиндром!";

  echo "Является ли строка \"$str_a\" палиндромом? Ответ = " . (str_palindrome($str_a) ? 'Да' : 'Нет') . ".\n";
  echo "Является ли строка \"$str_b\" палиндромом? Ответ = " . (str_palindrome($str_b) ? 'Да' : 'Нет') . ".\n";
  echo "Является ли строка \"$str_c\" палиндромом? Ответ = " . (str_palindrome($str_c) ? 'Да' : 'Нет') . ".\n\n";

  $int_a = 128060821;
  $int_b = 546786345;

  echo "Число $int_a является палиндромом? Ответ = " . (int_palindrome($int_a) ? 'Да' : 'Нет') . ".\n";
  echo "Число $int_b является палиндромом? Ответ = " . (int_palindrome($int_b) ? 'Да' : 'Нет') . ".\n";
}

function str_palindrome($user_string)
{
  # Фильтруем строку, оставляем только буквы в нижнем регистре.
  $chars = mb_str_split(preg_replace("/[^a-zа-я]/u", "", mb_strtolower($user_string)));
  useful\print_array($chars);
  $length = count($chars);

  for ($index = 0; floor($index < $length / 2); $index++) {
    $last_index = $length - 1 - $index;
    if ($chars[$index] !== $chars[$last_index]) {
      return False;
    }
  }

  return True;
}

function int_palindrome($user_number)
{
  $digits = useful\num_to_array($user_number);
  $length = count($digits);

  for ($index = 0; floor($index < $length / 2); $index++) {
    $last_index = $length - 1 - $index;
    if ($digits[$index] !== $digits[$last_index]) {
      return False;
    }
  }

  return True;
}

main();