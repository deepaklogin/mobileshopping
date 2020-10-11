<?php
session_start();
include_once "connection.php";
include_once "testcharacter.php";
if($_SESSION['cid']!=session_id())
{
	header("location:login.php");
}
$phoneid=$_GET['bookphoneid'];
if(empty($phoneid))
{
	header("location:customerorder.php");
}
else
{
$q1="update buyphone set status='0' where phoneid='$phoneid'";
if(mysqli_query($conn,$q1))
{
	echo '<script>alert("Your Order cancel..")</script>';
	header("refresh:.1;customerorder.php");
}
else
{

}
}
?>