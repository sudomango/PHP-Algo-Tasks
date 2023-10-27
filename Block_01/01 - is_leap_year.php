<?php

function main()
{
  $year = intval(readline("Введите желаемый год для проверки: "));

  // Использование тернарного оператора.
  $is_leap = is_leap_year($year) ? "Високосный" : "Не високосный";
  echo "$year-й год = $is_leap.\n";
}

function is_leap_year($year)
{
  if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) {
    return True;
  } else {
    return False;
  }
}

main();