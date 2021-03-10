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
   <body class="main-layout" style="background-color:lightblue;">
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
                              <li> <a href="viceprincipalindex.php">Home</a> </li>
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
                      <!--TIME TABLE CODE HERE -->
                      <div class="wrapper">
                          <header class="header">
                              <section class="header-top">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                          </div>
                                      </div>
                                  </div>
                              </section>
                              <section class="header-bottom">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-md-5 col-sm-12 col-xs-12">
                                          </div>
                                          <div class="col-md-1 col-sm-12 col-xs-12">
                                          </div>
                                      </div>
                                  </div>
                              </section>
                          </header>
                  <H1><FONT COLOR="GREEN"><CENTER>TIME TABLE CREATED</FONT></H1>
                  <font size="4">
                  <table border="2" cellspacing="3" align="center">
                  <tr>
                   <td align="center">
                   <td>8:30-9:30
                   <td>9:30-10:30
                   <td>10:3-11:30
                   <td>11:30-12:30
                   <td>12:30-2:00
                   <td>2:00-3:00
                   <td>3:00-4:00
                   <td>4:00-5:00
                  </tr>
                  <tr>
                   <td align="center">MONDAY
                   <td align="center" style="color:green">Software Implementation<td align="center"><font color="blue">Programming 1 Tutorial<br>
                   <td align="center"><font color="brown">College Mathematics Lecture<br>
                   <td align="center"><font color="red">Artificial Intelligence Lecture<br>
                   <td rowspan="6"align="center">L<br>U<br>N<br>C<br>H
                   <td align="center"><font color="maroon">Major Project<br>
                   <td align="center"><font color="brown">Computer Networks Lecture<br>
                   <td align="center">counselling class
                  </tr>
                  <tr>
                   <td align="center">TUESDAY
                   <td align="center"><font color="blue">DataBase Design lecture<br>
                   <td align="center"><font color="red">Computer Security Lecture<br>
                   <td align="center"><font color="purple">Calculus I Lecture<br>
                   <td align="center">---
                   <td align="center"><font color="orange">Calculus I Tutorial<BR>
                   <td align="center"><font color="maroon">Major Project<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">WEDNESDAY
                   <td align="center"><font color="purple">Major Project<br>
                   <td align="center"><font color="orange">Seminar<BR>
                   <td align="center"><font color="brown">SWA<br>
                   <td align="center">---
                   <td colspan="3" align="center"><font color="green"> lab
                  </tr>
                  <tr>
                   <td align="center">THURSDAY
                   <td align="center">DataBase Design Lab<br>
                   <td align="center"><font color="brown">DataBase Design Tutorial<br>
                   <td align="center"><font color="orange">Computer Security Tutorial<BR>
                   <td align="center">---
                   <td align="center"><font color="blue">SUB4<br>
                   <td align="center"><font color="red">Computer Networks Tutorial<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">FRIDAY
                   <td align="center"><font color="orange">Major Project<BR>
                   <td align="center"><font color="maroon">Computer Security Lab<br>
                   <td align="center"><font color="blue">Artificial Intelligence Lab<br>
                   <td align="center">---
                   <td align="center"><font color="purple">Programming 1 Lab<br>
                   <td align="center"><font color="brown">Computer Networks Lab<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">SATURDAY
                   <td align="center"><font color="red">Artificial Intelligence Tutorial<br>
                   <td colspan="3" align="center"  style="color:green">seminar
                   <td align="center"><font color="green">College Mathematics Tutorial<br>
                   <td align="center"><font color="brown">Programming 1 Lecture<br>
                   <td align="center">library
                  </tr>
                  </table>
                  </font>
                  <br><br><br><br><br>
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
   <body class="main-layout" style="background-color:lightblue;">
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
                              <li> <a href="viceprincipalindex.php">Home</a> </li>
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
                      <!--TIME TABLE CODE HERE -->
                      <div class="wrapper">
                          <header class="header">
                              <section class="header-top">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                          </div>
                                      </div>
                                  </div>
                              </section>
                              <section class="header-bottom">
                                  <div class="container">
                                      <div class="row">
                                          <div class="col-md-5 col-sm-12 col-xs-12">
                                          </div>
                                          <div class="col-md-1 col-sm-12 col-xs-12">
                                          </div>
                                      </div>
                                  </div>
                              </section>
                          </header>
                  <H1><FONT COLOR="GREEN"><CENTER>TIME TABLE CREATED</FONT></H1>
                  <font size="4">
                  <table border="2" cellspacing="3" align="center">
                  <tr>
                   <td align="center">
                   <td>8:30-9:30
                   <td>9:30-10:30
                   <td>10:3-11:30
                   <td>11:30-12:30
                   <td>12:30-2:00
                   <td>2:00-3:00
                   <td>3:00-4:00
                   <td>4:00-5:00
                  </tr>
                  <tr>
                   <td align="center">MONDAY
                   <td align="center" style="color:green">Software Implementation<td align="center"><font color="blue">Programming 1 Tutorial<br>
                   <td align="center"><font color="brown">College Mathematics Lecture<br>
                   <td align="center"><font color="red">Artificial Intelligence Lecture<br>
                   <td rowspan="6"align="center">L<br>U<br>N<br>C<br>H
                   <td align="center"><font color="maroon">Major Project<br>
                   <td align="center"><font color="brown">Computer Networks Lecture<br>
                   <td align="center">counselling class
                  </tr>
                  <tr>
                   <td align="center">TUESDAY
                   <td align="center"><font color="blue">DataBase Design lecture<br>
                   <td align="center"><font color="red">Computer Security Lecture<br>
                   <td align="center"><font color="purple">Calculus I Lecture<br>
                   <td align="center">---
                   <td align="center"><font color="orange">Calculus I Tutorial<BR>
                   <td align="center"><font color="maroon">Major Project<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">WEDNESDAY
                   <td align="center"><font color="purple">Major Project<br>
                   <td align="center"><font color="orange">Seminar<BR>
                   <td align="center"><font color="brown">SWA<br>
                   <td align="center">---
                   <td colspan="3" align="center"><font color="green"> lab
                  </tr>
                  <tr>
                   <td align="center">THURSDAY
                   <td align="center">DataBase Design Lab<br>
                   <td align="center"><font color="brown">DataBase Design Tutorial<br>
                   <td align="center"><font color="orange">Computer Security Tutorial<BR>
                   <td align="center">---
                   <td align="center"><font color="blue">SUB4<br>
                   <td align="center"><font color="red">Computer Networks Tutorial<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">FRIDAY
                   <td align="center"><font color="orange">Major Project<BR>
                   <td align="center"><font color="maroon">Computer Security Lab<br>
                   <td align="center"><font color="blue">Artificial Intelligence Lab<br>
                   <td align="center">---
                   <td align="center"><font color="purple">Programming 1 Lab<br>
                   <td align="center"><font color="brown">Computer Networks Lab<br>
                   <td align="center">library
                  </tr>
                  <tr>
                   <td align="center">SATURDAY
                   <td align="center"><font color="red">Artificial Intelligence Tutorial<br>
                   <td colspan="3" align="center"  style="color:green">seminar
                   <td align="center"><font color="green">College Mathematics Tutorial<br>
                   <td align="center"><font color="brown">Programming 1 Lecture<br>
                   <td align="center">library
                  </tr>
                  </table>
                  </font>
                  <br><br><br><br><br>
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
