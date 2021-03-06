<?php

include_once('medi_class.php');

$med = new medi_class();


if(isset($_GET['cms'])){

	//fetch login cred
	$uname=strtolower($_POST['uname']);
	$pword=md5($_POST['pword']);

	//validate login
	switch($med->_check_cred_exist($uname, $pword)){
		case 0: //valid cred
				//echo '<script>window.parent(location="u/");</script>';
				include_once('content.php');
				exit;
		break;
		case 1:
				echo '<script>alert("Invalid login credentials");</script>';
		break;
	}


}else if(isset($_GET['update'])){

	//check for content to update
	$content=$_GET['content'];
	switch($content){
		case 'about_us':
				 
			    if(!empty($_POST['about_us'])){
				$med->_update_content('about_us',$_POST['about_us']);
				}
				include_once('content.php');
				echo "<script>$('#error').show(); </script>";
				exit;
		break;
		case 'our_founder':
				if(!empty($_POST['our_founder'])){
				$med->_update_content('our_founder',$_POST['our_founder']);
				}
				include_once('content.php');
				echo "<script>$('#error').show(); </script>";
				exit;
		break;

		case 'our_services':
				if(!empty($_POST['our_services'])){
				$med->_update_content('our_services',$_POST['our_services']);
				}
				include_once('content.php');
				echo "<script>$('#error').show(); </script>";
				exit;
		break;

		case 'how_it_works_1':
			if(!empty($_POST['how_it_works_1'])){
			$med->_update_content('how_it_works_1',$_POST['how_it_works_1']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		case 'how_it_works_2':
			if(!empty($_POST['how_it_works_2'])){
			$med->_update_content('how_it_works_2',$_POST['how_it_works_2']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		case 'how_it_works_3':
			if(!empty($_POST['how_it_works_3'])){
			$med->_update_content('how_it_works_3',$_POST['how_it_works_3']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		case 'how_it_works_4':
			if(!empty($_POST['how_it_works_4'])){
			$med->_update_content('how_it_works_4',$_POST['how_it_works_4']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		case 'how_it_works_5':
			if(!empty($_POST['how_it_works_5'])){
			$med->_update_content('how_it_works_5',$_POST['how_it_works_5']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		case 'why_sa':
			if(!empty($_POST['why_sa'])){
			$med->_update_content('why_sa',$_POST['why_sa']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		
		case 'contact_us':
			if(!empty($_POST['contact_us'])){
			$med->_update_content('contact_us',$_POST['contact_us']);
			}
			include_once('content.php');
			echo "<script>$('#error').show(); </script>";
			exit;
		break;

		default:
			include_once('content.php');
			exit;
		break;


	}
	
	
	
}else{
	//do nothing
}

?>
<html>

	<head>

	<style>
		#wrapper {
			margin: 0px auto;
			width: 300px;
			height: auto;
			text-align: center;
			align: center;
		}

		#inner_wrapper {
			margin-top: 10px;
			padding-top: 10px;
			width: 300px;
			height: auto;
			border-radius: 5px;
			background-color: #f8f8f8;
			border-left: 1px solid #b9b9b9;
			border-right: 1px solid #b9b9b9;
			border-bottom: 1px solid #b9b9b9;
			padding-bottom: 20px;
		}
	</style>

	 <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,300' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">


    <!-- Pixeden Icon Font -->
    <link rel="stylesheet" href="../css/Pe-icon-7-stroke.css">

    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">


    <!-- PrettyPhoto -->
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Style -->
    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">


		 <link rel="stylesheet" href="../css/style.css" />
         <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script> 
         <script type="text/javascript" src="../js/index.js"></script> 

		<title>medi -- Sign in</title>
		
	</head>
	<body>
	<div id="wrapper">
	   <!-- <img src="img/logo.png" width="120px" height="100px" /> -->
	   <div style="float: center; margin-top:10px; font-family: Arial, sans-serif; font-size: 30px; color: #357ae8; " ><img width="150" height="150" src="../images/logo.png" alt=""></div>
		<div id="inner_wrapper">
		<p class="err_msg"></p>
		<p class="text"><h3>supply login credentials</h3></p>
		<form action="?cms" method="POST">
		<p><input type="text" class="_input" placeholder="Username" name="uname" id="uname" /></p>
		<p><input type="password" class="_input" placeholder="Password" name="pword" id="pword"/></p>
		<p style="font-weight: bold;"><input type="submit" class="btn btn-primary btn-action" value="Sign in" id="sign_in"></p>
		</form>
		
		</div>
	</div>
	</body>
</html>