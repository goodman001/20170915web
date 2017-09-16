<?php
   /*
   * me is used to delete user record in cuser
   */
   session_start();
   //check if session is alive
   if(empty($_SESSION['username']))
   {
      header("location: login.php");
      exit;
   }
   /*get post value, filter special character*/
   $id = addslashes(htmlspecialchars($_GET['id']));
   /*connect mysql*/
   include 'public/config.php';
   // check to see if connection was successful
   if(!$con)
   {
      echo "Error: Could not connect to database.  Please try again later.";
      exit;
   }
   /*create sql query to delete user*/
   $sql="delete from PRODUCT where product_id='$id'";
   $result=mysql_query($sql);
   if($result)// delete successfully
   {
      header("location: product.php?delproduct=true");
   }else
   {
      header("location: product.php?delproduct=false");
      exit;
   }
?>