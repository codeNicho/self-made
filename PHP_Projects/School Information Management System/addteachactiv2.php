<<<<<<< HEAD
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
  <form method="post" action="addteachactiv2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of Activity</label>
  	  <input type="date" name="activdate" required>
  	</div>
    <div class="input-group">
      <select id="activtype" name="activtype" required>
        <option value="" selected="selected">SELECT ACTIVITY TYPE</option>
        <option value="Mark Tests">Mark Tests</option>
        <option value="Invigilation">Invigilation</option>
        <option value="Teach Class">Teach Class</option>
        <option value="Supervise Detention">Supervise Detention</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="semester" name="semester" required>
        <option value="" selected="selected">SELECT SEMESTER</option>
        <option value="Semester 1">Sem 1</option>
        <option value="Semester 2">Sem 2</option>
        <option value="Semester 3">Sem 3</option>
        <option value="Semester 4">Sem 4</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="duration" name="duration" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="1 Hour">1 Hour</option>
        <option value="2 Hours">2 Hours</option>
        <option value="3 Hours">3 Hours</option>
        <option value="4 Hours">4 Hours</option>
        <option value="5 or More Hours">5 or More Hours</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="period3" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="period3" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="period3" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="period3" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <label for="involved">Individuals Involved(0-200)</label><br>
      <input type="number" id="involved" name="involved" min="0" max="200" required>

      <div class="input-group">
        <select id="performance3" name="performance3" required>
          <option value="" selected="selected">ACTIVITY PROGRESSION</option>
          <option value="Complete">Complete</option>
          <option value="Incomplete">Incomplete</option>
          <option value="Undecided">Undecided</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="uploadteachactiv">Upload Report</button>
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
  <title>Add Teacher Activity</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Add Teacher Activity</h2>
  </div>
  <form method="post" action="addteachactiv2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of Activity</label>
  	  <input type="date" name="activdate" required>
  	</div>
    <div class="input-group">
      <select id="activtype" name="activtype" required>
        <option value="" selected="selected">SELECT ACTIVITY TYPE</option>
        <option value="Mark Tests">Mark Tests</option>
        <option value="Invigilation">Invigilation</option>
        <option value="Teach Class">Teach Class</option>
        <option value="Supervise Detention">Supervise Detention</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="semester" name="semester" required>
        <option value="" selected="selected">SELECT SEMESTER</option>
        <option value="Semester 1">Sem 1</option>
        <option value="Semester 2">Sem 2</option>
        <option value="Semester 3">Sem 3</option>
        <option value="Semester 4">Sem 4</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="duration" name="duration" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="1 Hour">1 Hour</option>
        <option value="2 Hours">2 Hours</option>
        <option value="3 Hours">3 Hours</option>
        <option value="4 Hours">4 Hours</option>
        <option value="5 or More Hours">5 or More Hours</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="period3" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="period3" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="period3" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="period3" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <label for="involved">Individuals Involved(0-200)</label><br>
      <input type="number" id="involved" name="involved" min="0" max="200" required>

      <div class="input-group">
        <select id="performance3" name="performance3" required>
          <option value="" selected="selected">ACTIVITY PROGRESSION</option>
          <option value="Complete">Complete</option>
          <option value="Incomplete">Incomplete</option>
          <option value="Undecided">Undecided</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="uploadteachactiv">Upload Report</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
