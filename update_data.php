<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/function.php';
$id=$_POST['id'];
$url = $_POST['url'];
urlUpdate($id,$url);
header("location:index.php");
?>