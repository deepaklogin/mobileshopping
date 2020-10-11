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
  $_SESSION['custid']=$cid;
	// echo '<script>alert("'.$cid.'")</script>';

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="text/css" href="1.jpg">
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
        font-size: 16px;
      }
	  </style>
</head>
<body>
 <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top ">
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
        <a class="nav-link text-white" href="cancelorderlist.php">Cancel Orders</a>
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
<div class="container-fluid mx-auto">
<?php
$q1="select * from merchent_phone_details";
$sql=mysqli_query($conn,$q1);
if($sql)
{
  if(mysqli_fetch_array($sql)>0)
  {     
    $sql=mysqli_query($conn,$q1);
    
echo '<div class="row">';

    while($r=mysqli_fetch_array($sql))
    {
      // $mobileid=$r['mobile_id'];
      $_SESSION['merid']=$r['merchent_id'];
      $_SESSION['merphid']=$r['mobile_id'];
	echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-8 mb-3 mt-2 p-1 mx-auto ">
		<div class="card shadow-lg col-xs-6 mx-auto" style="width:330px;">
			<img src="'.$r['mobile_image'].'" class="card-img-top p-2" style="width:300px;height:300px">
  			<!-- <div class="card-header">Header</div> -->
 			 <div class="card-body">';
       echo '<h5 class="card-title text-center text-info">'.$r['mobile_name'].'</h5>';
 			 echo '<p class="card-text">Prize:-'.$r['mobile_max_prize'].'</p>'; 			
 			echo'<div class="card-text">"'.$r['about_mobile'].'"</div></div>';
      echo' <div class="card-header"><a class="btn btn-success form-control" href="customercontact.php?mobid='.$r['mobile_id'].'&merchentid='.$r['merchent_id'].'">View Details</a>
 			 </div>
		</div>
	</div>';
  }
  echo '</div>';
}
}
?>
</div>
</body>
</html>
<script type="text/javascript">
	// jQuery(document).ready(function($) {
	// 	$("#user").click(function(){
	// 		$("#useropen").toggle("slow");
	// 	});
	// });
</script>