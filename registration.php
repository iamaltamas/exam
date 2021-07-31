<?php

session_start();
header('location:login.php');
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
	echo "alredy resistar";
}else{
	$qy = "insert into singin(name,password) values ('$name','$pass')";
	mysqli_query($con, $qy);
}

?>
