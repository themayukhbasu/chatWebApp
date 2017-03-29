<?php 
include 'session.php';
include 'database.php';

$self=$_SESSION['user'];
$withUser=$_GET['chat_user'];

$y=mysqli_query($connection,"select * from $self where conv='$withUser' UNION select * from $withUser where conv='$self' order by entry_time") or die(mysqli_error($connection)) ;


while($a=mysqli_fetch_array($y,MYSQL_NUM)){

{
	if(strcmp($a[2],$self) == 0){
		echo '<span id="from">'.$withUser ;
		echo " : ";
		echo $a[1].'</span>'; 
	}
	elseif(strcmp($a[2],$withUser) == 0){
		echo '<span id="to">'.$self;
		echo " : ";
		echo $a[1].'</span>'; 
	}
	//echo $a[2];  // username
	   // message
	
}
echo "\n<br><br>";
}


?>