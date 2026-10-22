<?php
    $cols = 10; 
    $rows = 10; 
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
        }
        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }
        th {
            background-color: yellow;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    echo '<table>';
    
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>'; 

        for ($j = 1; $j <= $cols; $j++) {
            $result = $i * $j; 

            if ($i == 1 || $j == 1) {
                echo "<th>$result</th>"; 
            } else {
                echo "<td>$result</td>"; 
            }
        }

        echo '</tr>'; 
    }

    echo '</table>'; 
    ?>
</body>
</html>