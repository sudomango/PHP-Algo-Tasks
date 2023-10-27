<?php

function main()
{
  $str_a = "Реверс";
  $str_b = "Сервер";

  echo "\n" . $str_a . "\n" . $str_b . "\n";
  echo "Являются ли эти строки анаграммами? Ответ: " . (is_an_anagram($str_a, $str_b) ? "Да" : "Нет") . ".\n";

  $str_c = "Полотно навсегда останется свежим";
  $str_d = "А всегда ли свет стекает сквозь жалюзи";

  echo "\n" . $str_c . "\n" . $str_d . "\n";
  echo "Являются ли эти строки анаграммами? Ответ: " . (is_an_anagram($str_c, $str_d) ? "Да" : "Нет") . ".\n";

  $str_e = "Ракета";
  $str_f = "Карета";

  echo "\n" . $str_e . "\n" . $str_f . "\n";
  echo "Являются ли эти строки анаграммами? Ответ: " . (is_an_anagram($str_e, $str_f) ? "Да" : "Нет") . ".\n";

  $str_g = "Мангуст";
  $str_h = "Мустанг";

  echo "\n" . $str_g . "\n" . $str_h . "\n";
  echo "Являются ли эти строки анаграммами? Ответ: " . (is_an_anagram($str_g, $str_h) ? "Да" : "Нет") . ".\n";
}

function is_an_anagram($text_a, $text_b)
{
  $text_a_list = mb_str_split(mb_strtolower($text_a));
  $text_b_list = mb_str_split(mb_strtolower($text_b));

  $text_a_list = array_filter($text_a_list, function ($ch) {
    if (mb_ereg_match("[0-1A-zА-Яа-я]", $ch)) return $ch;
  });

  sort($text_a_list);

  $text_b_list = array_filter($text_b_list, function ($ch) {
    if (mb_ereg_match("[0-1A-zА-Яа-я]", $ch)) return $ch;
  });

  sort($text_b_list);

  return $text_a_list === $text_b_list;
}

main();