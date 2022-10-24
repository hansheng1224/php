<?php
$acc='aaaa';
$pwd='1234';

$formAcc=$_POST['acc'];
$formPwd=$_POST['pwd'];

echo $formAcc;
echo $formPwd;
if($acc==$formAcc && $pwd==$formPwd){
    header("location:login.php?result=success");
}else{
    header("location:login.php?result=fail");
}

?>