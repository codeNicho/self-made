<<<<<<< HEAD
<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Student Report</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>View Student Report</h2>
  </div>
  <form method="post" action="viewreportprincipal.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Student ID number</label>
  	  <input type="text" name="studid3t">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="viewreport1t">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
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
  <title>View Student Report</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>View Student Report</h2>
  </div>
  <form method="post" action="viewreportprincipal.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Student ID number</label>
  	  <input type="text" name="studid3t">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="viewreport1t">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
