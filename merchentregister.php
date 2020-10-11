<?php
$name=$email=$number=$pincode=$address="";
$nameerr=$emailerr=$numbererr=$passerr=$addresserr=$pincodeerr=$repasserr=$stateerr="";
include_once "connection.php";
include_once "testcharacter.php";
	function name()
	{
	if(empty($_POST['name']))
	{
		$nameerr="Name Can't be empty";
		return 'n';
	}
	else
	{
		$fname=test_input($_POST['name']);
		if(!preg_match("/^[a-zA-Z ]*$/",$fname))
		{
			$nameerr="only latters are allowed";
			return 'n';
		}
		else
		{
			return 'y';
			// $fname=$_POST['firstname'];
		}
	}
	}
	function email()
	{
		if(empty($_POST['email']))
		{
			return 'n';
		}
		else
		{
			if(!preg_match("/^[a-zA-Z0-9.]*@[a-zA-Z0-9]*.[a-zA-Z.]{2,6}$/",$_POST['email']))
			{
				return 'n';
			}
			else
			{
				return 'y';
			}
		}
	}
	function number()
	{
		if(empty($_POST['number']))
		{
			return 'n';
		}
		else
		{
			if(!preg_match("/^[0-9]{10,10}$/",$_POST['number']))
			{
				return 'n';
			}
			else
			{
				return 'y';
			}
		}
	}
	function state()
	{
		if(empty($_POST['state']))
		{
			return 'n';
		}
		else
		{
			return 'y';
		}
	}
	function pincode()
	{
		if(empty($_POST['pincode']))
		{
			return 'n';
		}
		else
		{
			if(!preg_match("/^[0-9]{6,6}$/",$_POST['pincode']))
			{
				return 'n';
			}
			else
			{
				return 'y';
			}
		}
	}
	function address()
	{
		if(empty($_POST['address']))
		{
			return 'n';
		}
		else
		{
			// if(!preg_match("/^[a-zA-Z0-9,. ]{5,200}$/",$_POST['address']))
			// {
			// 	return 'n';
			// }
			// else
			// {
				return 'y';
			// }
		}
	}
	function password()
	{
		if(empty($_POST['pass']))
		{
			return 'n';
		}
		else
		{
			return 'y';
		}
	}
	function repass()
	{
		if($_POST['pass']==$_POST['repass'])
		{
			return 'y';
		}
		else
		{
			return 'n';
		}
	}
