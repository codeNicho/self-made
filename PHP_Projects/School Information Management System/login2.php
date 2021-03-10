<?php
session_start();
?>
<?php //include('server.php')
?>
<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Parents Login</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Parents Login</h2>
  </div>

  <form method="post" action="login2.php">
  	<?php //include('errors.php');
    ?>
    <?php include('errors2.php'); ?>
  	<div class="input-group">
  		<label>ID Number</label>
  		<input type="text" name="idd" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="passwordd">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_userd">Login</button>
  	</div>
  </form>
</body>
</html>
