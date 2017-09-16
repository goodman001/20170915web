<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Famox</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
	<script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<?php include 'public/nav.php';?>
	<div class=" bg">
	<div class="contain">
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
			$sql="select * from PRODUCT";
			$rs=mysql_query($sql,$con);
		?>
		<div class="bigtitle">Product Page</div>
		<!-- start category mgr page -->
		
		<div class="mgr">
			<div>
				<div class="noticecat">
					
					<?php
					  if($_GET['delproduct']=='true'){
					?>
					Delete successfully!
					<?php
					  }else if($_GET['delproduct']=='false'){
					?>
                    Delete failed!
					<?php
					  }
					?>
				</div>
				<!--HEADER-->
				<div class="rows">
					<div><a class="buttons" href="addproductpage.php">Add a new Product</a></div>
					<table class="gridtable">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Purchase price</th>
						<th>Sale price</th>
						<th>origin country</th>
						<th>Options</th>
					</tr>
						<?php
						/*get all category*/
						while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
						{ ?>
							<tr>
								<td><?php echo $row["product_id"]; ?></td>
								<td><?php echo $row["product_name"]; ?></td>
								<td><?php echo $row["product_purchase_price"]; ?></td>
								<td><?php echo $row["product_sale_price"]; ?></td>
								<td><?php echo $row["product_country_of_origin"]; ?></td>
								<td>
									<a class="buttons" href="editproductpage.php?id=<?php echo $row["product_id"];?>">Edit</a>
									<a class="buttons" href="postdelproduct.php?id=<?php echo $row["product_id"];?>">Delete</a>
								</td>
							</tr>
						<?php }
						?>
					</table>
				</div>
				<!-- CONTENT LIST -->
				

			</div>
		</div>
		
	</div>

   </div>
</body>
</html>
