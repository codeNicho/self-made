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
<a href="logout.php">Logout</a>