<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/user_function.php';
$Email=$_POST['Email'];
$password=$_POST['password'];
session_start();
 if(login($Email,$password)==true){
 	header('Location:index.php');
 }else{
 	header('Location:signin_from.php?msg=login is not working');
 }

?>