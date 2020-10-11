<?php
$mobilenameerr=$maxprizeerr=$minprizeerr=$abouterr=$imageerr="";
include "connection.php";
include "testcharacter.php";
session_start();
if($_SESSION['mid']!=session_id())
{
	header("location:login.php");
}
function mobilename()
{
	if($_POST['mobilename']=='')
	{
		return 'n';
	}
	else
	{
		return 'y';
	}
}
// function minprize()
// {
// 	if($_POST['minprize']=='')
// 	{
// 		return 'n';
// 	}
// 	else
// 	{
// 		return 'y';
// 	}
// }
function maxprize()
{
	if(empty($_POST['maxprize']))
	{
		return 'n';
	}
	else
	{
		return 'y';
	}
}
function about()
{
	if(empty($_POST['aboutphone']))
	{
		return 'n';
	}
	else
	{
		return 'y';
	}
}
function images()
{
	if($_FILES['image']['name']!='')
	{
		$file=$_FILES['image']['name'];
		$length=strlen($file);
		$position=strpos($file,'.');
		$cuting=strtolower(substr($file,$position+1,$length));
		$a=array('png','bmp','jpg','jpeg','gif');
		if(in_array($cuting,$a))
		{
			return 'y';
		}
		else
		{
			return 'n';
		}
	}
	else
	{
		return 'n';
	}
}
if(isset($_POST['submit']))
{
	if(mobilename()=='y')
	{
		$mobilename=test_input($_POST['mobilename']);
	}
	else
	{
		$mobilenameerr="Name Can't be Empty";
	}
	// if(minprize()=='y')
	// {
	// 	$minprize=test_input($_POST['minprize']);
	// }
	// else
	// {
	// 	$minprizeerr="Min prize Can't be Empty";
	// }
	if(maxprize()=='y')
	{
		$maxprize=test_input($_POST['maxprize']);
	}
	else
	{
		$maxprizeerr="Max prize Can't be Empty";
	}
	if(about()=='y')
	{
		$about=test_input($_POST['aboutphone']);
	}
	else
	{
		$abouterr="Phone About Can't Be Empty";
	}
	if(images()=='y')
	{
		$image=test_input($_FILES['image']['name']);
		$imagetmp=$_FILES['image']['tmp_name'];
	}
	else
	{
		$imageerr="Image Can't Be Empty";
	}
	if(mobilename()=='y'&&maxprize()=='y'&&about()=='y'&&images()=='y')
	{
		$upload='merchentphone/'.uniqid().$image;
		$q="insert into merchent_phone_details (merchent_id,mobile_name,mobile_max_prize,about_mobile,mobile_image) values('".$_SESSION['merchent_id']."','$mobilename','$maxprize','$about','$upload')";
		$sq=mysqli_query($conn,$q);
		if($sq)
		{
			move_uploaded_file($imagetmp,$upload);
			echo '<script>alert("phone details upload successfully....")</script>';
			header("refresh:0.3");
		}
		else
		{
			echo mysqli_error($conn);
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Phones</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap');
      body
      {
        font-family: 'Merriweather', serif;
        font-size: 18px;
      }

    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-6 mx-auto shadow-lg p-3">
			<h2 class="text-primary text-center">Enter Phone Details</h2>
			<hr class="hr-text">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mobile Name</label>
					<input type="text" name="mobilename" class="form-control">
					<span class="text-danger"><?php echo $mobilenameerr; ?></span>
				</div>
				<div class="form-group">
					<div class="row">
						<!-- <div class="col-md-6">
							<label>Min Prize</label>
							<input type="text" name="minprize" class="form-control">
							<span class="text-danger "><?php echo $minprizeerr; ?></span>
						</div> -->
						<div class="col-md-12">
							<label>Prize</label>
							<input type="text" name="maxprize" class="form-control">
							<span class="text-danger"><?php echo $maxprizeerr ; ?></span>

						</div>
					</div>
				</div>
				<div class="form-group">
					<label>About Phone</label>
					<input type="text" name="aboutphone" class="form-control">
					<span class="text-danger"><?php echo $abouterr; ?></span>

				</div>
				<div class="form-group">
					<label>Phone Images</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="image">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					<span class="text-danger"><?php echo $imageerr; ?></span>

				</div>
				<div class="form-group text-center">
					<div class="row">
						<div class="col-md-6 mx-auto">
							<a href="merchent.php" class="btn btn-primary ">Back</a>
						</div>
						<div class="col-md-6 ">
							<input type="submit" name="submit" class="btn  btn-success">
						</div>
					</div>					
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>