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
            background-image: url(../123.jpg);
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

            
            border: 2px solid #000;
            /* padding: 3px 9px; */
            width: 90px;
            height: 70px;
            text-align: center;
        }

        .btn{
            font-size: x-large;
            font-family: "標楷體";
            font-weight: bolder;
            width: 90px;
            height: 70px;
            background-color: #fff;
            border: 0;
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

    
    ?>

    <div style="display:flex;width:60%;justify-content:space-around;align-items:center">
        <a href="?y=<?= $year; ?>&m=<?= $prevMonth; ?>">上一個月</a>
     
        <h1><?= $year; ?>年<?= $month; ?>月份</h1>
        <a href="?y=<?= $year; ?>&m=<?= $nextMonth; ?>">下一個月</a>
       
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
        function aa(){
            echo "button test susses";
           }
        foreach ($cal as $i => $day) {
            if ($i % 7 == 0) {
                echo "<tr>";
            }

            if ($day == '') {
                if ($i== 0) {
                    echo "<td style = 'background: pink;';></td>";
                } else {
                 
                    echo "<td></td>";
                }
            } else {
                $dayNum = date('j', strtotime($day));
                if ($i % 7 == 0 || $i % 7 == 6) {
                    if($day==date('Y-m-j',strtotime("now"))){
                        echo "<td ><button class='btn' onclick='fndMemo($dayNum)' style = 'background: lighgray;color:blue;' >$dayNum</button></td>";
                    }else{

                        
                        echo "<td><button class='btn' id='ibtn$dayNum'  style = 'background: pink;color: red'>$dayNum</button></td>";
                    }
                } else {
                    if($day==date('Y-m-j',strtotime("now"))){
                        echo "<td><button class='btn' id='ibtn$dayNum'  style = 'background: lightgray;color: blue;'>$dayNum</button></td>";
                    }else{
                   
                    echo "<td><button class='btn' id='ibtn$dayNum' >$dayNum</button></td>";
                    }
                }
            }
           
            if ($i % 7 == 6) {
                echo "</tr>";
            }
        }
       
        for ($j = $i; $j < ($weeks * 7 - 1); $j++) {
            if($j == ($weeks*7-2)){
                echo "<td style = 'background: pink'></td>"; 
                echo "</tr>";
            }else{

                echo "<td></td>";
            }
        }
        // echo "<button class='btn' style='color:red'>$dayNum</button>";
       echo "ibtn$dayNum";

        ?>

    </table>


</body>

</html>