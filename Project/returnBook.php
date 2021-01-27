<?php 
session_start();
if (isset($_POST["submit"])){ 
$bookid=$_POST["b_id"];

$servername = "localhost";
$user = "root";
$pass = "1234";

$connection = mysqli_connect($servername, $user, $pass, "test");
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

 
  	$sql = "SELECT * FROM borrowed WHERE book_id='$bookid' and student_id='{$_SESSION["id"]}' ";

  	$res_e = mysqli_query($connection, $sql);

      if (mysqli_num_rows($res_e) > 0) {
           
        $sql = "DELETE FROM borrowed WHERE  book_id='$bookid' and student_id='{$_SESSION["id"]}' ";
          if (mysqli_query($connection, $sql)){
              $_SESSION["found"]=true;
            //  echo "borrwed successeded";
          } 
          else {
            echo "Error updating record: " . mysqli_error($connection)." you already have that book";
          }
          

      }
      else $_SESSION["found"]=false;}


?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-image: url("student5.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

            text-align: center;
            font-size: x-large;
        }

        #maindiv {
            text-align: center;
            border: 5px solid red;
            margin: 100px auto;
            width: 600px;
            display: block;
            padding: 10px;

        }
        input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
    </style>
</head>

<body>        

    <div id="maindiv">
        <h2> Enter the id of the book you want to<span style="color: red;" > return </span> </h2>
        <form action="" method="POST" style="display: inline-block;">
            <input type="text" placeholder="Book ID" name="b_id" id="b_id">
            <input type="submit" value="return" id="submit" name="submit" style="color: blue; width: 100%; font-size: x-large;">


        </form>
        <br><br>
       
        <button  style="font-size :x-large; width:50% ;color:black;" onclick="document.location.href='mainstudent.html'" > &#8617;  Back</button>
        <div id="result_div"style="color:red;font-weight: bold;" > <?php if (isset($_SESSION["found"])){if ($_SESSION["found"]===true) echo"Book returned successfully "; 
                                    else echo"You did not take that book .";unset($_SESSION["found"]);  } ?> </div>
    </div>

</body>

</html>