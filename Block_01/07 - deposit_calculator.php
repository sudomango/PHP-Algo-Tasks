<?php

function main()
{

  $user_sum = floatval(readline("Введите сумму, которую вы хотите внести на вклад: "));
  $user_months = intval(readline("Укажите, на какое количество месяцев вы хотите разместить вклад: "));

  if ($user_months < 1) {
    echo "Вы ввели неверное значение для количества месяцев.\n";
    exit();
  }

  $result = deposit_calc($user_sum, $user_months);

  echo "Финальная сумма на вкладе будет равна " . number_format($result, 2, ".", "") . ". Ждём вас среди наших клиентов!\n";
}

function deposit_calc($sum, $months)
{
  if ($months <= 6) {
    for ($x = 0; $x < $months; $x++) {
      $sum += $sum * 0.065 / 12;
    }
  }
  elseif ($months > 6) {
    $procent = 0;
    if ($sum <= 500000) {
      $procent = 0.1;
    } else {
      $procent = 0.08;
    }

    for ($x = 0; $x < $months; $x++) {
      $sum += $sum * $procent / 12;
    }
  }

  return $sum;
}

main();