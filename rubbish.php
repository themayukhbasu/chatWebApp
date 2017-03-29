<!DOCTYPE html>



<html>
<head>
<script>

function loadXML()
{
var request = new XMLHttpRequest(); 

request.open("GET"," chatx.xml",true);
request.send();

request.onreadystatechange=function()

{
if(request.readyState==4){
var response = request.responseXML; 

document.write(response.getElementsByTagName("hello2")[0].childNodes[0].nodeValue);}
}


}












</script>



</head>
<body onload="loadXML();">
</body>

</html>