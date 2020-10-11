<?php
session_start();
include_once "connection.php";
include_once "testcharacter.php";
if($_SESSION['mid']!=session_id())
{
	header("location:login.php");
}
$phoneid=$_GET['bookphoneid'];
if(empty($phoneid))
{
	header("location:mercentcancelorderlist.php");
}
else
{
$q1="update buyphone set status='1' where phoneid='$phoneid'";
if(mysqli_query($conn,$q1))
{
	echo '<script>alert("Your Order successfully..")</script>';
	header("refresh:.1;merchentorder.php");
}
else
{

}
}
?>