function loadDb()
{
var xmlhttpm,xmlhttpf;
var str = document.getElementById("netid").value;
var str2 = document.getElementById("email").value;

if(str.length==0)
 {
  alert("Please enter some value in text field");
  return;
}

if(str2.length==0)
 {
  alert("Please enter some value in text field");
  return;
}
if (window.XMLHttpRequest)
  {
  xmlhttpm=new XMLHttpRequest();
  xmlhttpf=new XMLHttpRequest();
  }
else
  {
  xmlhttpm=new ActiveXObject("Microsoft.XMLHTTP");
  xmlhttpf=new ActiveXObject("Microsoft.XMLHTTP");
  }
 xmlhttpm.onreadystatechange=function()
  {
  if (xmlhttpm.readyState==4 && xmlhttpm.status==200)
   {
    document.getElementById("netid").innerHTML=xmlhttpm.responseText;
	
   }
  }
  //Display if netid valid
  xmlhttpm.open("GET","emailNetidChecker.php?q="+str+"&str4=N",true); 
  xmlhttpm.send();
	
  xmlhttpf.onreadystatechange=function()
  {
  if (xmlhttpf.readyState==4 && xmlhttpf.status==200)
   {
    document.getElementById("email").innerHTML=xmlhttpf.responseText;
	
   }
  }
  //Display if email is valid
 xmlhttpf.open("GET","emailNetidChecker.php?q="+str2+"&str4=E",true);
 
  xmlhttpf.send();

}