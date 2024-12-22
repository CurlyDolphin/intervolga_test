<?php

$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

$subjects = [];
$students = [];

foreach ($data as [$student, $subject, $score]) {
    $subjects[$subject] = true;
    $students[$student][$subject] = ($students[$student][$subject] ?? 0) + $score;
}

ksort($subjects);
ksort($students);

return ['students' => $students, 'subjects' => array_keys($subjects)];
