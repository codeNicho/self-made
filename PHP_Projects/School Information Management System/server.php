<?php
// initializing variables
//$username = "";
$fname = "";
$lname = "";
$id = "";
$title = "";
$dob = "";
$email  = "";
$errors = array();
$errors1 = array();
$errors2 = array();
$_SESSION['idnum_1111'] = "";
$_SESSION['type_1111'] = "";
$_SESSION['fname_1111'] = "";
$_SESSION['lname_1111'] = "";
$_SESSION['repdate_1111'] = "";
$_SESSION['status_1111'] = "";
$_SESSION['subject_1111'] = "";
$_SESSION['attendance_1111'] = "";
$_SESSION['period_1111'] = "";
$_SESSION['score_1111'] = "";
$_SESSION['performance_1111'] = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  //$id = mysqli_real_escape_string($db, $_POST['id']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  //$username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

$unique = uniqid('', true);
$file_name = substr($unique, strlen($unique) - 4, strlen($unique));
$id = $file_name;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  //if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  //$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $user_check_query = "SELECT * FROM users WHERE id='$id' LIMIT 1";

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['id'] == $id) {//changed from email to id
      array_push($errors, "id number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO users (id, fname, lname, title, dob, email, password)
  			  VALUES('$id','$fname', '$lname', '$title', '$dob', '$email', '$password')";
  	mysqli_query($db, $query);

  	$_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['id'] = $id;
    $_SESSION['title'] = $title;
    $_SESSION['dob'] = $dob;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
  	$_SESSION['success'] = "You are now logged in";
    if($title == "student"){
      header('location: parent_reg.php');
    }else{
      header('location: adminregsuccess.php');
    }
  }
}
// ...

// LOGIN USER

if (isset($_POST['login_user'])) {
  $id2 = mysqli_real_escape_string($db, $_POST['id']);
  $password2 = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($id2)) {
  	array_push($errors1, "ID is required");
  }
  if (empty($password2)) {
  	array_push($errors1, "Password is required");
  }

  if (count($errors1) == 0) {
  	$password3 = $password2;
  	$query = "SELECT * FROM users WHERE id='$id2' AND password='$password3'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
$user_check_query1 = "SELECT * FROM users WHERE id='$id2'";
$result1 = mysqli_query($db, $user_check_query1);
$user1 = mysqli_fetch_assoc($result1);
if ($user1) { // if user exists
    $_SESSION['id'] = $user1['id'];
    $_SESSION['fname'] = $user1['fname'];
    $_SESSION['lname'] = $user1['lname'];
    $_SESSION['title'] = $user1['title'];
    $_SESSION['dob'] = $user1['dob'];
    $_SESSION['email'] = $user1['email'];
    $_SESSION['password'] = $user1['password'];
}
  	  $_SESSION['success'] = "You are now logged in";
      if($user1['title']=="student"){
          $idnumview5 = $_SESSION['id'];
          	$query_1111 = "SELECT * FROM academic WHERE id='$idnumview5'";
          	$results_1111 = mysqli_query($db, $query_1111);
          	if (mysqli_num_rows($results_1111) == 1) {
        $user_check_query1_1111 = "SELECT * FROM academic WHERE id='$idnumview5'";
        $result_1111 = mysqli_query($db, $user_check_query1_1111);
        $user2_1111 = mysqli_fetch_assoc($result_1111);
        if ($user2_1111) { // if user exists
            $_SESSION['idnum_1111'] = $user2_1111['id'];
            $_SESSION['type_1111'] = $user2_1111['type'];
            $_SESSION['fname_1111'] = $user2_1111['fname'];
            $_SESSION['lname_1111'] = $user2_1111['lname'];
            $_SESSION['repdate_1111'] = $user2_1111['repdate'];
            $_SESSION['status_1111'] = $user2_1111['status'];
            $_SESSION['subject_1111'] = $user2_1111['subject'];
            $_SESSION['attendance_1111'] = $user2_1111['attendance'];
            $_SESSION['period_1111'] = $user2_1111['period'];
            $_SESSION['score_1111'] = $user2_1111['score'];
            $_SESSION['performance_1111'] = $user2_1111['performance'];

            header('location: viewreport2.php');
        }
          	}else {
          		array_push($errors1, "ID number does not exist");
          	}//STUDENT VIEW REPORT ENDS HERE
        header('location: studentindex.php');
      }
      if($user1['title']=="viceprincipal"){
        header('location: viceprincipalindex.php');
      }
      if($user1['title']=="teacher"){
        header('location: teacherindex.php');
      }
      if($user1['title']=="principal"){
        header('location: principalindex.php');
      }
  	}else {
  		array_push($errors1, "Wrong username/password combination");
  	}
}
if($id2=="admin" && $password2=="admin"){
  $_SESSION['id'] = "123";
  header("location: adminpage.php");
}
}

