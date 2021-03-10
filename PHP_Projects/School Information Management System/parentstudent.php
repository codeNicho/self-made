<<<<<<< HEAD
<?php
  session_start();
  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['id']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['id'])) : ?>
    	<p style='color:purple;'>PARENTS AND STUDENTS PAGE YES! Welcome <strong><?php echo $_SESSION['fname'];
      echo "<br>";
      echo "Your Assigned ID number is: ".$_SESSION['id']."<br>";
      echo "ID numbers are required for Login.";
      ?></strong></p>
    <?php endif ?>

    <?php  if (isset($_SESSION['pid'])) : ?>
    	<p style='color:purple;'>Welcome <strong><?php echo $_SESSION['pfname'];
      echo "<br>";
      echo "You are Parent";
      echo "<br>";
      echo "Your Assigned ID number is: ".$_SESSION['pid']."<br>";
      echo "ID numbers are required for Login.";
      ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>
=======
<?php
  session_start();
  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['id']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['id'])) : ?>
    	<p style='color:purple;'>PARENTS AND STUDENTS PAGE YES! Welcome <strong><?php echo $_SESSION['fname'];
      echo "<br>";
      echo "Your Assigned ID number is: ".$_SESSION['id']."<br>";
      echo "ID numbers are required for Login.";
      ?></strong></p>
    <?php endif ?>

    <?php  if (isset($_SESSION['pid'])) : ?>
    	<p style='color:purple;'>Welcome <strong><?php echo $_SESSION['pfname'];
      echo "<br>";
      echo "You are Parent";
      echo "<br>";
      echo "Your Assigned ID number is: ".$_SESSION['pid']."<br>";
      echo "ID numbers are required for Login.";
      ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
