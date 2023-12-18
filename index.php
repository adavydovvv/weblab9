<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Давыдов Артём Сергеевич 221-362 - Лабораторная работа №9</title>   
</head>

<body>
    
    <header>
        <img src="mospolytech_logo_white.png" alt="Логотип">
    </header>

    <main>
        <?php
            $initialArgument = 0; 
            $numOfValues = 100; 
            $step = 1; 
            $maxValue = 100; 
            $minValue = -100; 
            $type = 'D';

            function calculateFunction($x) {
                if ($x <= 10){
                    return ($x != 0) ? (10 + ($x / $x)) : "Error";
                }
                else if ($x > 10 && $x < 20){
                    return ($x != 0) ? ($x / (7 * ($x - 2))) : "Error";
                }
                else{
                    return $x * 8 + 2;
                }
            }

            $arguments = [];
            $values = [];


            $output = '';
            $tableData = '<table border="1">';


            for ($i = $initialArgument; $i < $numOfValues; $i++) {
                $currentArgument = $initialArgument + $step * $i;
                $functionValue = calculateFunction($currentArgument);
                if (calculateFunction($currentArgument) != 'Error'){
                    $functionV = calculateFunction($currentArgument);
                    $functionValue = round($functionV, 3);
                }
                $arguments[] = $currentArgument;


                if ($functionValue != 'Error'){
                    if($functionValue>=$maxValue || $functionValue<$minValue){  // если вышли за рамки диапазона
                        break;  // закончить цикл досрочно
                    }
                }
                if ($functionValue != 'Error'){
                    $values[] = $functionValue;
                }
        

                
                if ($type == 'A') {
                    $output .= "f($currentArgument)=$functionValue<br>";
                }
                elseif ($type == 'B') {
                    $output .= "<li>f($currentArgument)=$functionValue</li>";
                }
                elseif ($type == 'C') {
                    $output .= "<li>f($currentArgument)=$functionValue</li>";
                } 
                elseif ($type == 'D') {
                    if (count($arguments) === 1) {
                        $tableData .= '<tr>';
                        $tableData .= '<th>#</th><th>Аргумент</th><th>Значение функции</th>';
                        $tableData .= '</tr>';
                    }
                    $tableData .= '<tr>';
                    $tableData .= "<td>" . count($arguments) . "</td><td>{$currentArgument}</td><td>{$functionValue}</td>";
                    $tableData .= '</tr>';
                }
                elseif ($type == 'E') {
                    $output .=  "<div>f($currentArgument)=$functionValue</div><br>";
                }
            }
            
            if ($type == 'B') {
                $output = "<ul>$output</ul>";
            }
            if ($type == 'C') {
                $output = "<ol>$output</ol>";
            }
            if ($type == 'D') {
                $tableData .= '</table>';
                $output .= $tableData;
            }
            
            echo $output;
            
            $max = max($values);
            $min = min($values);
            $average = round(array_sum($values) / count($values), 3);
            $sum = round(array_sum($values), 3);

            echo "<p>Максимальное значение: $max</p>";
            echo "<p>Минимальное значение: $min</p>";
            echo "<p>Среднее арифметическое: $average</p>";
            echo "<p>Сумма всех значений: $sum</p>";
        ?>
    </main>

    <footer>
       <?php echo "<footer>Тип верстки: $type</footer>"; ?>
    </footer>
</body>
</html>