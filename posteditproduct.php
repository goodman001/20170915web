<?php
   /*
   * me is used to create a new record into category
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
    $name = addslashes(htmlspecialchars($_POST['name']));
	$purchaseprice = addslashes(htmlspecialchars($_POST['purchaseprice']));
	$saleprice = addslashes(htmlspecialchars($_POST['saleprice']));
	$origincountry = addslashes(htmlspecialchars($_POST['origincountry']));
	$categories = $_POST['category'];
	//print_r($categories);
	/*connect mysql*/
	include 'public/config.php';
	// check to see if connection was successful
	if(!$con)
	{
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
	}
	/*create sql query to check if the category is in the dababase*/
	$sql="select count(*) as num from PRODUCT where product_name='$name'"; 
	$sql="update PRODUCT set product_name='$name',product_purchase_price= $purchaseprice,product_sale_price=$saleprice,product_country_of_origin='$origincountry' where product_id='$id'";
	$result=mysql_query($sql);
	if($result)//  update successfully
	{
		$sql="delete from PRODUCT_CATEGORY where product_id='$id'";
   		$result=mysql_query($sql);
		foreach($categories as $cell){
			$cell = addslashes(htmlspecialchars($cell));
			$sql="INSERT INTO PRODUCT_CATEGORY(product_id, category_id) VALUES ($id,$cell)";
			mysql_query($sql,$con);
		}
		header("location: editproductpage.php?id=".$id."&editproduct=true");
	}else
	{
		header("location: editproductpage.php?id=".$id."&editproduct=false");
		exit;
	}
	
?>