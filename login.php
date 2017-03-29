<html>
<title>Login</title>
<h1>Login Here</h1>


<?php
session_start();
if($_SESSION){

header("Location: menu.php");


}
if(!$_POST)
echo '<html>
<style>
body{
font-family:Arial;


}


input{


border-radius:50px;
margin:25px;



}</style>
<form   method="post">


<input type="text" name="user" name="login_username"></input>  <br/>
<input type="password" name="pass" name="login_password"></input><br/>
<input type="submit"></input>

</form>



</html>' ; 

else{

$user= $_POST['user'];
$pass= $_POST['pass'];
include 'database.php' ;

$y= mysqli_query($connection,"SELECT * FROM `registration` where user='".$user."' and pass='".$pass."' ") or die(mysqli_error($x));
$a=mysqli_fetch_array($y,MYSQL_NUM);
if(!$a)
echo "incorrect user/pass";
else{
echo 'welcome,  '.$_POST['user'];

start($user,$pass);
}
}

function start($user,$pass)

{

session_start();
$_SESSION['user']=$user;
$_SESSION['pass']=$pass; 
echo "\n redirecting ";

echo "hi";
header("Location: menu.php");
}


?>


<p">Not registerd yet?</p>
<a href="register.php" style="text-align:center">Register here</a>

</html>