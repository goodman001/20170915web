<?php session_start(); ?>
<div class="navbg" >
	<div class="navbar">
	<div class="navleft">
		<ul id="nav"> 
			<li><a href="index.php">HOME</a></li> 
			<li><a href="product.php">PRODUCT</a></li> 
			<li><a href="index.php">Famox</a></li> 
		</ul>
	</div>
	<div class="navright">
		<ul id="nav2"> 
			<?php if(empty($_SESSION['username'])){?>
			<li style="margin-left:40%;"><a class="enter" href="login.php">Login</a></li> 
			<?php }else{ ?>
			<li style="color:white;font-size:16px;">Dear Admin <?php echo $_SESSION['username'];?>,<a class="enter" href="<?php echo 'catmgr.php?catid='.$catid.'&cname='.$cname; ?>">visit my account</a></li>
			<li><a class="enter" href="logoff.php">Logout</a></li>
			<?php }?>
		</ul>
		
	</div>
	</div>
</div> 