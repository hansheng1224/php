<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算</title>
</head>
<body>
    <a href='index.php'>回首頁</a>
    <h1>BMI計算</h1>
    <a href="result.php?height=178&weight=86">我的資料</a>
    <form action="result.php" method="post">
        <div>身高:<input type="number" name="height" id=""></div>        
        <div>體重:<input type="number" name="weight" id=""></div>        
        <div><input type="submit" value="計算BMI" id=""></div> 
        <div>長度:<input type="number" name="long" id=""></div>     
    </form>
</body>
</html>