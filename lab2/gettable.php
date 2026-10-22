<?php
/**
 * Отрисовывает таблицу умножения и возвращает номер вызова функции.
 *
 * @param int    $cols  Количество столбцов (по умолчанию 5).
 * @param int    $rows  Количество строк (по умолчанию 5).
 * @param string $color Фоновый цвет заголовков (по умолчанию 'yellow').
 * @return int Номер текущего вызова функции (начиная с 1).
 */
function getTable(int $cols = 5, int $rows = 5, string $color = 'yellow'): int
{
    static $count = 0;
    $count++;

    echo "<table>";
    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $cols; $j++) {
            $result = $i * $j;
            if ($i == 1 || $j == 1) {
                echo "<th style=\"background-color: {$color};\">$result</th>";
            } else {
                echo "<td>$result</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    $n1 = getTable();                              
    echo "<p>Вызов №$n1 завершён</p>";

    $n2 = getTable(8);                             
    echo "<p>Вызов №$n2 завершён</p>";

    $n3 = getTable(4, 6);                          
    echo "<p>Вызов №$n3 завершён</p>";

    $n4 = getTable(3, 3, '#a0d8ef');
    echo "<p>Вызов №$n4 завершён</p>";

    echo "<p><strong>Всего вызовов функции getTable(): $n4</strong></p>";
    ?>
</body>
</html>