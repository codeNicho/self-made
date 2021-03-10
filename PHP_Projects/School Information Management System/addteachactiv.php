<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Teacher Activity</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Add Teacher Activity</h2>
  </div>
  <form method="post" action="addteachactiv.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Teacher ID number</label>
  	  <input type="text" name="teachid2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="searchteachactiv">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
