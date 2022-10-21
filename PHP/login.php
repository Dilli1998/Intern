<?php
session_start();

$conn=mysqli_connect("localhost","root","","guvi");
if(!isset($conn))
{
    die("Database Not Found");
}


if(isset($_REQUEST["login"]))
{
    
 $email=$_POST['email'];
 $password=$_POST['password'];
 if($email!=''&&$password!='')
 {
   $query=mysqli_query($conn,"select * from register where email='".$email."' and password='".$password."'");
   $res=mysqli_fetch_row($query);

   if($res)
   {
    $_SESSION['email']=$email;
    header('location: home.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }
  }
 else
 {
     echo '<script>';
    echo 'alert("Enter both username and password")';
    echo '</script>';
 
 }
}
?>