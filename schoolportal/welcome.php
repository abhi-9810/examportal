<?php
include('session.php');
$result1=mysqli_query($conn,"SELECT * FROM school_entries WHERE username='$login_session'");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

$result3=mysqli_query($conn,"SELECT * FROM school_notification ORDER BY date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>School Portal</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="School portal for the Schools registered under Intellify ISCO 2017.">
<meta name="author" content="">
<link rel="icon" href="../../img/favicon.ico">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link href="assets/css/form.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen">
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');</script>
<![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
<script>
    function Display(){
        if(document.getElementById("download").className=="inv")    
          document.getElementById("download").className="check";
        else
          document.getElementById("download").className="inv";   
    }
    function Display2(){
        if(document.getElementById("infos").className=="inv")    
          document.getElementById("infos").className="check";
        else
          document.getElementById("infos").className="inv";   
    }
    </script>
    <style>
        .inv{
            display: none;
        }
    </style>
</head>
<body id="page1">

<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
        <h1><a href="#"><?php echo $row1['name']; ?></a></h1>
        <nav>
        <ul>
          <li class="current"><a href="welcome.php" class="m1">Home Page</a></li>
            <li class="last"><a href="logout.php" class="m2">Sign Out</a></li>
         </ul>
         </nav>
    
    <!--<nav>
        <ul>
          <li class="current"><a href="index.html" class="m1">Home Page</a></li>
          <li><a href="about-us.html" class="m2">About Us</a></li>
          <li><a href="articles.html" class="m3">Our Articles</a></li>
          <li><a href="contact-us.html" class="m4">Contact Us</a></li>
          <li class="last"><a href="sitemap.html" class="m5">Sitemap</a></li>
        </ul>
        </nav>-->
        
     <!-- <form action="#" id="search-form">
        <fieldset>
          <div class="rowElem">
            <input type="text">
            <a href="#">Search</a></div>
        </fieldset>
      </form>-->
    </div>
  </header>
  <div class="container">
    <aside>
      <h3>Categories</h3>
      <ul class="categories">
        <!--<li><span><a href="#">Programs</a></span></li>-->
        <li><span><a onclick="Display2()">Info</a></span>
          <ul class="inv" id="infos">
                <li><span><a href="info.php">Basic School Info</a></span></li>
                <li><span><a href="details.php">Teacher's Details</a></span></li>
            </ul>
          </li>
        <li><span><a href="import.php">Add Students</a></span></li>
        <li><span><a onclick="Display()">Downloads</a></span>
            <ul class="inv" id="download">
                <li><span><a href="images/INTERNATIONAL_SCIENCE_AND_CREATIVITY_OLYMPIAD.pdf">Poster</a></span></li>
                <li><span><a href="images/document.pdf">Student Regisration Form</a></span></li>
                <li><span><a href="sampleques.pdf">Sample Paper</a></span></li>
            </ul>  
        </li>
        <li><span><a href="notifications.php">Notifications</a></span></li>
        <li><span><a href="studentsadded.php">Students added</a></span></li>
        <li><span><a href="article.php">Study Materials</a></span></li>
          <li><span><a href="queries.php">Your Queries</a></span></li>
        <li class="last"><span><a href="contact-us.php">Contact Us</a></span></li>
      </ul>
      <!--<form action="#" id="newsletter-form">
        <fieldset>
          <div class="rowElem">
            <h2>Newsletter</h2>
            <input type="email" value="Enter Your Email Here" onFocus="if(this.value=='Enter Your Email Here'){this.value=''}" onBlur="if(this.value==''){this.value='Enter Your Email Here'}" >
            <div class="clear"><a href="#" class="fleft">Unsubscribe</a><a href="#" class="fright">Submit</a></div>
          </div>
        </fieldset>
      </form>-->
      <h2>Fresh <span>News</span></h2>
      <ul class="news">
          <?php 
          $count1=0;
          while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
              $count1++;
              if($count1>3)
                  break;
          ?>
        <li><strong><?php echo $row3['date']; ?></strong>
          <h4><a href="#"><?php echo $row3['sub']; ?></a></h4>
          <?php echo $row3['description']; ?></li>
          <?php } ?>
      <!--  <li><strong>11th/26th, 2017</strong>
          <h4><a href="#">Round 1,exam </a></h4>
          Exam date of Round1 exam.</li>
        <li><strong>9th/15th September, 2017</strong>
          <h4><a href="#">Round 2,exam</a></h4>
          Exam date of Round2 exam. </li>-->
      </ul>
    </aside>
    <section id="content">
      <div id="banner">
      
        <h2><?php echo $row1['name']; ?><span><?php echo $row1['city']; ?><span><?php echo $row1['state']; ?></span></span></h2>
       
      </div>
      <div class="inside">
      <?php
        $pay=$row1['payment'];
        if($pay==1){
        ?> 
       <a href="Pdf/studentdetails.php">Click Here to Download the Username of Students and their Passwords.</a><br /><br /><br />
        <?php
        }
        ?>
        <h2>About <span>Us</span></h2>
        <ul class="list">
          <li><span><img src="images/icon1.png"></span>
            <h4>Sample Test Paper</h4>
            <p>Sample Test Paper has been uploded.</p>
          </li>
         
          <li class="last"><span><img src="images/icon3.png"></span>
            <h4>Student’s Time</h4>
            <p>Students are expected to read the study materials and give sample tests.</p>
          </li>
        </ul>
        <h2>Solve App: <span>Doubt Solving Plateform.</span></h2>
        <p><span class="txt1">Solve App : </span> A FREE doubt solving - cum - classroom discussion platform that will be made available for all the participating schools. </p>
        <div class="img-box"><img src="images/1page-img.jpg">In day-to-day academics, doubts form an integral part of the learning process and a large number of students are not able to get their doubts clarified instantly and that concepts just doesn't get clarified ever and thus hinders learning. Hence our platform ensures that each and every student from the school should be able to clarify their doubts at the tap of a button instantly! Also, the platform provides constant feedback about the student’s performance to the parents, teachers and the school! </div>
        <p class="p0">SOLVE IS A ONE-STOP PLATFORM FOR ALL THE STUDENTS AND SCHOOLS REQUIREMENTS!</p>
      </div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    <p class="lf">Copyright &copy; 2017 <a href="#">Intellify</a> - All Rights Reserved</p>
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>
