<?php 
session_start();
$username = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];
$role = $_POST["role"];
if ($role=="admin")
    $role=true;
else $role = false;

//echo "name = ".$username." password = ".$password." email  is = ".$email." is_admin ? ".$role;
  

$servername = "localhost";
$user = "root";
$pass = "1234";

$connection = mysqli_connect($servername, $user, $pass, "test");
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

 
  	$sql = "SELECT * FROM users WHERE email='$email'";

  	$res_e = mysqli_query($connection, $sql);

  	if (mysqli_num_rows($res_e) > 0) {
  
      $_SESSION["exist_email"]=$email;
      
      header('Location: index.php');
    }

else {$sql = "INSERT INTO users ( username,email,role ,password  )
VALUES ('$username','$email','$role','$password')";
 

if (mysqli_query($connection, $sql)) {
  $_SESSION["userAdded"]=true;
  
 
  //echo "New record created successfully";
} else {
  $_SESSION["userAdded"]=false;

 // echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}


// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);


  header('Location: index.php');
 }

/*$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. "  email : " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}*/