if(isset($_POST['submit']))
{
	if(name()=='y')
	{
		$name=test_input($_POST['name']);
	}
	else
	{
		$nameerr="White space and letter not allowed";
	}
	if(email()=='y')
	{
		$email=test_input($_POST['email']);
	}
	else
	{
		$emailerr="Email is not valid";
	}
	if(number()=='y')
	{
		$number=test_input($_POST['number']);
	}
	else
	{
		$numbererr="Number is not valid";
	}
	if(state()=='y')
	{
		$state=$_POST['state'];
	}
	else
	{
		$stateerr="Please Select State";
	}
	if(pincode()=='y')
	{
		$pincode=test_input($_POST['pincode']);
	}
	else
	{
		$pincodeerr="Pin Code not valid";
	}
	if(address()=='y')
	{
		$address=$_POST['address'];
	}
	else
	{
		$addresserr="Address can't be empty";
	}
	if(password()=='y')
	{
		$pass=$_POST['pass'];
	}
	else
	{
		$passerr="Password Can't be empty";
	}
	if(repass()=='y')
	{
		$repass=$_POST['repass'];
	}
	else
	{
		$repasserr="Password not matched";
	}
	if(name()=='y'&&email()=='y'&&number()=='y'&&state()=='y'&&pincode()=="y"&&address()=='y'&&password()=='y'&&repass()=='y')
	{
	$q="insert into merchentregister (name,email,number,state,pincode,address,password) values('$name','$email','$number','$state','$pincode','$address','$pass')";
	$sq=mysqli_query($conn,$q);
	if($sq)
	{	
		echo '<script>alert("Register Successfully...")</script>';
		header("refresh:.3;login.php");
	}
	else
	{
		// echo mysqli_error($conn);
		echo '<script>alert("Data Already Exists")</script>';
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Merchent Register</title>
	 <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <style type="text/css">
	  	@import url('https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap');
	  	body
	  	{
	  		font-family: 'Merriweather', serif;

	  	}
	  	.form label
	  	{
	  		font-size: 20px;
	  		text-transform: capitalize;
	  		/*color: blue;*/
	  	}
	  </style>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top" >
  <a class="navbar-brand" style="color: black;" href="#">Shopping</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-white active" href="index.php">Home</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-white" href="#">Mobile</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white active" href="register.php" >Customer Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white active" href="merchentregister.php">Merchent Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Help</a>
      </li>
    </ul>
  </div>	
</nav><br><br><br>
<div class="container-fluid">
	<div class="col-xl-8 col-lg-9 col-md-10 col-sm-11 col-xs-12 mx-auto shadow-lg">
		<h3 class="text-center text-success">Merchent Register</h3>
		<form class="form p-2" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
			<div class="form-group">
				<label for="name">Merchent Name</label>
				<input type="text" name="name" class="form-control" id="name"  value="<?php echo $name;?>" onblur="cname1()">
				<span class="text-danger" id="nameerr"><?php echo $nameerr; ?></span>
				<!-- <span class=""></span> -->
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" id="number" onblur="number1()" class="form-control" name="number" maxlength="10" value="<?php echo $number;?>">
				<span class="text-danger" id="numbererr"><?php echo $numbererr; ?></span>

			</div>
			<div class="form-group">
				<label>Email Id</label>
				<input id="email" onblur="email1()" type="text" class="form-control" name="email" value="<?php echo $email;?>">
				<span class="text-danger" id="emailerr"><?php echo $emailerr ?></span>

			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>State</label>
						<select class="form-control" name="state" id="state" onblur="state1()">
							<option value="0" selected>Select State</option>
							<option value="Andhar Pardesh">Andhar Pardesh</option>
							<option value="Arunachal Pradesh">Arunachal Pradesh </option>
							<option value="Assam">Assam</option>
							<option value="Bihar">Bihar</option>
							<option value="Chhattisgarh">Chhattisgarh</option>
							<option value="Goa">Goa</option>
							<option value="Gujarat">Gujarat</option>
							<option value="Haryana">Haryana</option>
							<option value="Himachal Pradesh">Himachal Pradesh</option>
							<option value="Jharkhand">Jharkhand</option>
							<option value="Karnataka">Karnataka</option>
							<option value="Kerala">Kerala</option>
							<option value="Madhya Pradesh">Madhya Pradesh</option>
							<option value="Maharashtra">Maharashtra</option>
							<option value="Manipur">Manipur</option>
							<option value="Meghalaya">Meghalaya</option>
							<option value="Mizoram">Mizoram</option>
							<option value="Nagaland">Nagaland</option>
							<option value="Odisha">Odisha</option>
							<option value="Punja">Punjab</option>
							<option value="Rajasthan">Rajasthan</option>
							<option value="Sikkim">Sikkim</option>
							<option value="Tamil Nadu">Tamil Nadu</option>
							<option value="Telangana">Telangana</option>
							<option value="Tripura">Tripura</option>
							<option value="Uttar Pradesh">Uttar Pradesh</option>
							<option value="Uttarakhand">Uttarakhand</option>
							<option value="West Bengal">West Bengal</option>
						</select>
				<span class="text-danger" id="stateerr"><?php echo $stateerr; ?></span>

					</div>
					<div class="col-md-6">
						<label>Pin Code</label>
						<input type="text" id="pincode" onblur="pincode1()" class="form-control" name="pincode" maxlength="6" value="<?php echo $pincode;?>">
				<span id="pincodeerr" class="text-danger"><?php echo $pincodeerr; ?></span>

					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea rows="5" id="address" onblur="address1()" class="form-control" name="address"><?php echo $address;?></textarea>
				<span class="text-danger" id="addresserr"><?php echo $addresserr; ?></span>

			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Password</label>
						<input type="text" id="pass1" onblur="merpass1()" name="pass" class="form-control" >
				<span class="text-danger" id="passerr"><?php echo $passerr; ?></span>
				<span class="text-info" id="passsuc"></span>

					</div>
					<div class="col-md-6">
						<label>Re-Enter Password</label>
						<input type="password" id="repass"  name="repass" class="form-control">
				<span class="text-danger" id="repasserr"><?php echo $repasserr; ?></span>

					</div>
				</div>
			</div>
			<div class="form-group text-center">
				<input type="submit" name="submit" class="btn btn-primary btn-lg">
			</div>
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	function cname1()
	{
		var name=document.getElementById("name").value;
		if(name=="")
		{
			document.getElementById("nameerr").innerHTML="Name Name Can't be Empty";
		}
		else
		{
			document.getElementById("fnameerr").innerHTML="";
		}
	}
	function email1()
	{
		var email=document.getElementById("email").value;
		if(email=="")
		{
			document.getElementById("emailerr").innerHTML="Email Can't be Empty";
		}
		else
		{
			if(!email.match(/^[a-zA-Z0-9.]+@[a-zA-Z]+.[a-zA-Z.]+$/))
			{
				document.getElementById("emailerr").innerHTML="Email not valid";
			}
			else
			{
				document.getElementById("emailerr").innerHTML="";				
			}
		}
	}
	function number1()
	{
		var number=document.getElementById("number").value;
		if(number=="")
		{
			document.getElementById("numbererr").innerHTML="Number Can't be Empty";
		}
		else
		{
			if(!number.match(/^[0-9]{10,10}$/))
			{
			document.getElementById("numbererr").innerHTML="Number not correct";
			}
			else
		{
			document.getElementById("numbererr").innerHTML="";
		}
	}
	}
	function state1()
	{
		var state=document.getElementById("state").value;
		if(state=="0")
		{
			document.getElementById("stateerr").innerHTML="Please Select State";
		}
		else
		{
			document.getElementById("stateerr").innerHTML="";
		}
	}
	function pincode1()
	{
		var pincode=document.getElementById("pincode").value;
		if(pincode=="")
		{
			document.getElementById("pincodeerr").innerHTML="Pincode Can't be Empty";
		}
		else
			if(!pincode.match(/^[0-9]{6,6}$/))
			{
			document.getElementById("pincodeerr").innerHTML="Pincode not correct";
			}
			else
		{
			document.getElementById("pincodeerr").innerHTML="";
		}
	}
	function address1()
	{
		var address=document.getElementById("address").value;
		if(address=="")
		{
			document.getElementById("addresserr").innerHTML="Address Can't be Empty";
		}
		else
		{
			document.getElementById("addresserr").innerHTML="";
		}
	}
	function merpass1()
	{
		var pass=document.getElementById("pass1").value;
		var mat=/^[a-zA-Z0-9@!#$]{4,20}$/;
		if(pass==""&&!pass.match(mat))
		{
			document.getElementById("passerr").innerHTML="Password Can't be Empty";
						document.getElementById("passsuc").innerHTML="";

		}
		else
		{
			if((pass.length)>=1 && (pass.length)<=4)
			{
				document.getElementById("passsuc").innerHTML="Password is week";
			}
			else
			{
				if((pass.length)>=4 && (pass.length)<=8)
				{
				document.getElementById("passsuc").innerHTML="Password is normal";
				}
				else
				{
					if((pass.length)>=8)
					{
						document.getElementById("passsuc").innerHTML="Password is strong";
					}
				}
			}
		document.getElementById("passerr").innerHTML="";
				
		}
	}
</script>