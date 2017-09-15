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
	<div class=" bg">
	<div class="contain">
        <form action="postlog.php" method="post" class="basic-grey" id="formlogin">
            <h1>Login
            </h1>
            <label>
            <span>Username :</span>
            <input id="username" type="text" name="username"  placeholder="Username"  required />
            </label>
            <label>
            <span>Password :</span>
            <input id="pwd" type="password" name="pwd" placeholder="Your password" required />
            </label>
            <?php if($_GET['failure']=='wrong'){
                $_GET['failure']="";
            ?>
            <label>
                    <h3 style="color:red"><strong>Username or password is wrong!</strong></h3>
            </label>
            <?php
              }
            ?>

            <label>
            <span>&nbsp;</span>
            <input type="submit" class="button" value="Login" />
            </label>
        </form>
                
	</div>

   </div>
</body>
</html>
