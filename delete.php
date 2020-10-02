<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/function.php';
if(isset($_GET['id'])){
	deleteUrl($_GET['id']);
	header('location:index.php');
}