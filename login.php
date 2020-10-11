<?php
session_start();
if(isset($_SESSION['cid']))
{
	header("location:customer.php");
}
if(isset($_SESSION['mid']))
{
	header("location:merchent.php");
	header("refresh:1");
	echo '<script>alert("You already login as a merchent....")</script>';
}
include_once "connection.php";
if(isset($_POST['adminsubmit']))
{
	$user= $_POST['Aname'];
	$pass= $_POST['Apass'];
	
	if($user=="admin" && $pass="admin")
	{
		$_SESSION['adminid']=session_id();
		header("location:adminpage.php");
	}
	else
	{
		echo '<script>alert("You are not a admin")</script>';
		header("refresh:.1");	
	}
}
if(isset($_POST['customersubmit']))
{
	$num=mysqli_real_escape_string($conn, $_POST['number']);
	$pass=mysqli_real_escape_string($conn, $_POST['pass']);
	
	$q="select * from customerregister where phone_number='$num' and password='$pass'";
	$sq=mysqli_query($conn,$q);
	$count=mysqli_num_rows($sq);
	if($count==1)
	{
		$_SESSION['cid']=session_id();
		$_SESSION['phone']=$_POST['number'];
		header("location:customer.php");
	}
	else
	{
		echo '<script>alert("You are not register yet..please register first")</script>';
   		header("refresh:.1");
	}
}
if(isset($_POST['merchentsubmit']))
{
	$mnum=mysqli_real_escape_string($conn, $_POST['mnumber']);
	$mpass=mysqli_real_escape_string($conn, $_POST['mpass']);
	
	$q1="select * from merchentregister where number='$mnum' and password='$mpass'";
	$sq1=mysqli_query($conn,$q1);
	$count1=mysqli_num_rows($sq1);
	if($count1==1)
	{
		$_SESSION['mid']=session_id();
		$_SESSION['mphone']=$_POST['mnumber'];
		header("location:merchent.php");
	}
	else
	{
		echo '<script>alert("You are not register yet..please register first")</script>';
   		// header("refresh:.1");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap');
      	body
      	{
        	font-family: 'Merriweather', serif;
			background-image: url(".jpg");
			background-repeat: no-repeat;
		}
		#customerform
		{

			/*background-color: rgba(0,0,0,0.6);*/
			/*color: white;*/
			padding: 20px 40px;
			padding-top: 30px;
			border-radius: 20px;
			font-size: 20px;
		}
		form label
		{
			/*color: blue;*/
			font-size: 25px;
			letter-spacing: 1px;
		}
		/*form input[type="text"]
		{
			border: none;
			border-bottom: 1px solid black;
		}*/
		form input[type="submit"],span
		{
			letter-spacing: 1px;
		}
		#registrationdisplay
		{
			display: none;
			/*color: white;*/
			text-align: center;
		}
		#rform
		{

			/*background-color: rgba(0,0,0,0.6);*/
			/*color: white;*/
			padding: 20px 40px;
			padding-top: 30px;
			border-radius: 20px;
			/*box-shadow:black 30px 20px 40px 2px; */
			/*height: 400px;*/
			/*font-size: 20px;*/
		}
		#message
		{
			border-radius: 20px;
			background-color: #0099e6;
			padding: 20px;
			display: none;
			z-index: 1;

		}
	</style>
<body>
	<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
	  <a class="navbar-brand" style="color: black;" href="#">Shopping</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	    <ul class="navbar-nav ">
	      <li class="nav-item">
	        <a class="nav-link text-white active" href="index.php">Home</a>
	      </li>
	     <!--  <li class="nav-item">
	        <a class="nav-link text-white" href="#">Mobile</a>
	      </li> -->
	      <li class="nav-item">
	        <a class="nav-link text-white" href="login.php">Login</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white active" href="register.php" >Customer Register</a>
	      </li>
	      <li class="nav-item">
        <a class="nav-link text-white" href="merchentregister.php">Merchent Register</a>
      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#">Help</a>
	      </li>
	    </ul>
	  </div>	
	</nav><br><br><br>
<div class="container ">
		<div class="text-right">
		<button class="btn btn-primary btn-lg" id="messagedisplay"><i class="fas fa-bars"></i></button>
		</div>
		<div id="message" class="col-xl-7 col-lg-7 col-md-8 col-sm-10 col-xs-10 mx-auto">
			<div class="col-xl-7 col-lg-7 col-md-8 col-sm-10 col-xs-10 mx-auto">
				<h3 class="text-center ">Admin Login</h3>
			<form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
				<div class="form-group">
					<label>Login Id</label>
					<input type="password" class="form-control" name="Aname">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="Apass">
				</div>
				<div class="text-center">
				<input type="submit" class="btn btn-success btn-lg"  name="adminsubmit">
				</div>
			</form>
		</div>
		</div>
	</div>
<div class="container">
	<!-- <div class="row"> -->
		<div class="col-xl-6 col-lg-8 col-md-10 col-sm-10 col-xs-10 mx-auto mt-5 " id="logindisplay">
			<div class="form text-center shadow-lg" id="customerform">
				<h3 class="text-center">Login As Custumer</h3>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" class="form-control border-bottom" onblur="cnum()" id="num" name="number" maxlength="10">
						<span id="msg1" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="pass" onblur="cpass()" id="pass">
						<span id="msg2" class="text-danger"></span>
					</div><br>
					
							<input type="submit" name="customersubmit" class="btn btn-primary mx-auto" value="Login ">
						
					<span id="register" class="btn btn-danger">Login as Merchent</span>
						
					
				</form>
			</div>
		</div>
	</div>


	<div class="container mt-5">
		<div class="col-xl-6 col-lg-8 col-md-10 col-sm-10 col-xs-10 mx-auto mt-5" id="registrationdisplay">
			<div class="form shadow-lg" id="rform">
				<h3 class="text-center">Login As Merchent</h3>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
					<div class="form-group">
						<label>Login Id</label>
						<input type="text" class="form-control" name="mnumber" onblur="mernum()" id="mnum">
						<span class="text-danger" id="msg3"></span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="mpass" onblur="merpass()" id="mpass">
						<span class="text-danger" id="msg4"></span>	
					</div>
					<input type="submit" name="merchentsubmit" class="btn btn-success">

					<span class="btn btn-info" id="gologin">Login As Customer</span>
				</form>
			</div>
		</div>
		
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$("#gologin").click(function() {
			$("#registrationdisplay").hide('slow');
			$("#logindisplay").show('slow');
		});
		$("#register").click(function(){
			$("#logindisplay").hide('2000');
			$("#registrationdisplay").show('2000');
		});
		$("#messagedisplay").click(function(){
			$("#message").slideToggle("slow");
		});
	});


	function cnum()
	{
		var num=document.getElementById("num").value;
		var m1=/^[0-9]{10,10}$/;
		if(!num.match(m1))
		{
			document.getElementById("msg1").innerHTML="Please Enter Login Number";
		}
		else
		{
			document.getElementById("msg1").innerHTML="";
		}
	}
	function cpass()
	{
		var pass=document.getElementById("pass").value;
		var m2=/^[a-zA-Z0-9@$]{5,20}$/;
		if(!pass.match(m2))
		{
			document.getElementById("msg2").innerHTML="Please Enter Password";
		}
		else
		{
			document.getElementById("msg2").innerHTML="";
		}
	}
	function mernum()
	{
		var mnum=document.getElementById("mnum").value;
		var m3=/^[0-9]{10,10}$/;
		if(!mnum.match(m3))
		{
			document.getElementById("msg3").innerHTML="Please Enter Login Number";
		}
		else
		{
			document.getElementById("msg3").innerHTML="";
		}
	}
	function merpass()
	{
		var mpass=document.getElementById("mpass").value;
		var m4=/^[a-zA-Z0-9@$]{2,20}$/;
		if(!mpass.match(m4))
		{
			document.getElementById("msg4").innerHTML="Please Enter Password";
		}
		else
		{
			document.getElementById("msg4").innerHTML="";
		}
	}
	
</script>