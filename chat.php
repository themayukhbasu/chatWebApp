<?php 
include 'session.php';
include 'database.php';

$withUser=$_GET['chat_user'];
?>





<!DOCTYPE html>
<html>
<head>
	<title>Chat With <?php echo $withUser; ?></title>

<style>
@font-face {    
	font-family: CookieMonster;
    src: url(SomethingStrange.ttf);
}

body
{
	text-align:center;
}


#send{
	height:50px;
}


#chatbox {
	/*background-color: rgba(232, 142, 142, 1);   */
    font-family: "Times New Roman", Times, serif;
    margin-bottom:5px;
	margin:0 auto; 
	text-align:center; 
    padding:10px;   
    height:500px;
    width:90%;
    border:1px solid ;
	
  overflow:auto;
}

#to,#from 
{border-radius:15px;
padding:15px;
word-wrap:break-word;
max-width:60%;

font-family:CookieMonster;


}


#from
{
	text-align:left;
	background-color:#E5EBA7;
	float:left;
	box-shadow:0px 8px 10px #524E4E;
}

#to{
	background-color:#F7C3C4;
	float:right;
	box-shadow:0px 8px 23px #524E4E;
	text-align:right;
}

#message{

	height:50px;
	width:85%;
	margin:0 auto;
	font-family: "Times New Roman", Times, serif;
	border:1px solid ;
	font-style:italic;
	background-color: rgba(232, 232, 72, 1); 

}	
</style>
<script>
var state=4;
var time_last;
var withUser;
var finalt="";
function load()
{finalt="";
var request=new XMLHttpRequest();
request.open("GET",<?php echo "\"mfetch.php?chat_user=$withUser\""?>,true);
request.send();

request.onreadystatechange=function()

{
if(request.readyState==4){
var response=request.responseXML; 

for(var i=0;i<response.getElementsByTagName("message").length;i++){

if(response.getElementsByTagName("message")[i].getAttribute('by')==<?php echo '"'.$_SESSION['user'].'"'; ?>)
finalt=finalt+"<span id='to'>"+response.getElementsByTagName("message")[i].childNodes[0].nodeValue+"</span>"+"<br/><br/><br/>";
else
finalt=finalt+"<span id='from'>"+response.getElementsByTagName("message")[i].childNodes[0].nodeValue+"</span>"+"<br/><br/><br/>";

document.getElementById("chatbox").innerHTML=finalt;

}
time_last=response.getElementsByTagName("message")[i-1].getAttribute("time");
//document.write(time_last);
//update();
}
//var objDiv = document.getElementById("chatbox");
//objDiv.scrollTop = objDiv.scrollHeight;
}
//setInterval(function(){update()},2000);
update();
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
{
//load();

}
}
}
function update()
{




finalt="";
var request=new XMLHttpRequest;
request.open("POST","updater.php",true);
request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
request.send("time="+time_last+"&withUser="+"<?php echo $withUser ; ?>");
request.onreadystatechange=function ()
{state=request.readyState;
if(request.readyState==4)
{document.write('got it');
}

}


}






function sound(){
var snd = new Audio("ping.mp3"); // buffers automatically when created
snd.play();
}





function displayunicode(e){


var unicode=e.keyCode? e.keyCode : e.charCode;

if(unicode==13)
post_chat();
}
</script>
</head>


<body onload="load(); ">


<div id="chatbox"> 
</div>
<textarea id="message" onkeyup="displayunicode(event); " ></textarea>  
<button onclick="post_chat()">Send</button>
<br>
<a href="menu.php">Friend List</a><br>
<a href="logout.php">Log Out</a>



</body>
</html>




