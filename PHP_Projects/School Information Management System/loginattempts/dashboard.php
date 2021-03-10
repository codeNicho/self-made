<<<<<<< HEAD
<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}else{
	echo "Welcome";
}
?> || 
=======
<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}else{
	echo "Welcome";
}
?> || 
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
<a href="logout.php">Logout</a>