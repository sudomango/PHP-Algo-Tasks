<?php

require_once "../useful_functions.php";

$original = useful\random_array(-200, 200, 100);

# В первом массиве - оставить только чётные положительные числа.
$pos_even_array = array_filter($original, function($x) {
  if ($x % 2 === 0 && $x > 0) return $x;
});

# Во втором массиве - оставить только двузначные числа, кратные 10.
$div_ten_array = array_filter($original, function($x) {
  if ($x % 10 === 0 && abs($x) % 100 === abs($x) && $x != 0) return $x;
});

echo "\nOriginal Array = "; useful\print_array($original);
echo "\nFirst Array = "; useful\print_array($pos_even_array);
echo "\nSecond Array = "; useful\print_array($div_ten_array);