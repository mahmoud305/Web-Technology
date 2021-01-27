<?php
session_start();

if (isset($_POST["submit"])){ 
    $change=$_POST["change"];
    $change_to=$_POST["changeto"];
    $bookID=$_POST["B_ID"];
 
 // Create connection
$conn = mysqli_connect("localhost", "root", "1234", "test");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books WHERE bookID='$bookID'";

$res_e = mysqli_query($conn, $sql);

if (mysqli_num_rows($res_e) > 0) {
    

$sql = "UPDATE books SET ".$change."= '".$change_to."' WHERE bookID='".$bookID."'";

if (mysqli_query($conn, $sql)) {
   
  $_SESSION["book_updated"]=true;
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);} 
else {echo "No book with ID = (".$bookID.")";}



}
?>


 

<!DOCTYPE html>
<html>
<head>

<style>
    body{
        text-align: center;
        background-image: url('admin.jpg');
            background-repeat: no-repeat;
            background-size: cover;
    }
    #maindiv{
        font-size: xx-large;
        width: 500px;
        
        margin: 100px auto ;
        text-align: center;
        border:5px solid yellowgreen;
        color:#FFF;
    }
</style>
</head>
<body>
    <div id="maindiv"  >
    <label for="selcet"><?php echo $_SESSION["name"] ?> what do you want to change <span style="color :red;"> ?</span> </label>
   
        <form name="contactForm"   action="" method="POST" onsubmit="return validateForm()"> 
            <input style="font-size :x-large; width:100%" type="text" id="B_ID" name="B_ID" placeholder="Enter book ID to be changed" >
            <select style="font-size: x-large;  " name="change" id="change"  > 
            <option value="">Select :</option>
            <option value="bookName">Name</option>
            <option value="catagory">catagory</option>
            <option value="author">author</option>
            <option value="bookID">bookID</option>
            <option value="pub_year">publication year</option>
          </select>
           <div> 
             <input  id="changeto" name="changeto" style="font-size :x-large; "  type="text" placeholder="change to "> </div>
            <input style="font-size :x-large; width:100%" type="submit" name="submit" value="change" >
            <button  style="font-size :x-large; width:100% ; " onclick="document.location.href='mainadmin.php';" > &#8617;  Back</button>
        </form>
        <div id="error"style="color: red;" ><?php if (isset($_SESSION["book_updated"] ) ){ echo "book updated successfully "; unset($_SESSION["book_updated"] ); }  ?> </div>
    </div>
 

</body>
<script>

function validateForm() {
    // Retrieving the values of form elements 
    var change_that = document.contactForm.change.value;
    var change_to = document.contactForm.changeto.value;
    //document.getElementById("test").innerHTML = change_that+" "+change_to;
   
    if(change_that=="" ||change_to==""){ 
        document.getElementById("error").innerHTML = "Choose what to change and and its replacement ";
        return false;
        }
   else 
     return true;
 
};

</script>
</html>