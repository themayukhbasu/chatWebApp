<?php 
include 'session.php';
include 'database.php';
header('Content-Type: text/xml');
$self=$_SESSION['user'];
$withUser=$_GET['chat_user'];

$y=mysqli_query($connection,"select * from $self where conv='$withUser' UNION select * from $withUser where conv='$self' order by entry_time") or die(mysqli_error($connection)) ;



echo "<response>";

while($a=mysqli_fetch_array($y,MYSQL_NUM)){
//echo ">> ";
{ $time=$a[3]; 
	if(strcmp($a[2],$self) == 0){
		echo '<message time="'.$time.'" by="'.$withUser.'">'.$withUser ;
		echo " : ";
		echo $a[1].'</message>'; 
	}
	elseif(strcmp($a[2],$withUser) == 0){
		
		
		
		
		echo '<message time="'.$time.'" by="'.$self.'">'.$self;
		echo " : ";
		echo $a[1].'</message>'; 
	}
	//echo $a[2];  // username
	   // message
	
}
//echo "\n<br><br>";
}

echo "</response>";
?>