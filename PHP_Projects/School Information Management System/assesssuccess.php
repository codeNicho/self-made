<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Assess Teacher</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Teacher Assessment Successfully Stored!!</h2>
  </div>
  <form method="post" action="assesssuccess.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="viceprincipalindex.php" style='color:white;'>Click Here To Return Home</a></button>
  	</div>
  </form>
</body>
</html>