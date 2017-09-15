<!DOCTYPE HTML>
<html>
<head>
    <title>Buildings Images Library</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
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
			$sql="select * from CATEGORY";
			$rscate=mysql_query($sql,$con);
	?>
	<div class=" bg">
	<div class="contain">
        <h3>Creat New Product</h3>
		<form action="postaddproduct.php" method="post" class="basic-grey" id="catformadd">
			<?php if($_GET['addproduct']=='true'){
			?>
			<label>
					<h4 style="color:red"><strong>Product add successfully!</strong></h4>
			</label>
			<?php
			  }else if($_GET['addproduct']=='false'){
			?>
			<label>
				<h4 style="color:red"><strong>Product add failed!</strong></h4>
			</label>
			<?php
			  }
			?>
			<h4>Product Detail:</h4>
			<label>
			<span>Name :</span>
			<input id="name" type="text" name="name"  placeholder="product name"  required />
			</label>
			<label>
			<span>Purchase Price :</span>
			<input id="purchaseprice" type="text" name="purchaseprice"  placeholder="Purchase Price"  required />
			</label>
			<label>
			<span>Sale Price :</span>
			<input id="saleprice" type="text" name="saleprice"  placeholder="Sale price"  required />
			</label>
			<label>
			<span>Origin country:</span>
			<input id="origincountry" type="text" name="origincountry"  placeholder="Origin country"  required />
			</label>
			<h4>Product Categories:</h4>
			
			<?php
			/*get all category*/
			while($row = mysql_fetch_array($rscate, MYSQL_ASSOC))
			{ ?>
				<label>
					<span></span>
					<div>
					<input name="category[]" type="checkbox" value="<?php echo $row["category_id"]; ?>" /><?php echo $row["category_name"]; ?>
					</div>
				</label>
			<?php }
			?>
			
			
			<label>
			<span>&nbsp;</span>
			<input type="submit" class="button" value="ADD" />
			</label>
		</form>
                
	</div>

   </div>
</body>
</html>
