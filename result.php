<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算結果</title>
</head>

<body>
    <?php
    if (!empty($_GET)) {
        $height = $_GET['height'];
        $weight = $_GET['weight'];
    } else if (!empty($_POST)) {
        $height = $_POST['height'];
        $weight = $_POST['weight'];
    }else{
        echo "輸入資料錯誤，請重回表單重新輸入";
        echo "<a ref='bmi.php'>回表單</a>";
        exit();
    }
    echo "身高為" . $height . "<br>";
    echo "體重為" . $weight . "<br>";

    $bmi = round($weight / ($height / 100) ** 2, 2);

    echo $bmi;

    ?>
    <h3>你的BMI計算結果為:<?=$bmi ?></h3>
    <div></div>
    <?php
    if ($bmi < 18.5) {
        $bmidec = "體重過輕";
    } else if ($bmi < 24) {
        $bmidec = "健康體位";
    } else if ($bmi < 27) {
        $bmidec = '過重';
    } else if ($bmi < 30) {
        $bmidec = "輕度肥胖";
    } else if ($bmi < 35) {
        $bmidec = '中度肥胖';
    } else {
        $bmidec = '重度肥胖';
    }

    ?>
    <div>你的體位判定為:<?=$bmidec?></div>
    <a href="bmi.php">重新測量</a>

</body>

</html>