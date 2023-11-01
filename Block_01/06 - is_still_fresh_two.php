<?php

# В этой версии используем ООП подход и класс DateTime (более новый вариант).

function main()
{
  $products = [
    ["Banana", new DateTime("2023-06-12"), "60 days"],
    ["Apples", new DateTime("2023-08-23"), "80 days"],
    ["Juice", new DateTime("2023-03-10"), "120 days"],
    ["Butter", new DateTime("2023-07-18"), "60 days"],
    ["Coca-Cola", new DateTime("2023-01-08"), "360 days"]
  ];

  $date_now = new DateTime("2023-09-10");

  foreach ($products as $product) {
    $fresh = is_still_fresh($product, $date_now);
    echo "Продукт = " . $product[0] . ", Свежий = " . ($fresh ? "Да" : "Нет") . "\n";
  }
}

function is_still_fresh($product, $today)
{
  $plus_days = (int)explode(" ", $product[2])[0]; # Получаем количество дней в сроке годности.
  $start_date = $product[1];
  $end_date = $start_date->modify("+" . $plus_days . " days");

  if ($end_date < $today) {
    return False;
  } else {
    return True;
  }
}

main();