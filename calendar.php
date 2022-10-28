<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-wrap: wrap;
            /* align-items: center; */
            justify-content: center;
            margin: 30px auto;
        }

        table {
            border-collapse: collapse;
            border: #000 double;
            margin-top: 30px;
        }

        table td {

            font-size: x-large;
            font-family: "標楷體";
            font-weight: bolder;
            border: 2px solid #000;
            padding: 3px 9px;
            width: 90px;
            height: 70px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php

    $cal = [];

    $month = (isset($_GET['m']) ? $_GET['m'] : date("n"));
    $year = (isset($_GET['y']) ? $_GET['y'] : date("Y"));
    $nextMonth = $month + 1;
    $prevMonth = $month - 1;


    if ($month == 13) {
        $month = 1;
        $nextMonth = $nextMonth - 12;
        $prevMonth = 0;
        $year++;
    }

    if ($month == 0) {
        $month = 12;
        $prevMonth = $prevMonth + 12;
        $nextMonth = 13;
        $year--;
    }


    $firstDay = $year . '-' . $month . '-1';
    $firstDayWeek = date("w", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = $year . '-' . $month . '-' . $monthDays;
    $spaceDays = $firstDayWeek;
    $weeks = ceil(($monthDays + $spaceDays) / 7);

    for ($i = 0; $i < $spaceDays; $i++) {
        $cal[] = '';
    }

    for ($i = 0; $i < $monthDays; $i++) {
        $cal[] = date('Y-m-d', strtotime("+$i days", strtotime($firstDay)));
    }

    // echo "<pre>";
    // print_r($cal);
    // echo "</pre>";

    // echo "第一天" . $firstDay . "星期" . $firstDayWeek;
    // echo "<br>";
    // echo "該月共" . $monthDays . '天,最後一天是' . $lastDay;
    // echo "月曆天數共" . ($monthDays + $spaceDays) . '天' . $weeks . "周";

    ?>

    <div style="display:flex;width:60%;justify-content:space-around;align-items:center">
        <a href="?y=<?= $year; ?>&m=<?= $prevMonth; ?>">上一個月</a>
        <!-- <a href="?2022&m=<?= $prevMonth; ?>">上一個月</a> -->
        <h1><?= $year; ?>年<?= $month; ?>月份</h1>
        <a href="?y=<?= $year; ?>&m=<?= $nextMonth; ?>">下一個月</a>
        <!-- <a href="?2022&m=<?= $nextMonth; ?>">下一個月</a> -->
    </div>
    <!-- <?php
            echo $year . "<br>";
            echo $prevMonth . "<br>";
            echo $month . "<br>";
            echo $nextMonth . "<br>";
            ?> -->

    <table>
        <tr>
            <td style='background: pink'>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td style='background: pink'>六</td>
        </tr>
        <?php
        foreach ($cal as $i => $day) {
            if ($i % 7 == 0) {
                echo "<tr>";
            }

            if ($day == '') {
                if ($i== 0) {
                    echo "<td style = 'background: pink;';></td>";
                } else {
                    //     $dayNum='';
                    echo "<td></td>";
                }
            } else {
                $dayNum = date('j', strtotime($day));
                if ($i % 7 == 0 || $i % 7 == 6) {
                    if(date(strtotime($day))==date(strtotime("now"))){
                        echo "<td style = 'background: #ccc'>$dayNum</td>";
                    }else{

                        // $dayNum = date('j', strtotime($day));
                        echo "<td style = 'background: pink;color: red'>$dayNum</td>";
                    }
                } else {
                    if(date(strtotime($day))==date(strtotime("now"))){
                        echo "<td style = 'background: #ccc'>$dayNum</td>";
                    }else{
                    // $dayNum = date('j', strtotime($day));
                    echo "<td>$dayNum</td>";
                    }
                }
            }
            // echo $day;
            // echo "<br>";
            // echo $dayNum;

            // echo "<td>$day</td>";
            if ($i % 7 == 6) {
                echo "</tr>";
            }
        }
        // echo $i;
        // echo "<br>";
        // echo $weeks;
        for ($j = $i; $j < ($weeks * 7 - 1); $j++) {
            if($j == ($weeks*7-2)){
                echo "<td style = 'background: pink'></td>"; 
                echo "</tr>";
            }else{

                echo "<td></td>";
            }
        }
        echo date(strtotime($day));
        echo date(strtotime("now"));
        ?>

    </table>


</body>

</html>