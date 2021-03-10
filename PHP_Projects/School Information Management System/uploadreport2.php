<<<<<<< HEAD
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
  	<h2>Upload Student Report</h2>
  </div>
  <form method="post" action="uploadreport2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of report</label>
  	  <input type="date" name="repdate" required>
  	</div>
    <div class="input-group">
      <select id="status" name="status" required>
        <option value="" selected="selected">SELECT A STATUS</option>
        <option value="excellent">Excellent</option>
        <option value="good">Good</option>
        <option value="satisfactory">Satisfactory</option>
        <option value="unsatisfactory">Unsatisfactory</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="subject" name="subject" required>
        <option value="" selected="selected">SELECT A SUBJECT</option>
        <option value="english_language">English Language</option>
        <option value="mathematics">Mathematics</option>
        <option value="socialstudies">Social Studies</option>
        <option value="biology">Biology</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="attendance" name="attendance" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="20%">20%</option>
        <option value="40%">40%</option>
        <option value="60%">60%</option>
        <option value="80%">80%</option>
        <option value="100%">100%</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="period" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="period" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="period" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="period" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <label for="score">Score(0-100)</label><br>
      <input type="number" id="score" name="score" min="0" max="100" required>

      <div class="input-group">
        <select id="performance" name="performance" required>
          <option value="" selected="selected">SELECT PERFORMANCE REMARK</option>
          <option value="pass">Pass</option>
          <option value="fail">Fail</option>
          <option value="NA">Not Available</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="uploadreport">Upload Report</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="teacherindex.php" style='color:white;'>Cancel</a></button>
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
  <title>Upload Report</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Upload Student Report</h2>
  </div>
  <form method="post" action="uploadreport2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of report</label>
  	  <input type="date" name="repdate" required>
  	</div>
    <div class="input-group">
      <select id="status" name="status" required>
        <option value="" selected="selected">SELECT A STATUS</option>
        <option value="excellent">Excellent</option>
        <option value="good">Good</option>
        <option value="satisfactory">Satisfactory</option>
        <option value="unsatisfactory">Unsatisfactory</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="subject" name="subject" required>
        <option value="" selected="selected">SELECT A SUBJECT</option>
        <option value="english_language">English Language</option>
        <option value="mathematics">Mathematics</option>
        <option value="socialstudies">Social Studies</option>
        <option value="biology">Biology</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="attendance" name="attendance" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="20%">20%</option>
        <option value="40%">40%</option>
        <option value="60%">60%</option>
        <option value="80%">80%</option>
        <option value="100%">100%</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="period" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="period" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="period" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="period" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <label for="score">Score(0-100)</label><br>
      <input type="number" id="score" name="score" min="0" max="100" required>

      <div class="input-group">
        <select id="performance" name="performance" required>
          <option value="" selected="selected">SELECT PERFORMANCE REMARK</option>
          <option value="pass">Pass</option>
          <option value="fail">Fail</option>
          <option value="NA">Not Available</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="uploadreport">Upload Report</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="teacherindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
