<?php 
error_reporting(0);
require_once "class.MySQL.php";
$dbconnect = new MySQL();
$dbconnect->connectMySql("com.inc");
$ip=$_SERVER['REMOTE_ADDR'];
$d=date("Y-m-d H:i:s",time());
$d10=date("Y-m-d H:i:s",time()-864000);
if ($op=="insert"){
 if ($text!="") $dbconnect->query("insert into chat (date,name,pass,ip,color) values ('$d','$name','$pass','$ip','$color')");
}
$dbconnect->query("delete from chat where date < '$d10' ");
$result = $dbconnect->query("select date,name,text,color from chat order by date desc limit 10");
$data .= "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
for ($i = 0; $i < mysql_num_rows($result); $i++)  {
	$row_array = mysql_fetch_row($result);
  $data .= "<tr style=\"color:black;font:bold 8px Tahoma;background-color:$row_array[3];\"><td valign=\"top\" align=\"left\" style=\"width:50px;\">$row_array[0]</td>";
  $data .= "<td valign=\"top\" align=\"left\">$row_array[1]</td>";
  $data .= "<td valign=\"top\" style=\"width:200px;text-wrap:hard-wrap;\" align=\"left\">".wordwrap($row_array[2], 40, '<br>',true)."</td><tr>";
}
$data .="</table>";
print $data;
?>
