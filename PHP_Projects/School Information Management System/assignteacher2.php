<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Assign Teacher</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Assign Teacher to Class</h2>
  </div>
  <form method="post" action="assignteacher2.php">
  	<?php include('errors.php'); ?>

  	  <label>Select A Class</label><br><br>
      <label>Grade 7 A</label>
      <input type="radio" id="one" name="period1" value="7 A" checked>
      <label for="one"></label><br><br>

      <label>Grade 8 A</label>
      <input type="radio" id="two" name="period1" value="8 A">
      <label for="two"></label><br><br>

      <label>Grade 9 A</label>
      <input type="radio" id="three" name="period1" value="9 A">
      <label for="three"></label><br><br>

      <label>Grade 10 A</label>
      <input type="radio" id="four" name="period1" value="10 A">
      <label for="four"></label><br><br>

      <label>Grade 11 A</label>
      <input type="radio" id="five" name="period1" value="11 A">
      <label for="five"></label><br><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="assignteach3">Assign Teacher</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="viceprincipalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
