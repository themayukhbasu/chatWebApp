<html>

<h1>Friend List</h1>
<?php 
include 'session.php'; 
include 'database.php'; 

$query=mysqli_query($connection,"select user from registration");


echo '<form action="chat.php" method="get">';
	while ($a=mysqli_fetch_array($query,MYSQL_ASSOC))
	{
		$username = $a['user'];
		if(strcmp($username,$_SESSION['user']))
			echo '<input type="submit" name="chat_user" value="'.$a['user'].'"/><br><br>';
	}
echo '</form>';




?>

<br><br><br><br><br><br><br><br>
<a href ="logout.php">Log Out</a>
</html>