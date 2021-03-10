<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Off Vp</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Sign Off Vice Principal Activities</h2>
  </div>
  <form method="post" action="signoffvp.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter VP ID number</label>
  	  <input type="text" name="vpid">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="searchvpid">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
