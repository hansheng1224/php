<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['error']="非法登入，請輸入帳號及密碼";
    header('location:login2.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 <?='歡迎'.$_SESSION['login'];?>></h1>
</body>
</html>