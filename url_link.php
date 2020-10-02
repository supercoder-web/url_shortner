<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/function.php';
if(isset($_GET['id']))
{
	echo $_GET['id'];
	locationURl($_GET['id']);
}

?>