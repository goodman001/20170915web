<?php
	/*
	* postlog.php is used to check whether the loging pass or not
	*/
	/*
	* logging
	*  flag: whether login success 1: success 0:fail
	*/
	session_start(); //start session to check login state
	/*get post value, filter special character*/
	$username = addslashes(htmlspecialchars($_POST['username']));
	$pwd = addslashes(htmlspecialchars($_POST['pwd']));
	//echo $type;
	/*connect mysql*/
	include 'public/config.php';
	//$con = mysql_connect("localhost", "root", "mysql");//("localhost", "yourID", "yourPass");
	// check to see if connection was successful
	if(!$con)
	{
	  echo "Error: Could not connect to database.  Please try again later.";
	  exit;
	}
	/*get logging para*/
	$ip =  $_SERVER["REMOTE_ADDR"];//host ip
	$host = $_SERVER['HTTP_HOST'];//http host
	$date_time = date('Y-m-d H:i:s');//get date and time
	$useragent = $_SERVER['HTTP_USER_AGENT'];//get useragent	  
	/*create sql query to check if the username if in the dababase*/
	$tablename = "ADMIN";//super admin
	$sql="select count(uname) as num from ".$tablename." where uname='$username' and pword='$pwd'"; 
	$result=mysql_query($sql); 
	$count =mysql_result($result,0,"num");
	if($count)// if the count is 1, we can login successfully
	{
	
		$_SESSION['username'] = $username;//set session
		echo("logcess");
		header("location: index.php");
	}else
	{
		session_unset();
		session_destroy();//clear the session
		header("location: login.php?failure=wrong");
	}
   
   
   
?>
