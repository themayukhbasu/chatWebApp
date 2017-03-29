
<html>
<title>My PC</title>

<h1>Register Here<h1>
</html>

<?php

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
<form method="post">


<input type="text" name="user"></input>  <br/>
<input type="password" name="pass"></input><br/>
<p>Please enter username as one single word</p>
<input type="submit"></input>

</form>



</html>' ; 

else 
{
$y=1;

$x=mysqli_connect("mysql1.000webhost.com","a5929102_chat","papun101#cybersoft","a5929102_chat") or die("nop ");
mysqli_query($x,"insert into registration values(NULL,'".$_POST['user']."','".$_POST['pass']."')");
if(strpos(mysqli_error($x),'Duplicate')!==false)
echo "username already exists";
else 
{
$user=$_POST['user'];

//table creation
mysqli_query($x,"CREATE TABLE $user (
id int PRIMARY KEY AUTO_INCREMENT,
message text,
conv text,
entry_time timestamp NOT NULL default current_timestamp

)");
//table creation end
}


echo "Thanks !!! ";
header("Location: login.php");

}

?>
<br/><br/><br/>
<a href="login.php">Log In Here</a>
</html>