<?php
session_start();
include_once "connection.php";
include_once "testcharacter.php";
if($_SESSION['cid']!=session_id())
{
	header("location:login.php");
}

$q="select * from customerregister where phone_number='".$_SESSION['phone']."'";
$sq=mysqli_query($conn,$q);
if($sq)
{
	$r=mysqli_fetch_array($sq);
	$cid=$r['customer_id'];
	// echo '<script>alert("'.$cid.'")</script>';
}
// data come from customer page who want buy phone
$mobileid=test_input($_GET['mobid']);
$merchentid=test_input($_GET['merchentid']);
$q1="select * from merchent_phone_details where mobile_id=$mobileid and merchent_id=$merchentid ";
$sq1=mysqli_query($conn,$q1);
if($sq1)
{
	$r1=mysqli_fetch_array($sq1);
	$mpid=$r1['mobile_id'];
}
$q2="select * from merchentregister where merchent_id=$merchentid ";
$sq2=mysqli_query($conn,$q2);
if($sq2)
{
  $r2=mysqli_fetch_array($sq2);
  $mid=$r2['merchent_id'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer to Merchent</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
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
 <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
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
        <a class="nav-link text-white" href="customerorder.php">Your Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Cancel Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Help</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo " 
    <a href='customerprofile.php?id=".$r['customer_id']."' class='text-white btn btn-info btn-sm'><i class='fa fa-user fa-2x btn' id='user'></i>".$r['first_name']."</a>";
    ?></li>
    </ul>
  </div> 
</nav><br><br><br>

<!-- phone page -->
<div class="row">
  <div class="col-md-4">
    <div class="text-center col-sm-12">
    <img src="<?php echo $r1['mobile_image'];?>" style="width: 400px">
  </div>
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="col-md-8 col-xs-5 col-sm-6 mx-auto">
    <h2 style="font-size: 30px;" class="text-capitalize">Brand Name:-<?php echo $r1['mobile_name'] ?></h2>
    <p class="text-capitalize" style="font-size: 20px;">About Phone:-<?php echo $r1['about_mobile']; ?></p>
    <p class="text-capitalize" style="font-size: 20px;">Prize:-<?php echo $r1['mobile_max_prize']; ?></p>
    <p class="text-capitalize" style="font-size: 20px;">Seller Name:-<?php echo $r2['name']; ?></p>
    <p class="text-capitalize" style="font-size: 20px;">Seller Contact Number:-<?php echo $r2['number']; ?></p>
    <?php
    if(isset($_POST['buynow']))
    {
      $q3="insert into buyphone(customerid,merchentid,merchentphoneid,bookingdate,status) values('$cid','$mid','$mpid','".Date('Y-m-d')."',1)  ";
      $sq3=mysqli_query($conn,$q3);
    if($sq3)
    {
      echo '<script>alert("Order Successfully...")</script>';
      header("refresh:0.1;customerorder.php");
    }
    else
    {
      echo mysqli_error($conn);
    }
    }
    ?>
  <form action="" method="POST" class="form">

    <input type="submit" name="buynow" class="btn btn-primary" value="Buy Now">
  
  </form>
  </div>
</div>
</div>
</body>
</html>