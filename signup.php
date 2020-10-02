<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/user_function.php';
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$password=$_POST['password'];

 if(signup($Name,$Email,$password)){
 		header('Location:signin_from.php?msg=Account is created');
 }else{
 	header('Location:signup_form.php?msg=Email already Exist');
 }

?>