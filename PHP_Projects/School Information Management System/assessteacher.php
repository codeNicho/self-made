<<<<<<< HEAD
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
  	<h2>Assess Teacher</h2>
  </div>
  <form method="post" action="assessteacher.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Teacher ID number</label>
  	  <input type="text" name="teachid5">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="assessteach">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="viceprincipalindex.php" style='color:white;'>Cancel</a></button>
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
  <title>Assess Teacher</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Assess Teacher</h2>
  </div>
  <form method="post" action="assessteacher.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Teacher ID number</label>
  	  <input type="text" name="teachid5">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="assessteach">Search</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="viceprincipalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
