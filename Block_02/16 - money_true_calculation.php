<?php

function main()
{
  $sum_a = ["rub" => 102, "kop" => 36];
  $sum_b = ["rub" => 49, "kop" => 55];

  echo "Первая сумма = {$sum_a["rub"]} руб. {$sum_a["kop"]} коп." . PHP_EOL;
  echo "Вторая сумма = {$sum_b["rub"]} руб. {$sum_b["kop"]} коп." . PHP_EOL;

  $result_add = money_add($sum_a, $sum_b);
  $result_sub = money_sub($sum_a, $sum_b);

  echo "Результат сложения двух сумм равен = {$result_add["rub"]} руб. {$result_add["kop"]} коп." . PHP_EOL;
  echo "Результат вычитания двух сумм равен = {$result_sub["rub"]} руб. {$result_sub["kop"]} коп." . PHP_EOL;
}

function money_add($hash_a, $hash_b)
{
  $res_kop = $hash_a["kop"] + $hash_b["kop"];
  $memory = 0;
  if ($res_kop >= 100) {
    $memory = 1;
    $res_kop -= 100;
  }

  $res_rub = $hash_a["rub"] + $hash_b["rub"] + $memory;
  return ["rub" => $res_rub, "kop" => $res_kop];
}

function money_sub($hash_a, $hash_b)
{
  $minus_flag = 0; # Отражает, нужно ли будет в конце добавить минус перед результатом.

  if ($hash_a["rub"] < $hash_b["rub"]) {
    $minus_flag = 1;
    [$hash_a, $hash_b] = [$hash_b, $hash_a];
  }

  $res_kop = $hash_a["kop"] - $hash_b["kop"];
  $memory = 0;
  if ($res_kop < 0) {
    $memory = 1;
    $res_kop += 100;
  }

  $res_rub = $hash_a["rub"] - $hash_b["rub"] - $memory;
  return ["rub" => (!$minus_flag) ? $res_rub : -$res_rub, "kop" => $res_kop];
}

main();