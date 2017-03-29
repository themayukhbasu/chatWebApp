<?php


include 'session.php';


if(!$_POST){

//include 'session.php';
echo '<form method="post" style="text-align:center" ><input type=submit name="logout" value="Log Out"></input></form>';

}


else 

{

session_unset();
session_destroy();
echo "you hav logged out<br>";
echo "<html><br><br><br><br><br><a href='login.php'>login again</html>";
}
?>