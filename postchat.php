<?php

include 'session.php';
include 'database.php';
echo "wok";
$msg = $_POST["message"];
$self = $_SESSION['user'];
$withUser = $_POST['friend'];  

$query=mysqli_query($connection,"insert into $self (`message`,`conv`) values ('$msg','$withUser')")or die(mysqli_error($connection));


echo "woring".$_POST['message'];


?>