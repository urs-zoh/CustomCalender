<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    function isHoliday($date)
    {
        $holidays = [
            '01-01', // New Year's Day
            '05-01', // Labor Day
            '10-03', // German Unity Day
            '12-25', // Christmas Day
            '12-26', // Second Christmas Day
        ];
        $formattedDate = $date->format('m-d');
        return in_array($formattedDate, $holidays);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $year = intval($_POST['year']);
        echo "<h1>Calendar for $year</h1>";

        $months = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        ];

        foreach ($months as $month => $monthName) {
            echo "<h2>$monthName</h2>";
            echo "<table>";
            echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";

            $date = new DateTime("$year-$month-01");
            $firstDayOfWeek = $date->format('w');
            $daysInMonth = $date->format('t');

            echo "<tr>";
            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo "<td></td>";
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date->setDate($year, $month, $day);
                $dayOfWeek = $date->format('w');
                $classes = [];

                if ($dayOfWeek == 0 || $dayOfWeek == 6) {
                    $classes[] = 'weekend';
                }

                if (isHoliday($date)) {
                    $classes[] = 'holiday';
                }

                $classAttr = !empty($classes) ? ' class="' . implode(' ', $classes) . '"' : '';
                echo "<td$classAttr>$day</td>";

                if ($dayOfWeek == 6 && $day != $daysInMonth) {
                    echo "</tr><tr>";
                }
            }

            for ($i = $date->format('w'); $i < 6; $i++) {
                echo "<td></td>";
            }

            echo "</tr></table>";
        }
    }
    ?>
</body>

</html>