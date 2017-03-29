<?php 
include 'session.php';
include 'database.php';

$withUser=$_GET['chat_user'];



?>





<!DOCTYPE html>
<html>
<head>
<style>

body
{
text-align:center;
}


#send{
	height:50px;
}


#chatbox {
    text-align:left;
    font-family: "Times New Roman", Times, serif;
    margin-bottom:5px;
	margin:0 auto; 
	text-align:center; 
    padding:10px;
    background:#fff;
    height:500px;
    width:90%;
    border:1px solid ;
	scrollbar-color:#000000;
    overflow:auto; 
}

#to,#from 
{
padding:5px;
box-shadow:0px 8px 23px #524E4E;
}


#from
{
background-color:#E5EBA7;
border-radius:5px;
float:left;

}


#to{
background-color:#F7C3C4;
border-radius:5px;
float:right;
}


#message{
	
	height:50px;
	width:85%;
	margin:0 auto;
	font-family: "Times New Roman", Times, serif;
	border:1px solid ;
	font-style:italic;
	
	background-image: -ms-linear-gradient(top, #FFCC80 0%, #FFC8B0 100%);

background-image: -moz-linear-gradient(top, #FFCC80 0%, #FFC8B0 100%);

background-image: -o-linear-gradient(top, #FFCC80 0%, #FFC8B0 100%);

background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFCC80), color-stop(100, #FFC8B0));

background-image: -webkit-linear-gradient(top, #FFCC80 0%, #FFC8B0 100%);

background-image: linear-gradient(to bottom, #FFCC80 0%, #FFC8B0 100%);

}	
</style>
<script>

function load()
{
var request=new XMLHttpRequest();
request.open("GET",<?php echo "\"mfetch.php?chat_user=$withUser\""?>,true);
request.send();

request.onreadystatechange=function()

{
if(request.readyState==4)
document.getElementById("chatbox").innerHTML=request.responseText;
var objDiv = document.getElementById("chatbox");
objDiv.scrollTop = objDiv.scrollHeight;
}


}

function post_chat(){
var request=new XMLHttpRequest();
request.open("POST","postchat.php",true);
request.setRequestHeader("Content-type","application/x-www-form-urlencoded");



//var str= "".concat("friend=","<?php echo $withUser ?>","&","message=",document.getElementById("message").value;
//equest.send(str);
request.send("friend="+"<?php echo $withUser ; ?>"+"&message="+document.getElementById("message").value);

document.getElementById("message").value="";

request.onreadystatechange=function()
{
if(request.readyState==4)
load();
}






}

function displayunicode(e){


var unicode=e.keyCode? e.keyCode : e.charCode;

if(unicode==13)
post_chat();
}
</script>
</head>


<body onload="setInterval(function(){load();},150)">


<div id="chatbox"> 
</div>
<textarea id="message" onkeyup="displayunicode(event); " ></textarea> 

</body>
<button id="send" onclick="post_chat()">Send</button>
<br>
<a href="menu.php">Friend List</a><br>
<a href="logout.php">Log Out</a>


</html>




