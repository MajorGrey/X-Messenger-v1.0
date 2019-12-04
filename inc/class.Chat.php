<?php
/****
File name : class.Chat.php
Description : Class for create simple chat.
Author : Petr Rezac
Date : 12th May 2010
Version : 1.0
Copyright (c) 2010 PR-Software <prezac@pr-software.net>
****/
class Chat{
 var $userName;    // input data 
 function createChat($username){
 if ($username=="") $username='Jm⁄no/Name';
  print "<script type=\"text/javascript\"> 
function send(){
  if ((document.getElementById('chatname').value=='')||(document.getElementById('chatname').value=='Jm⁄no/Name')) {
    alert(\"Napi‹ svoje jm⁄no.\\nType you name here.\");
    document.getElementById('chatname').focus();
  }else{
    document.getElementById('chatop').value = 'insert';
    ajax();
    document.getElementById('chattext').value = '';
    document.getElementById('chattext').focus();
  }
}

function ajax() {
  document.getElementById('chatbox').innerHTML = 'odes›lﬂn›/sending...';
  var chat = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject(\"Microsoft.XMLHTTP\") : false));
  if(!chat){
    ret='Chyba/Error JavaScript!!!';
  }else{
    chat.open(\"POST\", \"chat.php\", false);
    chat.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded\");
    chat.send(\"color=\"+document.getElementById('chatcolor').value+\"&name=\"+document.getElementById('chatname').value+\"&text=\"+document.getElementById('chattext').value+\"&op=\"+document.getElementById('chatop').value);
    if (chat.readyState == 4){ //has been respond
   	if(chat.status == 200 || chat.status==0){
     ret=chat.responseText;
   	}else{
	   ret=\"Chyba/Error!!!\"+ chat.status +\":\"+ chat.statusText;
  	}
   }
  }
  document.getElementById('chatbox').innerHTML = ret;
  document.getElementById('chatop').value = 'refresh';
  setTimeout(\"ajax()\", 20000);
}

window.onload=function(){ 
  setTimeout(\"ajax()\", 1000); 
}
</script>";
  print "<table width=\"340px\" style=\"border: 1px solid #7E7E81;\"><tr style=\"color:orange;font-weight: bold;background-color:#A5006F;\"><td align=\"left\">Chat</td></tr><tr><td align=\"center\">"; 
  print "<div style=\"height:200px;overflow:auto;\" id=\"chatbox\" name=\"chatbox\"></div></td></tr><tr style=\"background-color:#cccccc;\"><td align=\"center\" valign=\"top\">";
  print "<input type=\"hidden\" name=\"chatop\" id=\"chatop\" value=\"refresh\">"; 
  print "<input style=\"width:80px;font:bold 10px Tahoma; padding:0;background:#f2feff;\" maxlength=\"12\" title=\"Jm⁄no/Name\" type=\"text\" name=\"chatname\" id=\"chatname\" value=\"$username\">";
  print "<input style=\"width:150px;font:bold 10px Tahoma; padding:0;background:#f2feff;\" title=\"Text\" type=\"text\" name=\"chattext\" id=\"chattext\">";
  print "<select style=\"width:50px;font:bold 10px Tahoma; padding:0;background:#f2feff;\" title=\"Barva textu/Text color\" name=\"chatcolor\" id=\"chatcolor\"><option value=\"#ff6666\">red</option><option value=\"#6699ff\">blue</option><option value=\"#99cc66\">green</option><option value=\"#ffff99\">yelow</option><option value=\"#ff6600\">orange</option></select>";
  print "<input style=\"width:16px;height:16px;font:bold 10px Tahoma;background-color:transparent;background:#A5006F;\" title=\"Ode‹li/Send\" type=\"button\" value=\">\" onclick=\"send();\">";
  print "</td></tr></table>";
  }
}
?>
