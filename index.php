<?php
session_start();
include "connection.php";
include "testcharacter.php";
if(isset($_SESSION['cid']))
{
  header("location:customer.php");
}

include_once "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Mobile</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="text/css" href="1.jpg">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap');
      body
      {
        font-size: 15px;
        font-family: 'Merriweather', serif;
      }
      .carousel-inner img {
    width: 100%;
    height: 100%;
  }
    </style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="font-size: 20px;">
        <a href="#" class="navbar-brand" style="color: black;">Shopping</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse" >
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <a href="register.php" class="nav-item nav-link">Customer Register</a>
                <a href="merchentregister.php" class="nav-item nav-link">Merchent Register</a>
                <a href="" class="nav-item nav-link">Help</a>
            </div>
            <form class="form-inline ml-auto">
                <input type="text" class="form-control mr-sm-2" id="myinput" placeholder="Search">
                <button type="submit" class="btn btn-outline-light">Search</button>
            </form>
        </div>
    </nav>
</div>

<?php
$q1="select * from merchent_phone_details limit 10";
$sql=mysqli_query($conn,$q1);
if($sql)
{
  if(mysqli_fetch_array($sql)>0)
  {     
    $sql=mysqli_query($conn,$q1);
echo '<div class="row" id="mydiv">';

    while($r=mysqli_fetch_array($sql))
    {
  echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mt-3 mx-auto" id="card">
    <div class="card shadow-lg col-xs-6 mx-auto" style="width:300px;height:450px;transition:2s;" >
      <img src="'.$r['mobile_image'].'" class="card-img-top p-2" style="width:300px;height:300px">
        <!-- <div class="card-header">Header</div> -->
       <div class="card-body">';
       echo '<h5 class="card-title text-center text-info">'.$r['mobile_name'].'</h5>';
       echo '<p class="card-text">Prize:-'.$r['mobile_max_prize'].'</p>';
       echo'<div class="card-text">About Phone:-"'.$r['about_mobile'].'"</div>';
      echo ' </div><br><br>';
      // echo' <div class="card-header"><a class="btn btn-success form-control" href="">Contact </a>
      //  </div>
    echo '</div>
  </div>';
  }
  echo '</div>';
}
}
?>
<!-- Contact Us page --><br><br>
<?php
$nameerr=$emailerr=$commenterr="";
if(isset($_POST['submit']))
{
  
  function name()
  {
    if(empty($_POST['name']))
    {
      return 'n';
    }
    else
    {
      return 'y';
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
      return 'y';
    }
  }
  function comment()
  {
    if(empty($_POST['comment']))
    {
      return 'n';
    }
    else 
    {
      return 'y';
    }
  }
  if(name()=='y')
  {
    $name=test_input($_POST['name']);
  }
  else
  {
    $nameerr="Name can't be Empty";
  }
  if(email()=='y')
  {
     $email=test_input($_POST['email']);
  }
  else
  {
    $emailerr="Email Can't be Empty";
  }
  if(comment()=='y')
  {
    $comment=test_input($_POST['comment']);
  }
  else
  {
    $commenterr="Comment Can't be Empty";
  }
  if(name()=='y'&&email()=='y'&&comment()=='y')
  {
  $q="insert into contactus (name,email,comment) values('$name','$email','$comment')";
  $sq=mysqli_query($conn,$q);
  if($sq)
  {
    echo '<script>alert("Thank You.. We Will Contact Soon..")</script>';
    // header("location:index.php");
  }
  else
  {
    echo '<script>alert("error")</script>';

  }
}
}
?>
<div class="col-xl-6 col-lg-7 col-md-8 col-sm-6 col-xs-7 mx-auto">
  <h2 class="text-capitalize text-center">Contact Us</h2><hr>
  <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="row">
      <div class="col-md-6">
        <label>NAME</label>
        <input type="text" name="name" class="form-control">
        <span class="text-danger"><?php echo $nameerr; ?></span>
      </div>
      <div class="col-md-6">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
        <span class="text-danger"><?php echo $emailerr; ?></span>

      </div>
    </div>
    <br>
    <div class="col-xs-12">
      <label>Comment</label>
      <textarea class="form-control" name="comment" rows="5"></textarea>
        <span class="text-danger"><?php echo $commenterr; ?></span>

    </div>
    <br><br>
    <div class=" text-center">
      <input type="submit" name="submit" class="btn btn-primary">
    </div>
  </form>
</div>
<br><br>
<header class="bg-primary col-md-12 p-3 col-sm-12 text-center">
  <div class="row">
    <div class="col-xl-3 col-md-6 col-sm-4 col-xs-12 mx-auto">
      <p style="font-size: 15px;">Shopping Mobile</p>
      <p>Deepak Rajak</p>

    </div><br><br>
    <div class="col-xl-3 col-md-6 col-sm-8 mx-auto">
      <h3><script type="text/javascript"> var date=new Date().getFullYear(); document.write(date); </script>&copy; All Rights Reserved</h3>
    </div><br><br>
    <!-- <div class="col-xl-3 col-md-6 mx-auto">
      <h3>Shopping2</h3>
    </div>
    <div class="col-xl-3 col-md-6 mx-auto">
      <h3>Shopping</h3>
    </div> -->

  </div>
</header>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $("#myinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mydiv #card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>