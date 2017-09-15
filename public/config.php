<?php
// connect db config file
$con = mysql_connect("localhost", "root", "mysql");//("localhost", "yourID", "yourPass");
mysql_select_db("famaxdb", $con);//select database, "buildings" is my database name
?>