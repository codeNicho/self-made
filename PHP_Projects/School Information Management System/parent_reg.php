<<<<<<< HEAD
<?php
session_start();
include('server2.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parent Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Parents/Guardians Register Here</h2>
  </div>

  <form method="post" action="parent_reg.php">
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="pfname" value="<?php echo $pfname; ?>">
  	</div>
    <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="plname" value="<?php echo $plname; ?>">
  	</div>

    <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" name="pdob" value="<?php echo $pdob; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="pemail" value="<?php echo $pemail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="ppassword_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="ppassword_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="preg_user">Register</button>
  	</div>
  </form>
</body>
</html>
=======
<?php
session_start();
include('server2.php')
?>
<!DOCTYPE html>
<html>
<head>
  <title>Parent Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Parents/Guardians Register Here</h2>
  </div>

  <form method="post" action="parent_reg.php">
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="pfname" value="<?php echo $pfname; ?>">
  	</div>
    <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="plname" value="<?php echo $plname; ?>">
  	</div>

    <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" name="pdob" value="<?php echo $pdob; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="pemail" value="<?php echo $pemail; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="ppassword_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="ppassword_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="preg_user">Register</button>
  	</div>
  </form>
</body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
