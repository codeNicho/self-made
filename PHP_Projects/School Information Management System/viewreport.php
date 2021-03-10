<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Report</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>View Student Report</h2>
  </div>
  <form method="post" action="viewreport.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Student ID number</label>
  	  <input type="text" name="studid3">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="viewreport1">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="teacherindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
