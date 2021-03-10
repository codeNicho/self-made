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
<!--OUR NEW CODE HERE-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Innswood High School IMS</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


      <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background:#4169E1;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

/*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4169E1;
  color: black;
}
</style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <img src="images/crest.jpg" alt="crest" width="100" height="100">
                        <div class="logo"> <a href="index.html">Innswood High School IMS</a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li> <a href="teacherindex.php">Home</a> </li>
                              <li> <a href="login.php?logout='1'">logout</a> </li>
                              <li class="mean-last"> <a href="#"><img src="images/search_icon.png" alt="#" /></a> </li><br><br><br>
                              <li><a href="#"><?php  if (isset($_SESSION['id'])) :
                              	echo "Welcome ".$_SESSION['fname']." ".$_SESSION['lname'];
                                endif ?></a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <section class="slider_section">
         <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/bush.png" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                       <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                          <div class="menu-area">
                             <div class="limit-box">
                                <nav class="main-menu">
                                   <ul class="menu-area-main">
                                      <li></li>
                                   </ul>
                                </nav>
                             </div>
                          </div>
                       </div>
                        <table style="text-align:left;color:white;" id="customers">
                      	<thead>
                      	<tr>
                      		<th colspan="2"><h2 style="text-align:center;color:white;" >Student Report</h2><br></th>
                      	</tr>
                      	</thead>
                      	<tbody>
                          <tr>
                        		<td>Student ID<br></td>
                            <td><?php echo $_SESSION['idnum_111'];?></td>
                      	<tr>
                      		<td>Type of Report<br></td>
                          <td><?php echo $_SESSION['type_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td width="100px";>Name of Student</td>
                          <td width="100px";><?php echo $_SESSION['fname_111']." ".$_SESSION['lname_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td>Date of Report</td>
                      		<td><?php echo $_SESSION['repdate_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td>Status of Report</td>
                      		<td><?php echo $_SESSION['status_111'];?></td>
                      	</tr>
                      	</tbody>
                      </table><br>


                      <table id="customers">
                    	<thead>
                    	<tr>
                    		<th>Subject<br></th>
                    		<th>Attendance<br></th>
                    		<th>Period</th>
                    		<th>Score</th>
                        <th>Performance</th>
                    	</tr>
                    	</thead>
                    	<tbody>
                    	<tr>
                    		<td><?php echo $_SESSION['subject_111'];?><br></td>
                    		<td><?php echo $_SESSION['attendance_111'];?><br></td>
                    		<td><?php echo $_SESSION['period_111'];?></td>
                    		<td><?php echo $_SESSION['score_111'];?></td>
                        <td><?php echo $_SESSION['performance_111'];?></td>
                    	</tr>
                    	<tbody>
                    </table>
                    <div class="input-group">
                  	</div>
                     </div>
                  </div>
               </div>
         </div>
       </div>
     </section>

      <!--  footer -->
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Address</h3>
                        <i><img src="icon/3.png"><br>Innswood P.O., StCatherine Jamaica, W.I.</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Telephone</h3>
                        <i><img src="icon/1.png"><br>(876) 943-2685</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Social Media </h3>
                        <ul class="contant_icon">
                           <li><img src="icon/fb.png" alt="icon"/></li>
                           <li><img src="icon/tw.png" alt="icon"/></li>
                           <li><img src="icon/lin (2).png" alt="icon"/></li>
                           <li><img src="icon/instagram.png" alt="icon"/></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Innswood High School</a></p>
            </div>
         </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });

         $(".zoom").hover(function(){

         $(this).addClass('transition');
         }, function(){

         $(this).removeClass('transition');
         });
         });

      </script>
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
<!--OUR NEW CODE HERE-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Innswood High School IMS</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


      <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background:#4169E1;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

/*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4169E1;
  color: black;
}
</style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <img src="images/crest.jpg" alt="crest" width="100" height="100">
                        <div class="logo"> <a href="index.html">Innswood High School IMS</a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li> <a href="teacherindex.php">Home</a> </li>
                              <li> <a href="login.php?logout='1'">logout</a> </li>
                              <li class="mean-last"> <a href="#"><img src="images/search_icon.png" alt="#" /></a> </li><br><br><br>
                              <li><a href="#"><?php  if (isset($_SESSION['id'])) :
                              	echo "Welcome ".$_SESSION['fname']." ".$_SESSION['lname'];
                                endif ?></a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <section class="slider_section">
         <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/bush.png" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                       <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                          <div class="menu-area">
                             <div class="limit-box">
                                <nav class="main-menu">
                                   <ul class="menu-area-main">
                                      <li></li>
                                   </ul>
                                </nav>
                             </div>
                          </div>
                       </div>
                        <table style="text-align:left;color:white;" id="customers">
                      	<thead>
                      	<tr>
                      		<th colspan="2"><h2 style="text-align:center;color:white;" >Student Report</h2><br></th>
                      	</tr>
                      	</thead>
                      	<tbody>
                          <tr>
                        		<td>Student ID<br></td>
                            <td><?php echo $_SESSION['idnum_111'];?></td>
                      	<tr>
                      		<td>Type of Report<br></td>
                          <td><?php echo $_SESSION['type_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td width="100px";>Name of Student</td>
                          <td width="100px";><?php echo $_SESSION['fname_111']." ".$_SESSION['lname_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td>Date of Report</td>
                      		<td><?php echo $_SESSION['repdate_111'];?></td>
                      	</tr>
                      	<tr>
                      		<td>Status of Report</td>
                      		<td><?php echo $_SESSION['status_111'];?></td>
                      	</tr>
                      	</tbody>
                      </table><br>


                      <table id="customers">
                    	<thead>
                    	<tr>
                    		<th>Subject<br></th>
                    		<th>Attendance<br></th>
                    		<th>Period</th>
                    		<th>Score</th>
                        <th>Performance</th>
                    	</tr>
                    	</thead>
                    	<tbody>
                    	<tr>
                    		<td><?php echo $_SESSION['subject_111'];?><br></td>
                    		<td><?php echo $_SESSION['attendance_111'];?><br></td>
                    		<td><?php echo $_SESSION['period_111'];?></td>
                    		<td><?php echo $_SESSION['score_111'];?></td>
                        <td><?php echo $_SESSION['performance_111'];?></td>
                    	</tr>
                    	<tbody>
                    </table>
                    <div class="input-group">
                  	</div>
                     </div>
                  </div>
               </div>
         </div>
       </div>
     </section>

      <!--  footer -->
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Address</h3>
                        <i><img src="icon/3.png"><br>Innswood P.O., StCatherine Jamaica, W.I.</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Telephone</h3>
                        <i><img src="icon/1.png"><br>(876) 943-2685</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Social Media </h3>
                        <ul class="contant_icon">
                           <li><img src="icon/fb.png" alt="icon"/></li>
                           <li><img src="icon/tw.png" alt="icon"/></li>
                           <li><img src="icon/lin (2).png" alt="icon"/></li>
                           <li><img src="icon/instagram.png" alt="icon"/></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Innswood High School</a></p>
            </div>
         </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });

         $(".zoom").hover(function(){

         $(this).addClass('transition');
         }, function(){

         $(this).removeClass('transition');
         });
         });

      </script>
   </body>
</html>
>>>>>>> 60e79d9ef6cba61df659774da48cd6429452c559
