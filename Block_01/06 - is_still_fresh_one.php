<?php

# В этой версии используем процедурный подход и функцию strtotime (классический вариант).

function main()
{
  $products = [
    ["Banana", strtotime("2023-06-12"), "60 days"],
    ["Apples", strtotime("2023-08-23"), "80 days"],
    ["Juice", strtotime("2023-03-10"), "120 days"],
    ["Butter", strtotime("2023-07-18"), "60 days"],
    ["Coca-Cola", strtotime("2023-01-08"), "360 days"]
  ];

  $date_now = strtotime("2023-09-10");

  foreach ($products as $product) {
    $fresh = is_still_fresh($product, $date_now);
    echo "Продукт = " . $product[0] . ", Свежий = " . ($fresh ? "Да" : "Нет") . "\n";
  }
}

function is_still_fresh($product, $today)
{
  $plus_days = (int)explode(" ", $product[2])[0]; # Получаем количество дней в сроке годности.
  $start_date = $product[1];
  $end_date = strtotime("+" . $plus_days . " days", $start_date);

  if ($end_date < $today) {
    return False;
  } else {
    return True;
  }
}

main();