<?php

function main()
{
  $orig_string = "";

  $file = fopen("../resources/long_string.txt", "r", "UTF-8");
  if ($file) {
    $orig_string = fread($file, filesize("../resources/long_string.txt"));
    fclose($file);
  } else {
    echo "Не удалось найти файл или прочитать содержимое в нём.";
    exit;
  }

  echo "Оригинальная строка:\n$orig_string\n\n";
  $user_input = mb_strtolower(readline("Укажите, какой символ (подстроку) мы ищем в строке: "));

  $elem_count = mb_substr_count(mb_strtolower($orig_string), $user_input);
  echo "Было найдено $elem_count " . correct_text_output($elem_count) . " символа (подстроки) \"$user_input\".\n";
}

function correct_text_output($number)
{
  if ($number >= 11 && $number <= 14) {
    return "вхождений";
  }

  if ($number % 10 === 1) {
    return "вхождений";
  } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
    return "вхождения";
  } else {
    return "вхождений";
  }
}

main();