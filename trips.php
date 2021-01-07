<?php

include_once('cms/medi_class.php');

$med = new medi_class();

?>
<!DOCTYPE html>
<html lang="en">
<!--
	Bent - Bootstrap Landing Page Template by Dcrazed
	Site: https://dcrazed.com/bent-app-landing-page-template/
	Free for personal and commercial use under GNU GPL 3.0 license.
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDI & TOURS | Best medical tourism in south africa</title>
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,300' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">


    <!-- Pixeden Icon Font -->
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">


    <!-- PrettyPhoto -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	a {
     text-decoration: none ;
	 color:white;
	  }
	a:hover
	  {
		color:#6CC417;
		text-decoration:none;
		cursor:pointer;
	   }
	 a:active
	  {
		color:#6CC417;
		text-decoration:none;
		cursor:pointer;
	   }
	</style>

    
         <!--<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script> -->
         <script src="js/jquery.min.js"></script>

         <script>
         $(document).ready(function() {
            $("#send_btn").click(function(){ 
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var passenger = $('#passenger').val();
                var contact = $('#contact').val();
                var trip = $('#trip').val();
                var service = $('#service').val();
                var days = $('#days').val(); 
                var message = $('#message').val(); 
                var error="";
                var resp_="";

                if( name == '' || email == '' || phone == '' || passenger == '0' || contact == '0' || trip == '0' || service == '0' || days == '0' || message == '' ){
                    error += 'Please fill out all fields';
                }
                if(error != ""){
                    document.all.error.innerHTML=error;
                    $('#error').css("color","red");
                    $('#error').css("font-weight","bold");
                }else if(error == "") {
                    document.all.error.innerHTML="sending quote...";
                    $('#error').css("color","green");
                    $('#error').css("font-weight","bold");
                   
                    var datastring="name="+name+"&email="+email+"&phone="+phone+"&passenger="+passenger+"&contact="+contact+"&trip="+trip+"&service="+service+"&days="+days+"&message="+message;

                    $.ajax({
                        type: 'POST',
                        url: 'send_quote.php',
                        data:datastring,
                        dataType:"json",
                        success:function(xml){
                        resp_ = xml.response;
                            if(resp_== 1){
                                document.all.error.innerHTML="Thank you, Request Received";
                                //alert(xml.message);
                            }
                        }
                    }); 

                }


                
            })
        })
         </script>



</head>

<body>
    <!-- PRELOADER -->
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

 <!-- END PRELOADER -->

 <!-- =========================
     START ABOUT US SECTION
