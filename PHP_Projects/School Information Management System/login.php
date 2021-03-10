<?php
session_start();
?>
<?php include('server.php') ?>
<?php //include('server2.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
    <?php //include('errors2.php');
    ?>
  	<div class="input-group">
  		<label>ID Number</label>
  		<input type="text" name="id" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
    <!--
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>-->
    <div class="header">
    <h4>
  	 <a href="login2.php" style='color:white'>Parents please click here to Log in</a>
   </h4>
  </div>
  </form>
</body>
</html>
