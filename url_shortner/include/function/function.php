<?php
function idExists($id){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row = $conn->query('select *  from urls where short='.$id);
	if($row->num_rows > 0){
		return true;
		}else{
			return false;
		}
}
function insertID($id,$url,$uid,$timestamp){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row = $conn->query("insert into urls (url,short,uid,timestamp) values('$url','$id','$uid','$timestamp')");
	if(strlen($conn->error)==0){
		return true;
	}
}
function checkDuplciateURL($url){
	$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/url_shortner/url_shortner/include/connection/init.php";
include $path;
$row = $conn->query('select *  from urls where url='.$url);
if($row->num_rows > 0){
	return false;
	}else{
		return true;
	}
}
function locationURl($id){
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/url_shortner/url_shortner/include/connection/init.php";
include $path;
$row = $conn->query('select *  from urls where short='.$id);
if($row->num_rows > 0){
	$link=$row->fetch_assoc()['url'];
	VisitCount($id);
	header('Location:'.$link);
	}
}
function VisitCount($id){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row = $conn->query("select *  from urls where short='$id'");
	if($row->num_rows > 0){
	$count =$row->fetch_assoc()['count']+1;
	$row = $conn->query('update urls set count='.$count.' where short='.$id);
	}
}
function deleteUrl($id){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$conn->query("delete  from urls where id='$id'");
	}
function UrlShowdata($id){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row = $conn->query("select *  from urls where id='$id'");
	return $row->fetch_assoc();
}
function urlUpdate($id,$url){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	
	$conn->query("update urls set url='$url'  where id='$id'");
	
}
/*I created this function not implemented*/
function thirtyDaysDelete($uid){
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/url_shortner/url_shortner/include/connection/init.php";
	include $path;
	$row = $conn->query("select *  from urls where uid='$uid'");
	$now = time(); // or your date as well
	$your_date = strtotime($row->fetch_assoc()['timestamp']);
	$datediff = $now - $your_date;
	$days = round($datediff / (60 * 60 * 24));
	if($days<30)
	{
		$row = $conn->query("delte   from urls where uid='$uid'");
	}
}
?>