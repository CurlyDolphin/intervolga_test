<?php

$data = require 'school.php';

$students = $data['students'];
$subjects = $data['subjects'];

?>

<section>
    <h1>Таблица оценок школьников</h1>
    <table>
        <thead>
            <tr>
                <th>Фамилии</th>
                <?php foreach ($subjects as $subject): ?>
                    <th><?= htmlspecialchars($subject) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student => $scores): ?>
                <tr>
                    <th><?= htmlspecialchars($student) ?></th>
                    <?php foreach ($subjects as $subject): ?>
                        <td><?= htmlspecialchars($scores[$subject] ?? '') ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>



