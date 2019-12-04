<?php
/****
File name : class.MySQL.php
Description : Class for connect and query MySQL database.
Author : Petr Rezac
Date : 22th Feb 2009
Version : 1.0
Copyright (c) 2009 PR-Software <prezac@pr-software.net>
****/
class MySQL{
  var $hostName;
  var $userName;
  var $password;
  var $databaseName;
  var $databaseCharset; //utf8,latin1,latin2,cp1250
  var $persistent; //0,1
  var $query;
  var $queryNumRow;
  var $queryTime;
  var $dbo = null;
  //create connect to database
  function connectMySql($inifile) {
    $ini = parse_ini_file($inifile); 
    while(list($key,$value) = each($ini)){ 
      if($key == 'hostName'){ 
        $hostName = $value; 
      } 
      else if($key == 'userName'){ 
        $userName = $value; 
      } 
      else if($key == 'password'){ 
        $password = $value; 
      } 
      else if($key == 'databaseName'){ 
        $databaseName = $value; 
      } 
      else if($key == 'persistent'){ 
        $persistent = $value; 
      } 
      else if($key == 'databaseCharset'){ 
        $databaseCharset = $value; 
      } 
    } 
    $this->hostName = $hostName; 
    $this->userName = $userName; 
    $this->password = $password; 
    $this->databaseName = $databaseName;
    $this->persistent = $persistent;
    $this->databaseCharset = $databaseCharset;
    $this->connectDbServer(); 
    $this->selectDb();
    return true;
  }  
  // connect to db server  
  function connectDbServer() {
    if (!function_exists('mysql_connect')){
      die(M_ERROR48);
    }else{
      if ($this->persistent==1){
        $this->dbo = mysql_pconnect($this->hostName,$this->userName,$this->password) or die(M_ERROR3);
      }else{
        $this->dbo = mysql_connect($this->hostName,$this->userName,$this->password) or die(M_ERROR3);   
      }
    }
  }
  // select or change database and db connection charset
  function selectDb() {
    mysql_select_db($this->databaseName,$this->dbo) or DIE(M_ERROR4);
    mysql_query ("SET NAMES $this->databaseCharset");
  }
  // function for metering query lenght
  function currentMicrotime(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
  }
  // database query      
  function query($query){
    $start_time = $this->currentMicrotime();
    $result = mysql_query($query, $this->dbo) or die(M_ERROR49.": <br />". nl2br($query));
    $this->queryNumRow = @mysql_num_rows($result);
    $this->queryTime = $this->currentMicrotime() - $start_time;
    return $result;
    @mysql_free_result($result);
  }

  //convert mysqlresult to data array
  function resultToArray($result){
   $return_array = array();
 	 // how many rows in this table
	 $num=@mysql_num_rows($result);
	 if($num==false) return false;
 	 // number of affected fields			
	 $num_fiel = @mysql_num_fields($result);
	 if($num_fiel==false)	return false;
 	 // make return array 
	 for($i=0;$i<$num;$i++){	//loop through affected rows
 	  for($a=0;$a<$num_fiel;$a++){	// and with in it loop through each field in a row
 		 //$curr_key = mysql_field_name($result,$a);	//get the name of the field
		 //$return_array[$i][$curr_key] = mysql_result($result,$i,$curr_key); // put the value in the array
     $return_array[$i][$a] = mysql_result($result,$i,$a);					
		}
	 }
	 return $return_array;			
  }
  
  //close connect to database
  function close(){ 
    return @mysql_close($this->dbo); 
  } 
}
?>
