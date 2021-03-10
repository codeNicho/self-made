<<<<<<< HEAD
<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Inns Wood HS Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
    <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>

    <div class="input-group">
      <select id="title" name="title">
        <option value="" selected="selected">SELECT A TITLE</option>
        <option value="principal">Principal</option>
        <option value="viceprincipal">Vice-Principal</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
      </select>
  	</div>

    <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" name="dob" value="<?php echo $dob; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreg"><a style='color:white;' href="adminpage.php">Cancel</a></button>
  	</div>
  	<!--<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>-->
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
  <title>Inns Wood HS Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
    <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>

    <div class="input-group">
      <select id="title" name="title">
        <option value="" selected="selected">SELECT A TITLE</option>
        <option value="principal">Principal</option>
        <option value="viceprincipal">Vice-Principal</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
      </select>
  	</div>

    <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" name="dob" value="<?php echo $dob; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="cancelreg"><a style='color:white;' href="adminpage.php">Cancel</a></button>
  	</div>
  	<!--<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>-->
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
