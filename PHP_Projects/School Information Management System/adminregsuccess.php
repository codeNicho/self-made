<?php
session_start();
include('server.php');
include('server2.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Report</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Record Uploaded Sucessfully!!</h2>
  </div>
  <form method="post" action="adminregsuccess.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
      <?php
      echo "Please Collect Your Profile Information Below"."<br>";
      if(isset($_SESSION['title'])){
        echo "First Name: ".$_SESSION['fname']."<br>";
        echo "Last Name: ".$_SESSION['lname']."<br>";
        echo "ID Number: ".$_SESSION['id']."<br>";
        echo "Title: ".$_SESSION['title']."<br>";
        echo "Date of Birth: ".$_SESSION['dob']."<br>";
        echo "Password: ".$_SESSION['password']."<br>";
        echo "Email: ".$_SESSION['email']."<br>";
        echo "=============================="."<br>";
      }
      if(isset($_SESSION['ptitle'])){
      echo "Parent Information"."<br>";
      echo "First Name: ".$_SESSION['pfname']."<br>";
      echo "Last Name: ".$_SESSION['plname']."<br>";
      echo "ID Number: ".$_SESSION['pid']."<br>";
      echo "Title: ".$_SESSION['ptitle']."<br>";
      echo "Date of Birth: ".$_SESSION['pdob']."<br>";
      echo "Password: ".$_SESSION['ppassword']."<br>"."<br>";
      echo "Email: ".$_SESSION['pemail']."<br>";
      echo "=============================="."<br>";
      echo "<p style='color:green;'>Parents has the same ID as their Child!</p>"."<br>";
    }
    unset($_SESSION['ptitle']);
      ?>
  	  <button type="submit" class="btn" name="cancelreport"><a href="adminpage.php" style='color:white;'>Click Here To Return Home</a></button>
  	</div>
  </form>
</body>
</html>
