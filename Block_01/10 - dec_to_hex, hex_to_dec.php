<?php

declare(strict_types = 1);

# В данной программе при переводе в двоичную и hex систему счисления будем использовать побитовые операторы.
# Деление на степень двойки (2^n): x >> n.
# Взятие остатка при делении на степень двойки (2^n): x & ((1 << n) - 1).

function main()
{
  echo "Dec 250 = Hex " . dec_to_hex("250") . "\n";
  echo "Hex DACA = Dec " . hex_to_dec("DACA") . "\n";
  echo "Dec 1080 = Bin " . dec_to_bin("1080") . "\n";
  echo "Bin 101010011001 = Dec " . bin_to_dec("101010011001") . "\n";
  echo "Hex Color #FFE4C4 = RGB (" . implode(", ", hex_to_rgb("#FFE4C4")) . ")\n";
  echo "RGB Color (255, 228, 196) = Hex " . rgb_to_hex([255, 228, 196]) . "\n";
}

function dec_to_hex(string $str_number): string
{
  $dec = intval($str_number);

  if ($dec < 0) {
    echo "Перевод отрицательных чисел не поддерживается.\n";
    exit;
  }

  $result = "";

  while ($dec >= 16) {
    $digit = $dec & ((1 << 4) - 1);
    $dec = $dec >> 4;
    $result .= to_hex_char($digit);
  }
  $result .= to_hex_char($dec);

  $hex = strrev($result);
  return $hex;
}

# Вспомогательная функция, помогает конвертировать числа (10, 11, ...) в hex-литералы (A, B, ...).

function to_hex_char(int $number): string
{
  $hex_chars = ['A', 'B', 'C', 'D', 'E', 'F'];
  if ($number >= 10) return $hex_chars[$number % 10];
  else return (string)$number;
}

function hex_to_dec(string $str_number): string
{
  $result_sum = 0;

  $hex_dict = ['A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14, 'F' => 15];

  for ($index = 0; $index < strlen($str_number); $index++) {
    $ch = $str_number[$index];
    if (preg_match("/[A-F]/", $ch)) {
      $result_sum += $hex_dict[strtoupper($ch)] << (4 * (strlen($str_number) - 1 - $index));
    } else {
      $result_sum += (int)$ch << (4 * (strlen($str_number) - 1 - $index));
    }
  }

  return (string)$result_sum;
}

function dec_to_bin(string $str_number): string
{
  $dec = intval($str_number);

  if ($dec < 0) {
    echo "Перевод отрицательных чисел не поддерживается.\n";
    exit;
  }

  $result = "";

  while ($dec >= 2) {
    $digit = $dec & ((1 << 1) - 1);
    $dec = $dec >> 1;
    $result .= (string)$digit;
  }
  $result .= (string)$dec;

  $bin = strrev($result);
  return $bin;
}

function bin_to_dec(string $str_number): string
{
  $result_sum = 0;

  for ($index = 0; $index < strlen($str_number); $index++) {
    $ch = $str_number[$index];
    $result_sum += (int)$ch << (1 * (strlen($str_number) - 1 - $index));
  }

  return (string)$result_sum;
}

function hex_to_rgb(string $hex_color): array
{
  $result = [];
  $hex_array = [substr($hex_color, 1, 2), substr($hex_color, 3, 2), substr($hex_color, 5, 2)];

  foreach ($hex_array as $x) {
    array_push($result, (int)hex_to_dec($x));
  }

  return $result;
}

function rgb_to_hex(array $rgb_color): string
{
  $result = "";
  foreach ($rgb_color as $x) {
    $result .= dec_to_hex((string)$x);
  }
  return "#" . $result;
}

main();