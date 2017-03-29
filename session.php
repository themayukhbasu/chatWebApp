<?php 

include 'database.php';
session_start();



if(!empty($_SESSION['user'])){
$check=$_SESSION['user'];
//echo $check;
/*
$result=mysqli_query($connection,"select * from registration where user='$check'");
$row=mysqli_fetch_array($result);
$loginSession=$row['user'];	*/
//echo "<br>ALL IS WELL";
}

else{
header("Location: login.php");
}

?>