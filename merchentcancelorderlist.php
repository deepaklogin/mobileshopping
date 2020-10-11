<?php
session_start();
include "connection.php";
if($_SESSION['mid']!=session_id())
{
	header("location:login.php");
}
$q="select * from merchentregister where number='".$_SESSION['mphone']."'";
$sq=mysqli_query($conn,$q);
if($sq)
{
	$r=mysqli_fetch_array($sq);
	$_SESSION['merchent_id']=$r['merchent_id'];
  

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
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
        font-size: 16px;
      }
	  </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
  <a class="navbar-brand" style="color: black;" href="#">Shopping</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-white active" href="merchent.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="merchentphone.php">Mobile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="merchentorder.php">Your Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="merchentcancelorderlist.php">Cancel Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Help</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>     
    </ul>
    <ul class="tnav navbar-nav"><li><?php echo " 
    <a href='merchentprofile.php?id=".$r['merchent_id']."' class='text-white btn btn-info btn-sm'><i class='fa fa-user fa-2x btn' id='user'></i>".$r['name']."</a>";
    ?>
  </li>
  </ul> 
  </div>
  
</nav><br><br><br>
<?php
$q4="select * from buyphone where merchentid='".$_SESSION['merchent_id']."'";
$sq4=mysqli_query($conn,$q4);
if($sq4)
{
	if(mysqli_fetch_array($sq4)>0)
	{
		$sq4=mysqli_query($conn,$q4);
	echo '<div class="row">';
	 while($r4=mysqli_fetch_array($sq4))
	{
		$status=$r4['status'];
		if($status=="0")
		{
		echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 p-4 shadow-lg">';
		$bookphoneid=$r4['phoneid'];
		$customerid=$r4['customerid'];
	    $phoneid=$r4['merchentphoneid'];
	    echo '<p class="text-center">Phone id:-'.$r4['phoneid'].'</p>';
	    // merchent phone details
	    $q2="select * from merchent_phone_details where mobile_id='".$phoneid."'";
		$sq2=mysqli_query($conn,$q2);
		if($sq2)
		{
			if(mysqli_fetch_array($sq2)>0)
			{
				$sq2=mysqli_query($conn,$q2);
				while($r2=mysqli_fetch_array($sq2))
				{
					echo '<div class="text-center"><img src="'.$r2['mobile_image'].'" width="460px"></div>';
					echo '<h1 class="text-center">Mobile Name:-'.$r2['mobile_name'].'</h1><br>';
					echo '<h1 class="text-center">Mobile Prize:-'.$r2['mobile_max_prize'].'</h1><br>';
				}
			}
		}
		// merchent details
		$q3="select * from customerregister where customer_id='".$customerid."'";
		$sq3=mysqli_query($conn,$q3);
		if($sq3)
		{
			if(mysqli_fetch_array($sq3)>0)
			{
				$sq3=mysqli_query($conn,$q3);
				while($r3=mysqli_fetch_array($sq3))
				{
					echo '<h3 class="text-center">Customer Name:-'.$r3['first_name'].' '.$r3['last_name'].'</h3><br>';
					echo '<h3 class="text-center">Customer Contact No.:-'.$r3['phone_number'].'</h3><br>';
					echo '<h3 class="text-center">Booking Date.:-'.$r4['bookingdate'].'</h3><br>';
				}
			}
		}
		echo '<a class="btn btn-success btn-sm form-control" href="merchentreorder.php?bookphoneid='.$bookphoneid.'" >Re Order</a>';
  		echo '</div>';
	}
}
}
}
else
{
	echo '<br><h1 class="text-center text-danger border border-dark">No Record Found</h1>';
}

?>
</body>
</html>