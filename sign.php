<?php
error_reporting(0);
$success=0;
$user=0;
$server="localhost";
$username="root";
$password="";
$database="signupform";

$con=mysqli_connect($server,$username,$password,$database);

$username=$_POST["username"];
$password=$_POST["password"];

if(!empty($username) && !empty($password)){
  
  $sql="select * from `registration` where username='$username'";
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    
    if($num>0){
      $user=1;
      
    }else{
      $sql="INSERT INTO `registration` (`username`, `password`) VALUES ('$username','$password')";
  $result=mysqli_query($con,$sql);
  
  if($result){
    $success=1;
  }else{
    die(mysqli_connect_error());
    
  }
    }
  
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
       <?php
       
     if($user){

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oh! No Sorry </strong> User already exit.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
     }
     ?>  
       <?php
    if($success){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Succes </strong> You have successfully signed up.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>   
    <h1 class="text-center">Signup Page</h1>
    <div class="container mt-5">
    <form action="signup.php" method="post">
  <div class="mb-3">
  <form>
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">Name</label>
    <input type="name" class="form-control" placeholder="Enter Your Name" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>
