<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Teacher Activity</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>View Teacher Activity</h2>
  </div>
  <form method="post" action="viewactiv.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Teacher ID number</label>
  	  <input type="text" name="teachid">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="viewactiv">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelactiv"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