============================== -->
    <section class="header parallax home-parallax page" id="HOME">
        <h2></h2>
        <div class="section_overlay">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <!--<img src="images/logo.png" alt="Logo"> -->
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- NAV -->
                            <li><a href="index.php"><b>HOME</b></a> </li>
                            <li><a href="index.php#ABOUT"><b>ABOUT US</b></a> </li>
							<li><a href="index.php#ABOUT"><b>VISION AND MISSION</b></a></li>
                            <li><a href="index.php#SERVICE"><b>OUR SERVICES</b></a></li>
                            <li><a href="index.php#HOW"><b>HOW IT WORKS</b></a> </li>
                            <li><a href="#WHY"><b>TRIPS & TOURS </b></a> </li>
                            <li><a href="index.php#CONTACT"><b>CONTACT </b></a> </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>

            <div class="container home-container">
                <div class="row"> <!-- style="background: url(images/t-section-shadow.png) no-repeat center bottom;"  -->
                    <div class="col-md-12">
					    
                        <div class="logo text-center"> <!-- text-center  -->
                                <!-- LOGO -->
                            <img width="191" height="191" src="images/logo.png" alt="">
						<!--	<div style="float:right; padding:15px; color: #fff; font-size:13px;"><b><a href="#HOW">HOW IT WORKS&nbsp;&nbsp;<i class="fa fa-angle-down"></i>&nbsp;&nbsp;</a>&nbsp;&nbsp;<a href="signup.html">TRIPS & TOURS</a>&nbsp;&nbsp;</b></div>-->
                        </div>
						
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="home_text">
                            <!-- TITLE AND DESC -->
							<h1>Medi & Tour <br/>Best medical tourism provider in South Africa.</h1>
                            <p style="color:#6CC417;">...wellness meet tourism!</p>
							<p style="font-family: FontPPH,sans-serif; transform: translateY(40%);"><i>we bridges the gap between your medical and travel needs</i></p>

                            <div class="download-btn">
                            <!-- BUTTON -->
                                <a class="btn home-btn wow fadeInLeft" href="#QUOTE">Request for Quote</a>
                                <a class="tuor btn wow fadeInRight" href="index.php#ABOUT">Learn About Us <i class="fa fa-angle-down"></i></a>
								<a class="tuor btn wow fadeInRight" href="index.php#SERVICE">Our services <i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-4">
                        
                          <!--  <img src="images/iPhone_Home_.png" alt="" > -->
						<div style="width: 100%; height: 454px; background-size: 213px 434px; background-repeat: no-repeat; background-position: center; text-align:center; padding-top:162px; position:relative;"> 
                            <a class="btn btn-primary btn-action" href="index.php#ABOUT" role="button"><b>ABOUT MEDI?</b></a>
                            <!--<div style="width: 200px; height:331px; background-color: #f3f3f3;  margin: auto; position:relative; padding-top: 15px;">
								
									<p style="font-size: 15px; font-weight: bold;">supply your login credentials</p>
									<span id="error" class="error" style="display: none;"></span>
									<p><input type="text" class="_input" placeholder="email address" id="email" /></p>
									<p><input type="password" class="_input" placeholder="Password"  id="pword"/></p>
									<div class="download-btn" style="margin-top:15px;"><a class="btn home-btn wow fadeInLeft" onclick="Auth_();">LOGIN</a>
									<br/><i style="font-size: 11px;"><a href="retrieve.html" style="color: #666;"><u> forgot your login credentials?</u></a></i></div>
									
								
							</div> -->
                        </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END HEADER SECTION -->




 <!-- =========================
     START ABOUT US SECTION
============================== -->


    <section class="about page" id="WHY">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- ABOUT US SECTION TITLE-->
                    <div class="section_title">
                        <?php echo $med->_fetch_content('why_sa'); ?>
                        <!--
                        <h2>Why South Africa?</h2>
                        <p>"South Africa’s medical treatments are highly affordable, boasting some of the best doctors and facilities in the world as well as many tourist attractions.
                            <br/>South Africa offers well-priced healthcare sector compared to the USA, Europe and India. There’s more on offer than just medical services.
                            <br/>We offer "wellness and tours" packages at the affordable price.South Africa prides itself on its amazing natural beauty, adventurous activities, luxury dining and great shopping experience.
                       </p> -->
                    </div>
                </div>

            </div>
        </div>
		
        
<!-- =========================
     HOW IT WORKS
============================== -->
            <div class="container">
                <div class="row">
                    <div class="col-md-15 col-md-offset-1 wow bounceIn"> <!--  class="col-md-15 col-md-offset-1 wow bounceIn" -->
                    <!-- VIDEO LEFT TITLE -->
                        

                    <div class="skitter-normal-box">
                        <div class="skitter skitter-normal with-dots">
                          <ul>
                            <li><a href="#"><img src="images/001.jpg" width="800px" height="200px" class="directionTop" /></a><div class="label_text"><p>Hector Pieterson Museum and Memorial</p></div></li>
                            <li><a href="#"><img src="images/002.jpg" width="800px" height="200px" class="directionBottom" /></a><div class="label_text"><p>Cape Town</p></div></li>
                            <li><a href="#"><img src="images/003.jpg" width="800px" height="200px" class="directionRight" /></a><div class="label_text"><p>Wander down Vilakazi Street</p></div></li>>
                            <li><a href="#"><img src="images/004.jpg" width="800px" height="200px" class="directionRight" /></a><div class="label_text"><p>Sandton City</p></div></li>>
                        
                         </ul>
                        </div>
                      </div>
                    <div style="clear:both;"></div>
                    <br />
  <!-- END HOW IT WORKS -->
                </div>
            </div>        
    </section> 
    <!-- End About Us -->



