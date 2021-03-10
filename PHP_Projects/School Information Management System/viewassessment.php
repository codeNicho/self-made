<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Assesment</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>View Teacher Assessment</h2>
  </div>
  <form method="post" action="viewassessment.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Teacher ID number</label>
  	  <input type="text" name="teachid6">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="viewassessment6">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="viceprincipalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
