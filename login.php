<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>

<body>
    <h1>會員登入</h1>


    <?php
        $showForm=true;
        if(isset($_GET['result'])){

        //  echo $_GET['result'];   
            switch($_GET['result']){
                case 'success':
                    echo "<div style='color:green'>";
                    echo "帳密正確，登入成功";
                    echo "</div>";
                    $showForm=false;
                break;
                case 'fail':
                    echo "<div style='color:red'>";
                    echo "帳密輸入錯誤，登入失敗";
                    echo "</div>";
                break;
            }
        }

    ?>

<?php
if($showForm){
?>
    <form action="check.php" method="post">
        <div>帳號:<input type="text" name="acc" id=""></div>
        <div>密碼:<input type="text" name="pwd" id=""></div>
        <div><input type="submit" value="登入" id=""></div>
    </form>
<?php
}
?>
</body>

</html>