<?php

session_start();
$con = mysqli_connect('localhost','root');

if($con){
	echo "connection secessfull";
}

mysqli_select_db($con,'sessionpractical');

$name = $_POST['user'];
$pass = $_POST['password'];

$q ="select * from singin where name = '$name' && password = '$pass'";

$result=mysqli_query($con, $q);
$num =mysqli_num_rows($result);

if($num==1){
	$_SESSION['username'] = $name;
	header('location:exam.php');
}else{
	header('location:login.php');
}

?>
