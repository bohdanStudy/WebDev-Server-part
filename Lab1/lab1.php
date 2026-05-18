<?php

// Завдання 1: Сума цифр числа
$input = readline("Введіть число: ");
if (is_numeric($input)) {
    $sum = 0;
    for ($i = 0; $i < strlen($input); $i++) {
        $sum += $input[$i];
    }
    echo "Сума цифр: " . $sum . "\n";
} else {
    echo "Помилка: введено не число\n";
}


// Завдання 2: Кількість входжень цифри
// Перетворюємо на рядок, щоб легко перебирати символи
$number = "442158755745";
$whatwecount = "5";
$count = 0;

if (is_numeric($number) && is_numeric($whatwecount)) {
    for ($i = 0; $i < strlen($number); $i++) {
        if ($number[$i] == $whatwecount) {
            $count++;
        }
    }
    echo "Цифра $whatwecount зустрічається $count разів.\n";
} else {
    echo "Помилка\n";
}


// Завдання 3: Числа 20 .. 45, які діляться на 5 і їх сума
$summa = 0;
for ($i = 20; $i <= 45; $i++) {
    if (fmod($i, 5) == 0) {
        echo "$i, ";
        $summa += $i;
    }
}
echo "\nСума: $summa\n";


// ==========================================
// Lab 1
// ==========================================

// 1.     Знайти факторіали всіх чисел у масиві.
// Створити масив із 5 чисел від 1 до 10. Отримати новий масив із факторіалами відповідних чисел.
$numbers = [2, 4, 5, 7, 10];
$result = [];

foreach ($numbers as $num) {
    $factorial = 1;
    for ($j = 1; $j <= $num; $j++) {
        $factorial *= $j;
    }
    $result[] = $factorial;
}
echo "Факторіали: " . implode(", ", $result) . "\n";


// 2.     Знайти суму чисел масиву, кратних 3 і 5.
// Створити масив із 30 випадкових чисел від 1 до 100. Порахувати суму чисел, кратних одночасно 3 і 5.
$numbers = [];
for ($i = 0; $i < 30; $i++) {
    $numbers[$i] = rand(1, 100);
}

$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 3 === 0 && $numbers[$i] % 5 === 0) {
        $sum += $numbers[$i];
    }
}
echo "Сума чисел кратних 3 і 5: $sum\n";


// 3.     Знайти найбільше значення у масиві. Користувач вводить масив чисел. Вивести найбільше з них.
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$max = $numbers[0];
for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $max) {
        $max = $numbers[$i];
    }
}
echo "Найбільше значення: $max\n";


//4.     Порахувати кількість простих чисел у масиві.
// Згенерувати масив із 20 випадкових чисел від 10 до 100. Порахувати кількість простих чисел.
$numbers = [];
$countPrimes = 0;
for ($i = 0; $i < 20; $i++) {
    $numbers[$i] = rand(10, 100);
}

foreach ($numbers as $num) {
    if ($num <= 1) continue;

    $isPrime = true;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        $countPrimes++;
    }
}
echo "Кількість простих чисел: $countPrimes\n";


// 5.     Заміна парних індексів на 0 в масиві.
// Створити масив із 20 випадкових чисел від 0 до 30. Замінити всі елементи з парними індексами на 0.
$numbers = [];
for ($i = 0; $i < 20; $i++) {
    $numbers[$i] = rand(0, 30);
}
for ($i = 0; $i < count($numbers); $i++) {
    if ($i % 2 === 0) {
        $numbers[$i] = 0;
    }
}


// 6.     Сума елементів кратних 3 у масиві.
// Створити масив із 12 випадкових чисел від -20 до 20. Порахувати суму елементів, кратних 3.
$numbers = [];
$sum = 0;
for ($i = 0; $i < 12; $i++) {
    $numbers[$i] = rand(-20, 20);
}

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 3 === 0) {
        $sum += $numbers[$i];
    }
}
echo "Сума елементів кратних 3: $sum\n";


// 7.     Стислий формат ПІБ для ініціалів без по батькові.
// Користувач вводить рядок у форматі “Прізвище Ім’я”. Вивести: “Прізвище І.”
$fullName = "Прізвище Імя";
$parts = preg_split('/\s+/u', trim($fullName));

if (!empty($parts[0])) {
    $surname = $parts[0];
    $firstNameInitial = isset($parts[1]) ? mb_substr($parts[1], 0, 1, 'UTF-8') . '.' : '';
    $resultName = trim("{$surname} {$firstNameInitial}");
    echo "Ініціали: $resultName\n";
}


// 8.     Знайти найближчий рік у масиві, який є високосним.
// Користувач вводить масив років. Знайти найменший з них, який є високосним.
$years = [2025, 2023, 2028, 2020, 2024, 2000, 1900];
$minLeapYear = null;

foreach ($years as $year) {
    $isLeap = false;
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                $isLeap = true;
            }
        } else {
            $isLeap = true;
        }
    }

    if ($isLeap) {
        if ($minLeapYear === null || $year < $minLeapYear) {
            $minLeapYear = $year;
        }
    }
}

if ($minLeapYear !== null) {
    echo "Найменший високосний рік: " . $minLeapYear . "\n";
} else {
    echo "У масиві немає високосних років.\n";
}


// 9. 9.     Обмін мінімального та максимального елементів у масиві.
// Створити массив, заповнити його випадковими знаннями (можна використовувати функцію rand),
// знайти максимальне і мінімальне значення массива і поміняти їх місцями.
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[$i] = rand(0, 50);
}

$minIndex = 0;
$maxIndex = 0;
$minValue = $numbers[0];
$maxValue = $numbers[0];

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] > $maxValue) {
        $maxValue = $numbers[$i];
        $maxIndex = $i;
    }
    if ($numbers[$i] < $minValue) {
        $minValue = $numbers[$i];
        $minIndex = $i;
    }
}

$temp = $numbers[$minIndex];
$numbers[$minIndex] = $numbers[$maxIndex];
$numbers[$maxIndex] = $temp;


// 10. Обчислення суми та квадратів ряду. Дано натуральне число n.
// Обчислити: 11 + 22 + .. + nn. Вивести на екран квадрати цих чисел, а також суму квадратів цих чисел.
$n = 5;
$sum = 0;

echo "Квадрати:\n";
for ($i = 1; $i <= $n; $i++) {
    $square = $i * $i;
    echo $i . " у квадраті = " . $square . "\n";
    $sum += $square;
}
echo "Сума квадратів: " . $sum . "\n";

?>