<?php

    session_start();
    error_reporting(0);
    $username =$_REQUEST["username"];
    $gen =$_REQUEST["gen"];
    $dob =$_REQUEST["dob"];
    $age =$_REQUEST["age"];
    $mob =$_REQUEST["mob"];
    $email=$_REQUEST["email"];

    $conn=mysqli_connect("localhost","root","","guvi");
    
    
    if(!isset($conn))
    {
        die("Database Not Found");
    }
    
    
    if(isset($_REQUEST["save"]))
    {
        $sql="update register set

        username='$username', gen='$gen', dob='$dob', age='$age', mob='$mob',  email='$email' where email='".$_SESSION['email']."'";

$sql1="update register set username ='$username' where email='".$_SESSION['email']."'";
mysqli_query($conn, $sql);
mysqli_query($conn, $sql1);

        
        header('location: home.php');
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        
        
    }
    
    
$q=mysqli_query($conn,"select username,gen,mob,dob,age from register where email='".$_SESSION['email']."'");
$n=  mysqli_fetch_assoc($q);
$username= $n['username'];
$gen= $n['gen'];
$mob= $n['mob'];
$dob= $n['dob'];
$age= $n['age'];
$email=$_SESSION['email'];

?>

<?php
            
            $result = mysqli_query($conn,"SELECT * FROM register WHERE email='".$_SESSION['email']."'");

                    while($row = mysqli_fetch_array($result))
                      {
                
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dcdd86daf3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/profile.css">
</head>
<body>
  <form method="POST" action=""></form>

    <div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li> -->
                  <!-- <li class="breadcrumb-item active" aria-current="page">User Profile</li> -->
                  <li class="breadcrumb-item"><a href="../index.html">Logout</a></li>
                </ol>
              </nav>
              <!-- /Breadcrumb -->
              <form method="POST" action="">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4><?php echo $username;?></h4>
                          <p class="text-secondary mb-1">Full Stack Developer</p>
                          <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                   
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="username" name="username" value="<?php echo $username;?>" >
                        
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="gen" name="gen" value="<?php echo $gen;?>">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="mob" name="mob" value="<?php echo $mob;?>">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Date of Birth</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="dob" name="dob" value="<?php echo $dob;?>">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Age</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="age" name="age" value="<?php echo $age;?>">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" id="email" name="email" value="<?php echo $email;?>" >
                        </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info " href="edit.php">Edit</a>
                          <input type="submit" class="btn btn-info " id="save" name="save" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
    
            </div>
        </div>
</body>
</html>
<?php
                      }
?>  