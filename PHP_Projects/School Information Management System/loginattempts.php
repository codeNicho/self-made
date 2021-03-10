<?php
$host = "";//Host name
$username = "";//MYSQL username
$password = "";//MYSQL password
$db_name = "";//Database name
$tbl_name = "";//Name of login table
$bl_name2 = "";//Name of table to store IP if attempt is incorrect

//connect to server and select database
try{
$conn = new PDO('mysql:host='.$host.';dbname='.$db_name.'',$username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();}

//get users ip next, as this is for a log in, this example will show for username and pass also
$userIP = $_SERVER['REMOTE_ADDR'];
$userPassword = $_POST['passwordfromform'];
$userUsername = $_POST['usernamefromform']

if(empty($userUsername) && empty($userPassword)){
die("You must enter a username and password");
}

//check for log in excess
$checkSql="
SELECT * FROM ".$tbl_name2."
WHERE PostersIP = '".$userIP."'
";
$stmt = $db->query($checkSql);
$row_count = $stmt->rowCount();
if($rowcount >= 7){//change this number to reflect the nuber of login chances
die("You have tried to log in too many times");
}

//check to log in
$insertSql = "
SELECT * FROM ".$tbl_name."
WHERE USERNAME = '".$userUsername."'
AND PASSWORD = '".$userPassword."'";

//execute check query
$result = $conn->query($insertSql);
if($result != false){
echo "Username and Password were correct!";//link to correct page
}
else{
$incorrectSql="
INSERT INTO ".$tbl_name2."
(PostersIP) VALUES
('".$userIP."')";
    $result2 = $conn->query($incorrectSql);
     if($result2 != false){
          die("You entered an invalid username or password, your attempt has been stored.");
        }
die("Error inserting data");
}
?>
