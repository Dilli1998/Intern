<?php
require_once('config.php');
$username = $gen = $dob = $age =  $mob = $email = $password =  '';

$username = $_POST['username'];
$gen = $_POST['gen'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$mob = $_POST['mob'];
$email = $_POST['email'];
$password = $_POST['password'];
//$password = MD5($pwd);

$sql = "INSERT INTO register (username,gen,dob,age,mob,email,password) VALUES ('$username','$gen','$dob','$age','$mob','$email','$password')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: ../login.html");
}
else
{
	echo "Error :".$sql;
}
?>