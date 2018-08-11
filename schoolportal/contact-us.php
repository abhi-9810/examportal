<?php
include('session.php');
date_default_timezone_set('Asia/Kolkata');
$result1=mysqli_query($conn,"SELECT * FROM school_entries WHERE username='$login_session'");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$result3=mysqli_query($conn,"SELECT * FROM school_notification ORDER BY date DESC");

$error="";
$success="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
	$date=date('Y-m-d');
    $result2=mysqli_query($conn,"INSERT INTO school_query(sub,description,username,date) VALUES ('$subject','$description','$login_session','$date')");
    if($result2){
        $success="Query sent we will answer it soon..";
    }else
        $error="Error sending Query! please try again later.";
}
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
      <div class="inside">
        <h2>Our <span>Contacts</span></h2>
        <div class="address">
          <address>
          <strong>Phone:</strong>+91 8860287220<br>
          <strong>Email:</strong>info@intellify.in
          </address>
          <div class="extra-wrap">
            <h4><a href="queries.php">See your Queries here.</a></h4>
            <p>You can contact us when required.</p>
          </div>
        </div>
        <h2>Any <span>Queries</span></h2>
          <div class="alert alert-error"><?php echo $error; ?></div>
          <div class="alert alert-success"><?php echo $success; ?></div>
        <form id="contacts-form" action="" method="post">
          <fieldset>
            <div class="field">
              <label>Subject:</label>
              <input type="text" name="subject" value=""/>
            </div>
            <div class="field extra">
              <label>Your Message:</label>
              <textarea name="description" cols="1" rows="1"></textarea>
            </div>
            <div class="alignright"><input style="color:white;" type="submit" value="Send Message" class="btn btn-primary" name="submit">  </div>
          </fieldset>
        </form>
      </div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
    <p class="rf">Design by <a href="http://www.templatemonster.com/">TemplateMonster</a></p>
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>
