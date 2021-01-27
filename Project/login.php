<?php
session_start();
$email=$_POST["email"];
$password=$_POST["password"];
$connection= mysqli_connect("localhost","root","1234","test");
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $id="SELECT id ,role,username From users WHERE email='$email'and password='$password' ";
 $result=mysqli_query($connection,$id);
 $row = mysqli_fetch_assoc($result);
 if ($row["id"]==0){
  $_SESSION["flag"]=true;
  
  header('Location: index.php');
	exit;
 }
 else {
   $_SESSION["name"]=$row["username"];
   $_SESSION["role"]=$row["role"];
   $_SESSION["email"]=$email;
   $_SESSION["password"]=$password;
   $_SESSION["id"]=$row["id"];
   
  if ($_SESSION["role"]==true)
   header('location: mainadmin.php');
   else header('location: mainstudent.html');
 }
  
  
  ?>
<!--    
<html>
<head>

</head>
  <body>
    <div> 
<button onclick="document.location.href='logout.php';" > Logout</button>
</div>
</body>

  </html>
   -->
