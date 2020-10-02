<?php
session_start();
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/user_function.php';
$HOST = 'localhost';
$USERNAME='root';
$PASSWORD = '';
$DB ='Shortner_URL';
$array_update = array();
$conn = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB);
$uid =$_SESSION['uid'];
$sql = "SELECT * FROM urls where uid='$uid' LIMIT 20";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {

$rows['short']="<a href='http://localhost/url_shortner/url_link/".$rows['short']."'>http://localhost/url_shortner/url_link/".$rows['short']."</a>";
$rows['delete']="<a href='http://localhost/url_shortner/delete.php?id=".$rows['id']."'>delete</a>";
	$rows['update']="<a href='http://localhost/url_shortner/update.php?id=".$rows['id']."'>update</a>";
		$data[] = $rows;
		}
		$results = array(
		"sEcho" => 1,
		"iTotalRecords" => count($data),
		"iTotalDisplayRecords" => count($data),
		"aaData"=>$data);
		echo json_encode($results);
		?>