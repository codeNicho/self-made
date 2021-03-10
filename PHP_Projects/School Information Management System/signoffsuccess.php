<<<<<<< HEAD
<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Off Activities</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Teacher's Activities Sucessfully Signed Off!!</h2>
  </div>
  <form method="post" action="signoffsuccess.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Click Here To Return Home</a></button>
  	</div>
  </form>
</body>
</html>
=======
<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Off Activities</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Teacher's Activities Sucessfully Signed Off!!</h2>
  </div>
  <form method="post" action="signoffsuccess.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Click Here To Return Home</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
