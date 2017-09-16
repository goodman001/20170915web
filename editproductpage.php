<!DOCTYPE HTML>
<html>
<head>
    <title>Famox</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php include 'public/nav.php';?>
	<?php if(empty($_SESSION['username']) ){
				header("location: login.php");
			}
			/*connect mysql*/
			include 'public/config.php';
			// check to see if connection was successful
			if(!$con)
			{
				  echo "Error: Could not connect to database.  Please try again later.";
				  exit;
			}
			//echo $email; 
			/*create sql query to get the infomation from category */
			$productid = addslashes(htmlspecialchars($_GET['id']));
			$sql="select * from PRODUCT where product_id = $productid";
			//echo $sql;
			$rsproduct=mysql_query($sql,$con);
			//print_r($rsproduct);
			$sql="select category_id from PRODUCT_CATEGORY where product_id = '$productid'";
			$rsselectcate=mysql_query($sql,$con);
			$sql="select * from CATEGORY";
			$rscate=mysql_query($sql,$con);
	?>
	<div class=" bg">
	<div class="contain">
        <h3>Edit Product</h3>
		<form action="posteditproduct.php?id=<?php echo $productid;?>" method="post" class="basic-grey" >
			<?php if($_GET['editproduct']=='true'){
			?>
			<label>
					<h4 style="color:red"><strong>Product Edit successfully!</strong></h4>
			</label>
			<?php
			  }else if($_GET['editproduct']=='false'){
			?>
			<label>
				<h4 style="color:red"><strong>Product Edit failed!</strong></h4>
			</label>
			<?php
			  }
			?>
			<h4>Product Detail:</h4>
			<?php
			while($row = mysql_fetch_array($rsproduct, MYSQL_ASSOC)){
			?>
			<label>
			<span>Name :</span>
			<input id="name" type="text" name="name"  placeholder="product name" value="<?php echo $row["product_name"]; ?>" required />
			</label>
			<label>
			<span>Purchase Price :</span>
			<input id="purchaseprice" type="text" name="purchaseprice"  placeholder="Purchase Price" value="<?php echo $row["product_purchase_price"]; ?>" required />
			</label>
			<label>
			<span>Sale Price :</span>
			<input id="saleprice" type="text" name="saleprice"  placeholder="Sale price" value="<?php echo $row["product_sale_price"]; ?>" required />
			</label>
			<label>
			<span>Origin country:</span>
			<input id="origincountry" type="text" name="origincountry"  placeholder="Origin country" value="<?php echo $row["product_country_of_origin"]; ?>" required />
			</label>
			<?php
			}
			?>
			<h4>Product Categories:</h4>
			
			<?php
			/*get all category*/
			while($row = mysql_fetch_array($rscate, MYSQL_ASSOC))
			{
			?>
				<label>
					<span></span>
					<div>
					<input name="category[]" type="checkbox" value="<?php echo $row["category_id"]; ?>" /><?php echo $row["category_name"]; ?>
					</div>
				</label>
			<?php 
			}
			$cateselect = [];
			while($row = mysql_fetch_array($rsselectcate, MYSQL_ASSOC))
			{
				array_push($cateselect,$row["category_id"]);
			} 
			
			?>
			
			
			<label>
			<span>&nbsp;</span>
			<input type="submit" class="button" value="ADD" />
			</label>
		</form>
		
                
	</div>
	<div class="contain">
		<h3>Image upload</h3>
		
						
		
		
		
	</div>
   </div>
	<script>
		var checkselect = <?php echo json_encode($cateselect); ?>;
		console.log(checkselect);
		$("input[name^='category']").each(function(i){  
			//console.log(this.value);  
			if(checkselect.indexOf(this.value)>-1){
				console.log(this.value);  
				$(this).attr("checked",true);
			}

		});  
	</script>
</body>
</html>