<!-- =========================
     START QUOTE FORM AREA
============================== -->
<section class="video_area" id="QUOTE" style="padding-bottom: 15px;">
        <div class="section_overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 wow bounceIn">
                    <!-- Start Contact Section Title-->
                    <div class="section_title">
                        <h2>Request for Quote</h2>
                        <p><i>Please take a moment to fill the form</i></p>
                    </div>
                </div>
            </div>

            <div class="contact_form wow bounceIn">
                <div class="container">

                <!-- START ERROR AND SUCCESS MESSAGE -->
                    <div class="form_error text-center">
                        <div id="error"></div>
                    </div>
                    <div class="Sucess"></div>
                <!-- END ERROR AND SUCCESS MESSAGE -->

                <!-- CONTACT FORM starts here, Go to contact.php and add your email ID, thats it.-->    
                   <!-- <form role="form" action="contact.php"> -->
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                               <!-- <input type="text" class="form-control" id="subject" placeholder="Subject"> -->
                                <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                                
                                <input type="text" class="form-control" id="trip" placeholder="Country of Residence">
                                <select class="form-control" id="passenger">
                                    <option value='0'>Number of Patients/Travelers</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                </select>
                                <select class="form-control" id="contact">
                                    <option value='0'>Preferred Method of Contact</option>
                                    <option value='Phone'>Phone</option>
                                    <option value='Email'>Email</option>
                                    <option value='Either'>Either</option>
                                </select>

                               
                            </div>


                            <div class="col-md-8">
                                
                                <!--<select class="form-control" id="trip">
                                    <option value='0'>Preferred Type of Trip</option>
                                    <option value='One Way'>One Way</option>
                                    <option value='Round Trip'>Round Trip</option>
                                    <option value='Hourly'>Hourly</option>
                                </select> -->
                                
                                <select class="form-control" id="service">
                                    <option value='0'>Desired Service</option>
                                    <option value='Medical Treatment'>Medical Treatment</option>
                                    <option value='Safari & SA Tours'>Safari & SA Tours</option>
                                    <option value='Accomodation'>Accomodation</option>
                                </select>
                                <select class="form-control" id="days">
                                    <option value='0'>Estimated No of Days</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                </select>

                                <textarea class="form-control" id="message" rows="25" cols="10" placeholder="  Comments / Special Requests..."></textarea>
                                <button type="button" class="btn btn-default submit-btn form_submit" id="send_btn">SEND MESSAGE</button>
                            </div>
                        </div>
                  <!--  </form> -->
                    <!-- END FORM --> 
                </div>
            </div>

        </div>
    </section>
    <!-- END QUOTE -->



<!-- =========================
     FOOTER 
============================== -->

    <section class="copyright">
        <h2></h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy_right_text">
                    <!-- COPYRIGHT TEXT -->
                        <p>Copyright &copy; 2020. All Rights Reserved.</p>        
                        <p>crafted by <a href="#">Tecnoverse</a></p>
                    </div>
                     
                </div>

                <div class="col-md-6">
                    <div class="scroll_top">
                        <a href="#HOME"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOTER -->


<!-- =========================
     SCRIPTS 
============================== -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.ajaxchimp.langs.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/script.js"></script> 
    <script src="js/delock.js"></script>
    
    
  <!-- Skitter Styles -->
  <link href="css/skitter.css" type="text/css" media="all" rel="stylesheet" />
  
  <!-- Skitter JS -->
  <script type="text/javascript" language="javascript" src="js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>

  <script type="text/javascript" language="javascript">
    $(document).ready(function(){

      $('.skitter-normal').skitter({
        animation: 'blind',
        interval: 2000,
        hideTools: true,
        theme: 'minimalist'
      });

    });
    </script>

</body>
</html>