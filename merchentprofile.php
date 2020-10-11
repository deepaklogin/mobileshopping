<?php
session_start();
if($_SESSION['mid']!=session_id())
{
	header("location:login.php");
}
include "connection.php";
$id=$_GET['id'];
$q="select * from merchentregister where merchent_id='$id'";
$sq=mysqli_query($conn,$q);
$r=mysqli_fetch_array($sq);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Profile</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
	  </style>
</head>
<body>
<div class="container">
	<div class="col-xl-8 col-lg-8 col-md-10 col-sm-10 col-xs-5 mt-5 mx-auto shadow-lg">
		<div class="text-center">
		<img src="1.jpg" class="img-rounded mt-n5" width="100" height="100" style="border-radius: 50%;">
		</div>
		<div class="p-2 text-center" style="font-size: 20px;">
			<table class="table table-borderless">
				<tr>
					<td>Name</td>
					<td><?php echo $r['name'];?></td>
				</tr>
				<tr>
					<td>Email ID</td>
					<td><?php echo $r['email']?></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><?php echo $r['number']?></td>
				</tr>
				<tr>
					<td>State</td>
					<td><?php echo $r['state']?></td>
				</tr>
				<tr>
					<td>Pin Code</td>
					<td><?php echo $r['pincode']?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $r['address']?></td>
				</tr>
			</table>
		<div class="text-center">
		<a href="customer.php" class="btn btn-success " style="padding: 0px 30px;font-size: 30px;">Back</a>
	</div>
		</div>
	</div>
</div>
</body>
</html>