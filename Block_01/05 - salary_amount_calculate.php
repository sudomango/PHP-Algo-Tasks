<?php

function salary_amount($employee)
{
  $result = 1000 + 20 * $employee["hours"] + 30 * $employee["clients"];
  return $result;
}

# Создаём массив сотрудников, каждый сотрудник = это отдельный ассоциативный массив.
$employees = [
  ["name" => "Jack", "hours" => 120, "clients" => 10],
  ["name" => "Andrew", "hours" => 100, "clients" => 6],
  ["name" => "Henry", "hours" => 96, "clients" => 10],
  ["name" => "Alice", "hours" => 80, "clients" => 32],
  ["name" => "Elizabeth", "hours" => 108, "clients" => 8]
];

# Рассчитываем зарплату, и добавляем её в массив к каждому сотруднику.
foreach ($employees as &$employee) {
  $salary = salary_amount($employee);
  $employee["salary"] = $salary;
}

# Сортируем массив hashmap-ов в порядке убывания, используя ключ "salary".
usort($employees, function ($a, $b) {
  return $b["salary"] - $a["salary"];
});

foreach ($employees as $employee) {
  echo "Имя = " . $employee["name"] . ", зарплата = " . $employee["salary"] . "\n";
}