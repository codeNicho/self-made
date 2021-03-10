<?php
// initializing variables
$pfname = "";
//$id = "";
$plname = "";
$ptitle = "";
$pdob = "";
$pemail  = "";
$errors2 = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['preg_user'])) {
  // receive all input values from the form
  $pfname = mysqli_real_escape_string($db, $_POST['pfname']);
  $plname = mysqli_real_escape_string($db, $_POST['plname']);
  //$id = mysqli_real_escape_string($db, $_POST['id']);
  //$ptitle = mysqli_real_escape_string($db, $_POST['ptitle']);
  $pdob = mysqli_real_escape_string($db, $_POST['pdob']);
  //$username = mysqli_real_escape_string($db, $_POST['username']);
  $pemail = mysqli_real_escape_string($db, $_POST['pemail']);
  $ppassword_1 = mysqli_real_escape_string($db, $_POST['ppassword_1']);
  $ppassword_2 = mysqli_real_escape_string($db, $_POST['ppassword_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($username)) { array_push($errors, "Username is required"); }
  //PARENTS validation
  if (empty($pfname)) { array_push($errors2, "First Name is required"); }
  if (empty($plname)) { array_push($errors2, "Last Name is required"); }
  //if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($pdob)) { array_push($errors2, "Date of Birth is required"); }
  if (empty($pemail)) { array_push($errors2, "Email is required"); }
  if (empty($ppassword_1)) { array_push($errors2, "Password is required"); }
  if ($ppassword_1 != $ppassword_2) {
	array_push($errors2, "The two passwords do not match");
  }
$id = $_SESSION['id'];
  // Finally, register user if there are no errors in the form
  //PARENT code
  if (count($errors2) == 0) {
  	$ppassword = $ppassword_1;//encrypt the password before saving in the database
    $ptitle = "Parent";
  	$pquery = "INSERT INTO parents (pid, pfname, plname, ptitle, pdob, pemail, ppassword)
  			  VALUES('$id','$pfname', '$plname', '$ptitle', '$pdob', '$pemail', '$ppassword')";
  	mysqli_query($db, $pquery);
    $_SESSION['pid'] = $_SESSION['id'];
  	$_SESSION['pfname'] = $pfname;
    $_SESSION['plname'] = $plname;
    $_SESSION['ptitle'] = $ptitle;
    $_SESSION['pdob'] = $pdob;
    $_SESSION['pemail'] = $pemail;
    $_SESSION['ppassword'] = $ppassword;

  	$_SESSION['success'] = "You are now logged in";
    header('location: adminregsuccess.php');
    }
}

// ...

// LOGIN USER
if (isset($_POST['login_userd'])) {
  $id4 = mysqli_real_escape_string($db, $_POST['idd']);
  $password4 = mysqli_real_escape_string($db, $_POST['passwordd']);

  if (empty($id4)) {
  	array_push($errors2, "ID is required");
  }
  if (empty($password4)) {
  	array_push($errors2, "Password is required");
  }

  if (count($errors2) == 0) {
  	$password5 = $password4;
  	$query = "SELECT * FROM parents WHERE pid='$id4' AND ppassword='$password4'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
$user_check_query1 = "SELECT * FROM parents WHERE pid='$id4'";
$result1 = mysqli_query($db, $user_check_query1);
$user1 = mysqli_fetch_assoc($result1);
if ($user1) { // if user exists
    $_SESSION['id'] = $user1['pid'];
    $_SESSION['pfname'] = $user1['pfname'];
    $_SESSION['plname'] = $user1['plname'];
    $_SESSION['ptitle'] = $user1['ptitle'];
    $_SESSION['pdob'] = $user1['pdob'];
    $_SESSION['pemail'] = $user1['pemail'];
    $_SESSION['ppassword'] = $user1['ppassword'];

    //IF PARENT LOGS IN
    //SEARCH FOR STUDENT Report
    $_SESSION['idnum_11116'] = "";
    $_SESSION['type_11116'] = "";
    $_SESSION['fname_11116'] = "";
    $_SESSION['lname_11116'] = "";
    $_SESSION['repdate_11116'] = "";
    $_SESSION['status_11116'] = "";
    $_SESSION['subject_11116'] = "";
    $_SESSION['attendance_11116'] = "";
    $_SESSION['period_11116'] = "";
    $_SESSION['score_11116'] = "";
    $_SESSION['performance_11116'] = "";
    $idnumview56 = $_SESSION['id'];
      $query_11116 = "SELECT * FROM academic WHERE id='$idnumview56'";
      $results_11116 = mysqli_query($db, $query_11116);
      if (mysqli_num_rows($results_11116) == 1) {
    $user_check_query1_11116 = "SELECT * FROM academic WHERE id='$idnumview56'";
    $result_11116 = mysqli_query($db, $user_check_query1_11116);
    $user2_11116 = mysqli_fetch_assoc($result_11116);
    if ($user2_11116) { // if user exists
      $_SESSION['idnum_11116'] = $user2_11116['id'];
      $_SESSION['type_11116'] = $user2_11116['type'];
      $_SESSION['fname_11116'] = $user2_11116['fname'];
      $_SESSION['lname_11116'] = $user2_11116['lname'];
      $_SESSION['repdate_11116'] = $user2_11116['repdate'];
      $_SESSION['status_11116'] = $user2_11116['status'];
      $_SESSION['subject_11116'] = $user2_11116['subject'];
      $_SESSION['attendance_11116'] = $user2_11116['attendance'];
      $_SESSION['period_11116'] = $user2_11116['period'];
      $_SESSION['score_11116'] = $user2_11116['score'];
      $_SESSION['performance_11116'] = $user2_11116['performance'];
      //header('location: viewreport2.php');
    }
      }else {
        array_push($errors1, "This student has no report as yet");
      }//STUDENT VIEW REPORT ENDS HERE


    header('location: parentindex.php');
}
  	}else {
  		array_push($errors2, "Wrong username/password combination");
  	}
}
}
mysqli_close($db);

?>
