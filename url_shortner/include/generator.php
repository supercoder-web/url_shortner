<?php

include 'connection/init.php';
include 'function/function.php';
include 'function/user_function.php';
session_start();
$id = rand(111,999);

$url = $_POST['url'];
if(idExists($id)){
	$id  = rand(111,999);
}

 insertID($id,$url,$_SESSION['uid'], date("m.d.y"));
echo'http://localhost/url_shortner/url_link/'.$id;
?>