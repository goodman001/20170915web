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
	$result=mysql_query($sql); 
	$count =mysql_result($result,0,"num");
	echo $count;
	if(!$count)// if the count is 0, we can insert the new record into the db
	{
		$productid = time();
		$sql="insert into PRODUCT(product_id,product_name,product_purchase_price,product_sale_price,product_country_of_origin) values($productid,'$name',$purchaseprice,$saleprice,'$origincountry')";
		mysql_query($sql,$con);//insert the new record into the table
		foreach($categories as $cell){
			$cell = addslashes(htmlspecialchars($cell));
			$sql="INSERT INTO PRODUCT_CATEGORY(product_id, category_id) VALUES ($productid,$cell)";
			mysql_query($sql,$con);
		}
		//mysql_query($sql,$con);//insert the new record into the table
		header("location: addproductpage.php?addproduct=true");
	}else
	{
		header("location: addproductpage.php?addproduct=false");
		exit;
	}
?>