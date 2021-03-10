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
  <form method="post" action="assessteacher2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of Asessment</label>
  	  <input type="date" name="assessdate" required>
  	</div>
    <div class="input-group">
      <select id="assesstype" name="assesstype" required>
        <option value="" selected="selected">SELECT ASSESSMENT TYPE</option>
        <option value="Verbal">Verbal</option>
        <option value="Theory">Theory</option>
        <option value="Psychological">Psychological</option>
        <option value="Emotional">Emotional</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="assesssemester" name="assesssemester" required>
        <option value="" selected="selected">SELECT TERM</option>
        <option value="Term 1">Term 1</option>
        <option value="Term 2">Term 2</option>
        <option value="Term 3">Term 3</option>
        <!--<option value="Semester 4">Term 4</option>-->
      </select>
  	</div><br>
    <div class="input-group">
      <select id="assessduration" name="assessduration" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="1 Hour">1 Hour</option>
        <option value="2 Hours">2 Hours</option>
        <option value="3 Hours">3 Hours</option>
        <option value="4 Hours">4 Hours</option>
        <option value="5 or More Hours">5 or More Hours</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="assessperiod3" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="assessperiod3" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="assessperiod3" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="assessperiod3" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <div class="input-group">
        <select id="assessperformance3" name="assessperformance3" required>
          <option value="" selected="selected">ASSESSMENT PROGRESSION</option>
          <option value="Complete">Complete</option>
          <option value="Incomplete">Incomplete</option>
          <option value="Undecided">Undecided</option>
        </select>
    	</div><br>

      <label>Select A Class</label><br><br>
      <label>Grade 7 A</label>
      <input type="radio" id="one" name="assessperiod1" value="7 A" checked>
      <label for="one"></label><br><br>

      <label>Grade 8 A</label>
      <input type="radio" id="two" name="assessperiod1" value="8 A">
      <label for="two"></label><br><br>

      <label>Grade 9 A</label>
      <input type="radio" id="three" name="assessperiod1" value="9 A">
      <label for="three"></label><br><br>

      <label>Grade 10 A</label>
      <input type="radio" id="four" name="assessperiod1" value="10 A">
      <label for="four"></label><br><br>

      <label>Grade 11 A</label>
      <input type="radio" id="five" name="assessperiod1" value="11 A">
      <label for="five"></label><br><br>

      <div class="input-group">
        <select id="finalassess" name="finalassess" required>
          <option value="" selected="selected">Final Assessment</option>
          <option value="Good">Good</option>
          <option value="Excellent">Excellent</option>
          <option value="Satisfactory">Satisfactory</option>
          <option value="Unsatisfactory">Unsatisfactory</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="assessteach2">Upload Assessment Report</button>
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
  <title>Assess Teacher</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Assess Teacher</h2>
  </div>
  <form method="post" action="assessteacher2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Date of Asessment</label>
  	  <input type="date" name="assessdate" required>
  	</div>
    <div class="input-group">
      <select id="assesstype" name="assesstype" required>
        <option value="" selected="selected">SELECT ASSESSMENT TYPE</option>
        <option value="Verbal">Verbal</option>
        <option value="Theory">Theory</option>
        <option value="Psychological">Psychological</option>
        <option value="Emotional">Emotional</option>
      </select>
  	</div><br>
    <div class="input-group">
      <select id="assesssemester" name="assesssemester" required>
        <option value="" selected="selected">SELECT TERM</option>
        <option value="Term 1">Term 1</option>
        <option value="Term 2">Term 2</option>
        <option value="Term 3">Term 3</option>
        <!--<option value="Semester 4">Term 4</option>-->
      </select>
  	</div><br>
    <div class="input-group">
      <select id="assessduration" name="assessduration" required>
        <option value="" selected="selected">SELECT ATTENDANCE</option>
        <option value="1 Hour">1 Hour</option>
        <option value="2 Hours">2 Hours</option>
        <option value="3 Hours">3 Hours</option>
        <option value="4 Hours">4 Hours</option>
        <option value="5 or More Hours">5 or More Hours</option>
      </select>
  	</div><br>


  	  <label>Select Period</label><br>
      <input type="radio" id="one" name="assessperiod3" value="1st" checked>
      <label for="one">1<sup>st<sup></label><br>

      <input type="radio" id="two" name="assessperiod3" value="2nd">
      <label for="two">2<sup>nd<sup></label><br>


      <input type="radio" id="three" name="assessperiod3" value="3rd">
      <label for="three">3<sup>rd<sup></label><br>

      <input type="radio" id="four" name="assessperiod3" value="4th">
      <label for="four">4<sup>th<sup></label><br><br>

      <div class="input-group">
        <select id="assessperformance3" name="assessperformance3" required>
          <option value="" selected="selected">ASSESSMENT PROGRESSION</option>
          <option value="Complete">Complete</option>
          <option value="Incomplete">Incomplete</option>
          <option value="Undecided">Undecided</option>
        </select>
    	</div><br>

      <label>Select A Class</label><br><br>
      <label>Grade 7 A</label>
      <input type="radio" id="one" name="assessperiod1" value="7 A" checked>
      <label for="one"></label><br><br>

      <label>Grade 8 A</label>
      <input type="radio" id="two" name="assessperiod1" value="8 A">
      <label for="two"></label><br><br>

      <label>Grade 9 A</label>
      <input type="radio" id="three" name="assessperiod1" value="9 A">
      <label for="three"></label><br><br>

      <label>Grade 10 A</label>
      <input type="radio" id="four" name="assessperiod1" value="10 A">
      <label for="four"></label><br><br>

      <label>Grade 11 A</label>
      <input type="radio" id="five" name="assessperiod1" value="11 A">
      <label for="five"></label><br><br>

      <div class="input-group">
        <select id="finalassess" name="finalassess" required>
          <option value="" selected="selected">Final Assessment</option>
          <option value="Good">Good</option>
          <option value="Excellent">Excellent</option>
          <option value="Satisfactory">Satisfactory</option>
          <option value="Unsatisfactory">Unsatisfactory</option>
        </select>
    	</div><br>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="assessteach2">Upload Assessment Report</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreport"><a href="principalindex.php" style='color:white;'>Cancel</a></button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
