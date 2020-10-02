<?php
function signup($Name,$Email,$password){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	if(checkUserExist($Email)==false){
		$conn->query("insert into user(Name,Email,password) values('$Name','$Email','$password')");
		return true;
	}
	else{
		return false;

	}
	
}	
function login($Email,$password){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	echo "select * from user where Email='$Email' and password='$password'";
	$row=$conn->query("select * from user where Email='$Email' and password='$password'");
	if($row->num_rows > 0){
	$_SESSION['Email'] =$Email;
	return true;
	}else{
		return false;
	}
}
function checkUserExist($Email){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row=$conn->query("select * from user  where Email='$Email'");
	if($row->num_rows > 0){
		return true;
	}
	else{
		return false;
	}

}
function logout(){
	session_start();
	session_destroy();
}
function SessionEmail(){
	session_start();
	if(isset($_SESSION['Email']))
	{
		return $_SESSION['Email'];
	}
	else
	{
		return null;
	}

}

function getUserId($Email){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row=$conn->query("select * from user  where Email='$Email'");
	if($row->num_rows > 0){
		$id=$row->fetch_assoc()['Id'];
		return $id;
	}
	else{
		return null;
	}
}