<?php
session_start();
$bookName=$_POST["bname"];
$Bookid=$_POST["bID"];
$catagory=$_POST["catagory"];
$author=$_POST["au"];
$pubyear=$_POST["pubyear"];
 
$connection=mysqli_connect("localhost", "root", "1234", "test");
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
$sql="INSERT INTO books (bookName,catagory,author,bookID,pub_year)
VALUES ('$bookName','$catagory','$author','$Bookid','$pubyear')
";
if (mysqli_query($connection, $sql)) {
    $_SESSION["bookAdded"]=true; }
    
   
    //echo "New record created successfully";
  else {
    $_SESSION["bookAdded"]=false;
  
   // echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  } header('Location: admin.php'); 
