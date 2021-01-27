<?php
session_start();

if (isset($_POST["submit"])){ 
    $condition=$_POST["condition"];
    $print=$_POST["print"];
    

 // Create connection
$conn = mysqli_connect("localhost", "root", "1234", "test");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo $print." ".$condition;
$sql="SELECT * FROM books where $print='$condition'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
echo "<table>
<tr>
<th>Book name</th>
<th>Category</th>
<th>Author</th>
<th>Publication year</th>
<th>ID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['bookName'] . "</td>";
  echo "<td>" . $row['catagory'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "<td>" . $row['pub_year'] . "</td>";
  echo "<td>" . $row['bookID'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);}
 else
 echo"<span style=\"color:#fff; font-size:xx-large; \">No books satisfy that condition</span>";


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
    table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
    color:#fff;
    font-size: xx-large;

  border: 1px solid #4CAF50;
  padding: 5px;
}

th {text-align: left; font-weight:bold;}
</style>
</head>
<body>
    <div id="maindiv"  >
    <label for="selcet">  what do you want to print <span style="color :red;"> ?</span> </label>
   
        <form name="contactForm"   action="" method="POST" onsubmit="return validateForm()"> 
             <select style="font-size: x-large;  " name="print" id="print"  > 
            <option value="">Select :</option>
            <option value="bookName">Name</option>
            <option value="catagory">catagory</option>
            <option value="author">author</option>
            <option value="bookID">bookID</option>
            <option value="pub_year">publication year</option>
          </select>
          <br><br>
           <div> 
             <input  id="condition" name="condition" style="font-size :x-large; width:100% "  type="text" placeholder="enter the condition in a single word "> </div>
            <input style="font-size :x-large; width:100%" type="submit" name="submit" value="print" >
            <br>
            <button  style="font-size :x-large; width:100% ; " onclick="document.location.href='mainadmin.php';" > &#8617;  Back</button>
        </form>
        <div id="error"style="color: red;" ><?php if (isset($_SESSION["book_updated"] ) ){ echo "book updated successfully "; unset($_SESSION["book_updated"] ); }  ?> </div>
    </div>
 

</body>
<script>

function validateForm() {
    // Retrieving the values of form elements 
    var change_that = document.contactForm.print.value;
    var change_to = document.contactForm.condition.value;
    //document.getElementById("test").innerHTML = change_that+" "+change_to;
   
    if(change_that=="" ||change_to==""){ 
        document.getElementById("error").innerHTML = "Choose what to print and and its condition ";
        return false;
        }
   else 
     return true;
 
};

</script>
</html>