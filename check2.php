<?php
session_start();
$acc='abc';
$pwd='123';

$formAcc=$_POST['acc'];
$formPwd=$_POST['pwd'];

// echo $formAcc;
// echo $formPwd;
if($acc==$formAcc && $pwd==$formPwd){
   $_SESSION['login']=$formAcc;
}else{
    $_SESSION['error']='帳號或密碼錯誤';
}
header("location:login2.php");

?>