$count=0;
//SEARCH FOR STUDENT ID FOR UPLOAD REPORT
if (isset($_POST['searchreport'])) {
  //CHECK IF RECORD IS ALREADY UPLOADED FOR ID NUMBER
  $idnumview51 = $_POST['studid'];
    $query_11111 = "SELECT * FROM academic WHERE id='$idnumview51'";
    $results_11111 = mysqli_query($db, $query_11111);
    if (mysqli_num_rows($results_11111) == 1) {
  $user_check_query1_11111 = "SELECT * FROM academic WHERE id='$idnumview51'";
  $result_11111 = mysqli_query($db, $user_check_query1_11111);
  $user2_11111 = mysqli_fetch_assoc($result_11111);
  if ($user2_11111) { // if user exists
    array_push($errors1,"A report already exist for this ID.!");
    $count = 1;
  }
  }

if($count==0){
  $idnum = mysqli_real_escape_string($db, $_POST['studid']);
  if (empty($idnum)) {
  	array_push($errors1, "ID is required");
  }

  if (count($errors) == 0) {
  	$query_1 = "SELECT * FROM users WHERE id='$idnum'";
  	$results_1 = mysqli_query($db, $query_1);
  	if (mysqli_num_rows($results_1) == 1) {
$user_check_query1_1 = "SELECT * FROM users WHERE id='$idnum'";
$result_1 = mysqli_query($db, $user_check_query1_1);
$user2_1 = mysqli_fetch_assoc($result_1);
if ($user2_1) { // if user exists
    $_SESSION['idnum_1'] = $user2_1['id'];
    $_SESSION['fname_1'] = $user2_1['fname'];
    $_SESSION['lname_1'] = $user2_1['lname'];
    header('location: uploadreport2.php');
}
  	}else {
  		array_push($errors1, "ID number does not exist");
  	}
}
}

}

//UPLOAD STUDENT REPORT TO DATABASE
// initializing variables
$sid = "";
$type = "";
$sfname = "";
$slname = "";
$dateofrep = "";
$status = "";
$subject  = "";
$attendance ="";
$period ="";
$score ="";
$percentage ="";
$remarks ="";
$errors = array();

