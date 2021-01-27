<?php
session_start();
$servername = "localhost";
$user = "root";
$pass = "1234";

$connection = mysqli_connect($servername, $user, $pass, "test");
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());

}
 $current_date=date("Y-m-d");
$sql="SELECT student_id ,book_id from borrowed where return_time<'$current_date'";
$late_id=mysqli_query($connection,$sql);
while ($row = mysqli_fetch_array($late_id)) {
    $id=$row["student_id"];
    $sql="SELECT email from users where id='$id'";
        $email=mysqli_query($connection,$sql);
        $sendemail = mysqli_fetch_assoc($email);
       // echo($sendemail["email"]."<br>");
       $message="You have to return the book with id =".$row["book_id"]."as its borrowing period has ended";
       $subject="The Library System";
       mail($sendemail["email"],$subject,$message);
     

}

if (!mysqli_query($connection, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
else if (mysqli_num_rows($late_id)==0){
$_SESSION["sendedmails"]=false;
}
else if (mysqli_num_rows($late_id)>0)
    $_SESSION["sendedmails"]=mysqli_num_rows($late_id);

    header('location: mainadmin.php');