// REGISTER USER
if (isset($_POST['uploadreport'])) {
  // receive all input values from the form
  $sid = $_SESSION['idnum_1'];
  $type = "Academic";
  $sfname = $_SESSION['fname_1'];
  $slname = $_SESSION['lname_1'];

  $repdate = mysqli_real_escape_string($db, $_POST['repdate']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $attendance = mysqli_real_escape_string($db, $_POST['attendance']);
  $period = mysqli_real_escape_string($db, $_POST['period']);
  $score = mysqli_real_escape_string($db, $_POST['score']);
  $performance = mysqli_real_escape_string($db, $_POST['performance']);


  // Finally, register user if there are no errors in the form
  //PARENT code
  	$repquery = "INSERT INTO academic (id, type, fname, lname, repdate, status, subject, attendance, period, score, performance)
  			  VALUES('$sid','$type', '$sfname', '$slname', '$repdate', '$status', '$subject','$attendance','$period','$score','$performance')";
  	mysqli_query($db, $repquery);
    $_SESSION['pid'] = $_SESSION['id'];
  	$_SESSION['pfname'] = $pfname;
    $_SESSION['plname'] = $plname;
  	$_SESSION['success'] = "You are now logged in";
    header('location: uploadsuccess.php');
}

//SEARCH FOR STUDENT ID FOR UPDATE REPORT
if (isset($_POST['searchreport2'])) {
  $idnumupdate = mysqli_real_escape_string($db, $_POST['studid2']);
  if (empty($idnumupdate)) {
  	array_push($errors, "ID is required");
  }

  if (count($errors) == 0) {
  	$query_11 = "SELECT * FROM academic WHERE id='$idnumupdate'";
  	$results_11 = mysqli_query($db, $query_11);
  	if (mysqli_num_rows($results_11) == 1) {
$user_check_query1_11 = "SELECT * FROM academic WHERE id='$idnumupdate'";
$result_11 = mysqli_query($db, $user_check_query1_11);
$user2_11 = mysqli_fetch_assoc($result_11);
if ($user2_11) { // if user exists
    $_SESSION['idnum_11'] = $user2_11['id'];
    $_SESSION['type_11'] = $user2_11['type'];
    $_SESSION['fname_11'] = $user2_11['fname'];
    $_SESSION['lname_11'] = $user2_11['lname'];
    $_SESSION['repdate_11'] = $user2_11['repdate'];
    $_SESSION['status_11'] = $user2_11['status'];
    $_SESSION['subject_11'] = $user2_11['subject'];
    $_SESSION['attendance_11'] = $user2_11['attendance'];
    $_SESSION['period_11'] = $user2_11['period'];
    $_SESSION['score_11'] = $user2_11['score'];
    $_SESSION['performance_11'] = $user2_11['performance'];

    header('location: updatereport2.php');
}
  	}else {
  		array_push($errors, "ID number does not exist");
  	}
}
}

// UPDATE REPORT
if (isset($_POST['uploadreport2'])) {
  // receive all input values from the form
  $repdate2 = mysqli_real_escape_string($db, $_POST['repdate2']);
  $status2 = mysqli_real_escape_string($db, $_POST['status2']);
  $subject2 = mysqli_real_escape_string($db, $_POST['subject2']);
  $attendance2 = mysqli_real_escape_string($db, $_POST['attendance2']);
  $period2 = mysqli_real_escape_string($db, $_POST['period2']);
  $score2 = mysqli_real_escape_string($db, $_POST['score2']);
  $performance2 = mysqli_real_escape_string($db, $_POST['performance2']);

$idupdate = $_SESSION['idnum_11'];
if (isset($repdate2)) {
  $uprepdate2 = $repdate2;
  $sql1 = "UPDATE academic SET repdate='$uprepdate2' WHERE id='$idupdate'";
  mysqli_query($db, $sql1);
}

if (isset($status2)) {
  $upstatus2 = $status2;
  $sql2 = "UPDATE academic SET status='$upstatus2' WHERE id='$idupdate'";
  mysqli_query($db, $sql2);
}

if (isset($subject2)) {
  $upsubject2 = $subject2;
  $sql3 = "UPDATE academic SET subject='$upsubject2' WHERE id='$idupdate'";
  mysqli_query($db, $sql3);
}

if (isset($attendance2)) {
  $upattendance2 = $attendance2;
  $sql4 = "UPDATE academic SET attendance='$upattendance2' WHERE id='$idupdate'";
  mysqli_query($db, $sql4);
}

if (isset($period2)) {
  $upperiod2 = $period2;
  $sql5 = "UPDATE academic SET period='$upperiod2' WHERE id='$idupdate'";
  mysqli_query($db, $sql5);
}

if (isset($score2)) {
  $upscore2 = $score2;
  $sql6 = "UPDATE academic SET score='$upscore2' WHERE id='$idupdate'";
  mysqli_query($db, $sql6);
}

if (isset($performance2)) {
  $upperformance2 = $performance2;
  $sql7 = "UPDATE academic SET performance='$upperformance2' WHERE id='$idupdate'";
  mysqli_query($db, $sql7);
}
header('location: uploadsuccess.php');
}

//SEARCH FOR STUDENT ID FOR VIEW REPORT
if (isset($_POST['viewreport1'])) {
  $idnumview = mysqli_real_escape_string($db, $_POST['studid3']);
  if (empty($idnumview)) {
  	array_push($errors, "ID is required");
  }

  if (count($errors) == 0) {
  	$query_111 = "SELECT * FROM academic WHERE id='$idnumview'";
  	$results_111 = mysqli_query($db, $query_111);
  	if (mysqli_num_rows($results_111) == 1) {
$user_check_query1_111 = "SELECT * FROM academic WHERE id='$idnumview'";
$result_111 = mysqli_query($db, $user_check_query1_111);
$user2_111 = mysqli_fetch_assoc($result_111);
if ($user2_111) { // if user exists
    $_SESSION['idnum_111'] = $user2_111['id'];
    $_SESSION['type_111'] = $user2_111['type'];
    $_SESSION['fname_111'] = $user2_111['fname'];
    $_SESSION['lname_111'] = $user2_111['lname'];
    $_SESSION['repdate_111'] = $user2_111['repdate'];
    $_SESSION['status_111'] = $user2_111['status'];
    $_SESSION['subject_111'] = $user2_111['subject'];
    $_SESSION['attendance_111'] = $user2_111['attendance'];
    $_SESSION['period_111'] = $user2_111['period'];
    $_SESSION['score_111'] = $user2_111['score'];
    $_SESSION['performance_111'] = $user2_111['performance'];

    header('location: viewreport2.php');
}
  	}else {
  		array_push($errors, "ID number does not exist");
  	}
}
}

$count2=0;
//SEARCH FOR TEACHER ID FOR ACTIVITY REPORT
if (isset($_POST['searchteachactiv'])) {
  //CHECK IF ACTIVITY IS ALREADY UPLOADED FOR ID NUMBER
  $idnumview511 = $_POST['teachid2'];
    $query_111111 = "SELECT * FROM teachactivity WHERE id='$idnumview511'";
    $results_111111 = mysqli_query($db, $query_111111);
    if (mysqli_num_rows($results_111111) == 1) {
  $user_check_query1_111111 = "SELECT * FROM teachactivity WHERE id='$idnumview511'";
  $result_111111 = mysqli_query($db, $user_check_query1_111111);
  $user2_111111 = mysqli_fetch_assoc($result_111111);
  if ($user2_111111) { // if user exists
    array_push($errors1,"A report already exist for this ID.!");
    $count2 = 1;
  }
  }

if($count2==0){
  $qidnum1 = mysqli_real_escape_string($db, $_POST['teachid2']);
  if (empty($qidnum1)) {
  	array_push($errors1, "ID is required");
  }

  if (count($errors) == 0) {
  	$qquery_11 = "SELECT * FROM users WHERE id='$qidnum1'";
  	$qresults_1 = mysqli_query($db, $qquery_11);
  	if (mysqli_num_rows($qresults_1) == 1) {
$quser_check_query1_1 = "SELECT * FROM users WHERE id='$qidnum1'";
$qresult_1 = mysqli_query($db, $quser_check_query1_1);
$quser2_1 = mysqli_fetch_assoc($qresult_1);
if ($quser2_1) { // if user exists
    $_SESSION['qidnum_1'] = $quser2_1['id'];
    $_SESSION['qfname_1'] = $quser2_1['fname'];
    $_SESSION['qlname_1'] = $quser2_1['lname'];
    header('location: addteachactiv2.php');
}
  	}else {
  		array_push($errors1, "ID number does not exist");
  	}
}
}

}

//ADD TEACHER Activity
$ssid = "";
$ssfname = "";
$sslname = "";
$activdate = "";
$activtype = "";
$semester = "";
$duration = "";
$period3 = "";
$involved = "";
$performance3 = "";

if (isset($_POST['uploadteachactiv'])) {
  // receive all input values from the form
  $activdate = mysqli_real_escape_string($db, $_POST['activdate']);
  $activtype = mysqli_real_escape_string($db, $_POST['activtype']);
  $semester = mysqli_real_escape_string($db, $_POST['semester']);
  $duration = mysqli_real_escape_string($db, $_POST['duration']);
  $period3 = mysqli_real_escape_string($db, $_POST['period3']);
  $involved = mysqli_real_escape_string($db, $_POST['involved']);
  $performance3 = mysqli_real_escape_string($db, $_POST['performance3']);
  $ssid = $_SESSION['qidnum_1'];
  $ssfname = $_SESSION['qfname_1'];
  $sslname = $_SESSION['qlname_1'];

  $rrepquery = "INSERT INTO teachactivity (id, fname, lname, activdate, activtype, semester, duration, period3, involved, performance3)
        VALUES('$ssid','$ssfname', '$sslname', '$activdate', '$activtype', '$semester','$duration','$period3','$involved','$performance3')";

  mysqli_query($db, $rrepquery);
  header('location: uploadsuccessactiv.php');

}

//VIEW TEACHER Activity
if (isset($_POST['viewactiv'])) {
  $teachid = mysqli_real_escape_string($db, $_POST['teachid']);
  if (empty($teachid)) {
  	array_push($errors1, "ID is required");
  }

  if (count($errors1) == 0) {
  	$pquery_111 = "SELECT * FROM teachactivity WHERE id='$teachid'";
  	$presults_111 = mysqli_query($db, $pquery_111);
  	if (mysqli_num_rows($presults_111) == 1) {
$puser_check_query1_111 = "SELECT * FROM teachactivity WHERE id='$teachid'";
$presult_111 = mysqli_query($db, $puser_check_query1_111);
$puser2_111 = mysqli_fetch_assoc($presult_111);
if ($puser2_111) { // if user exists
    $_SESSION['tidnum_111'] = $puser2_111['id'];
    $_SESSION['tfname_111'] = $puser2_111['fname'];
    $_SESSION['tlname_111'] = $puser2_111['lname'];
    $_SESSION['trepdate_111'] = $puser2_111['activdate'];
    $_SESSION['ttype_111'] = $puser2_111['activtype'];
    $_SESSION['tsemester'] = $puser2_111['semester'];
    $_SESSION['tduration'] = $puser2_111['duration'];
    $_SESSION['tperiod'] = $puser2_111['period3'];
    $_SESSION['tinvolved'] = $puser2_111['involved'];
    $_SESSION['tperformance3'] = $puser2_111['performance3'];

    header('location: viewreport3.php');
}
  	}else {
  		array_push($errors1, "ID number does not exist");
  	}
}
}

//VIEW STUDENT REPORT AS Principal
if (isset($_POST['viewreport1t'])) {
  $tidnumview = mysqli_real_escape_string($db, $_POST['studid3t']);
  if (empty($tidnumview)) {
  	array_push($errors, "ID is required");
  }

  if (count($errors) == 0) {
  	$tquery_111 = "SELECT * FROM academic WHERE id='$tidnumview'";
  	$tresults_111 = mysqli_query($db, $tquery_111);
  	if (mysqli_num_rows($tresults_111) == 1) {
$tuser_check_query1_111 = "SELECT * FROM academic WHERE id='$tidnumview'";
$tresult_111 = mysqli_query($db, $tuser_check_query1_111);
$tuser2_111 = mysqli_fetch_assoc($tresult_111);
if ($tuser2_111) { // if user exists
    $_SESSION['tidnum_111t'] = $tuser2_111['id'];
    $_SESSION['ttype_111t'] = $tuser2_111['type'];
    $_SESSION['tfname_111t'] = $tuser2_111['fname'];
    $_SESSION['tlname_111t'] = $tuser2_111['lname'];
    $_SESSION['trepdate_111t'] = $tuser2_111['repdate'];
    $_SESSION['tstatus_111t'] = $tuser2_111['status'];
    $_SESSION['tsubject_111t'] = $tuser2_111['subject'];
    $_SESSION['tattendance_111t'] = $tuser2_111['attendance'];
    $_SESSION['tperiod_111t'] = $tuser2_111['period'];
    $_SESSION['tscore_111t'] = $tuser2_111['score'];
    $_SESSION['tperformance_111t'] = $tuser2_111['performance'];

    header('location: viewreportprincipal2.php');
}
  	}else {
  		array_push($errors, "ID number does not exist");
  	}
}
}


//SEARCH VP ID FOR SIGN OFF
if (isset($_POST['searchvpid'])) {
  $vpid = mysqli_real_escape_string($db, $_POST['vpid']);
  if (empty($vpid)) {
  	array_push($errors1, "ID is required");
  }

  if (count($errors1) == 0) {
  	$vtquery_111 = "SELECT * FROM users WHERE id='$vpid'";
  	$vtresults_111 = mysqli_query($db, $vtquery_111);
  	if (mysqli_num_rows($vtresults_111) == 1) {
$vtuser_check_query1_111 = "SELECT * FROM users WHERE id='$vpid'";
$vtresult_111 = mysqli_query($db, $vtuser_check_query1_111);
$vtuser2_111 = mysqli_fetch_assoc($vtresult_111);
if ($vtuser2_111) { // if user exists
    $_SESSION['vtidnum_111t'] = $vtuser2_111['id'];
    $_SESSION['vtfname_111t'] = $vtuser2_111['fname'];
    $_SESSION['vtlname_111t'] = $vtuser2_111['lname'];

    header('location: signoffvp2.php');
}
  	}else {
  		array_push($errors1, "ID number does not exist");
  	}
}
}

//SEARCH FOR TEACHER TO ASSIGN TO CLASS
$count2 = 0;
if (isset($_POST['assignteach'])) {
  $assignid = $_POST['teachid3'];
  if (empty($assignid)) {
  	array_push($errors1, "ID is required");
  }

//CHECK IF TEACHER ALREADY ASSIGNED TO A CLASS
  $query_111111 = "SELECT * FROM assignteach WHERE id='$assignid'";
  $results_111111 = mysqli_query($db, $query_111111);
  if (mysqli_num_rows($results_111111) == 1) {
$user_check_query1_111111 = "SELECT * FROM assignteach WHERE id='$assignid'";
$result_111111 = mysqli_query($db, $user_check_query1_111111);
$user2_111111 = mysqli_fetch_assoc($result_111111);
if ($user2_111111) { // if user exists
  array_push($errors1,"Teacher already assigned to a class!!");
  $count2 = 1;
}
}
//END ASSIGN TEACH SEARCH
$_SESSION['assignid']="";
$_SESSION['assignfname']="";
$_SESSION['assignlname'] ="";

  if($count2==0){
    $aquery_11111 = "SELECT * FROM users WHERE id='$assignid'";
    $aresults_11111 = mysqli_query($db, $aquery_11111);
    if (mysqli_num_rows($aresults_11111) == 1) {
  $auser_check_query1_11111 = "SELECT * FROM users WHERE id='$assignid'";
  $aresult_11111 = mysqli_query($db, $auser_check_query1_11111);
  $auser2_11111 = mysqli_fetch_assoc($aresult_11111);
  if ($auser2_11111) { // if user exists
    //array_push($errors1,"A report already exist for this ID.!");
    $_SESSION['assignid'] = $auser2_11111['id'];
    $_SESSION['assignfname'] = $auser2_11111['fname'];
    $_SESSION['assignlname'] = $auser2_11111['lname'];
    header("location: assignteacher2.php");
  }
}else{
  array_push($errors1, "ID number does not exist");
}
}
}


@$assignid2 = $_SESSION['assignid'];
@$assignfname2 = $_SESSION['assignfname'];
@$assignlname2 = $_SESSION['assignlname'];
//UPLOAD ASSIGNED TEACHER TO CLASS DATABASE
if (isset($_POST['assignteach3'])){
$class = mysqli_real_escape_string($db, $_POST['period1']);
$assignquery = "INSERT INTO assignteach (id, fname, lname, class )
        VALUES('$assignid2','$assignfname2', '$assignlname2', '$class')";
  mysqli_query($db, $assignquery);
    header('location: assignsuccess.php');
}



//SEARCH TEACHER TO ASSESS
$count2=0;
if (isset($_POST['assessteach'])) {
  //CHECK IF ACTIVITY IS ALREADY UPLOADED FOR ID NUMBER
  $assessid = $_POST['teachid5'];
    $assessquery_111111 = "SELECT * FROM assessteach WHERE id='$assessid'";
    $assessresults_111111 = mysqli_query($db, $assessquery_111111);
    if (mysqli_num_rows($assessresults_111111) == 1) {
  $assessuser_check_query1_111111 = "SELECT * FROM assessteach WHERE id='$assessid'";
  $assessresult_111111 = mysqli_query($db, $assessuser_check_query1_111111);
  $assessuser2_111111 = mysqli_fetch_assoc($assessresult_111111);
  if ($assessuser2_111111) { // if user exists
    array_push($errors1,"An Assessment report already exist for this ID.!");
    $count2 = 1;
  }
  }

if($count2==0){
  $assessid2 = mysqli_real_escape_string($db, $_POST['teachid5']);
  if (empty($assessid2)) {
  	array_push($errors1, "ID is required");
  }

  if (count($errors) == 0) {
  	$assessqquery_11 = "SELECT * FROM users WHERE id='$assessid2'";
  	$assessqresults_1 = mysqli_query($db, $assessqquery_11);
  	if (mysqli_num_rows($assessqresults_1) == 1) {
$assessquser_check_query1_1 = "SELECT * FROM users WHERE id='$assessid2'";
$assessqresult_1 = mysqli_query($db, $assessquser_check_query1_1);
$assessquser2_1 = mysqli_fetch_assoc($assessqresult_1);
if ($assessquser2_1) { // if user exists
    $_SESSION['assessqidnum_1'] = $assessquser2_1['id'];
    $_SESSION['assessqfname_1'] = $assessquser2_1['fname'];
    $_SESSION['assessqlname_1'] = $assessquser2_1['lname'];
    header('location: assessteacher2.php');
}
  	}else {
  		array_push($errors1, "ID number does not exist");
  	}
}
}

}


//UPLOAD ASSESSMENT TO database
@$assessid3 = $_SESSION['assessqidnum_1'];
@$assessfname2 = $_SESSION['assessqfname_1'];
@$assesslname2 = $_SESSION['assessqlname_1'];

//UPLOAD ASSIGNED TEACHER TO CLASS DATABASE
if (isset($_POST['assessteach2'])){
  $con=mysqli_connect("localhost","root","","registration");
  if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
     $query = "SELECT * FROM assignteach";
  $result = mysqli_query($con, $query);
$assessdate = mysqli_real_escape_string($con, $_POST['assessdate']);
$assesstype = mysqli_real_escape_string($con, $_POST['assesstype']);
$assesssemester = mysqli_real_escape_string($con, $_POST['assesssemester']);
$assessduration = mysqli_real_escape_string($con, $_POST['assessduration']);
$assessperiod3 = mysqli_real_escape_string($con, $_POST['assessperiod3']);
$assessperformance3 = mysqli_real_escape_string($con, $_POST['assessperformance3']);
$assessperiod1 = mysqli_real_escape_string($con, $_POST['assessperiod1']);
$finalassess = mysqli_real_escape_string($con, $_POST['finalassess']);


$assessa = "INSERT INTO assessteach (id, fname, lname, adate, type, semester, duration, period, performance, period1, final)
        VALUES('$assessid3','$assessfname2', '$assesslname2', '$assessdate', '$assesstype', '$assesssemester', '$assessduration', '$assessperiod3','$assessperformance3','$assessperiod1','$finalassess')";

  mysqli_query($con, $assessa);
  mysqli_close($con);
    header('location: assesssuccess.php');
}


//SEARCH TEACHER FOR VIEW ASSESSMENT
if (isset($_POST['viewassessment6'])) {
  $assessidview = mysqli_real_escape_string($db, $_POST['teachid6']);
  if (empty($assessidview)) {
  	array_push($errors, "ID is required");
  }

  if (count($errors) == 0) {
  	$assessquery_111 = "SELECT * FROM assessteach WHERE id='$assessidview'";
  	$assessresults_111 = mysqli_query($db, $assessquery_111);
  	if (mysqli_num_rows($assessresults_111) == 1) {
$assessuser_check_query1_111 = "SELECT * FROM assessteach WHERE id='$assessidview'";
$assessresult_111 = mysqli_query($db, $assessuser_check_query1_111);
$assessuser2_111 = mysqli_fetch_assoc($assessresult_111);
if ($assessuser2_111) { // if user exists
    $_SESSION['assessidnum_111'] = $assessuser2_111['id'];
    $_SESSION['assessfname_111'] = $assessuser2_111['fname'];
    $_SESSION['assesslname_111'] = $assessuser2_111['lname'];
    $_SESSION['assessrepdate_111'] = $assessuser2_111['adate'];
    $_SESSION['assesstype_111'] = $assessuser2_111['type'];
    $_SESSION['assesssemester_111'] = $assessuser2_111['semester'];
    $_SESSION['assessduration_111'] = $assessuser2_111['duration'];
    $_SESSION['assessperiod_111'] = $assessuser2_111['period'];
    $_SESSION['assessperformance_111'] = $assessuser2_111['performance'];
    $_SESSION['assesssperiod1_111'] = $assessuser2_111['period1'];
    $_SESSION['assessfinal_111'] = $assessuser2_111['final'];

    header('location: viewassessment2.php');
}
  	}else {
  		array_push($errors, "ID number does not exist");
  	}
}
}
mysqli_close($db);
?>
