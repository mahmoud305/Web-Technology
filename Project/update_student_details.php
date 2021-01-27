<?php
session_start();
if (isset($_POST["submit"])){ 
    $change=$_POST["change"];
    $change_to=$_POST["changeto"];
    
 
 // Create connection
$conn = mysqli_connect("localhost", "root", "1234", "test");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE users SET ".$change."= '".$change_to."' WHERE id=".$_SESSION["id"] ;

if (mysqli_query($conn, $sql)) {
    $_SESSION["user_updated"]=true;
  
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);}
?>


 

<!DOCTYPE html>
<html>
<head>

<style>
    body{
        text-align: center;
        background-image: url('student5.jpg');
            background-repeat: no-repeat;
            background-size: cover;
    }
    #maindiv{
        font-size: xx-large;
        width: 500px;
       /* display: block; display: inline-block;display: inline-block;*/
        margin: 100px auto ;
        text-align: center;
        border:5px solid yellowgreen;
        /* color:#FFF; */
    }
</style>
</head>
<body>
    <div id="maindiv"  >
    <label for="selcet"><?php echo $_SESSION["name"] ?> what do you want to change <span style="color :red;"> ?</span> </label>
   
        <form name="contactForm"   action="" method="POST" onsubmit="return validateForm()"> 
            <select style="font-size: x-large;  " name="change" id="change"  > 
            <option value="">Select :</option>
            <option value="username">Name</option>
            <option value="password">password</option>
            <option value="email">email</option>
          </select>
           <div> 
             <input  id="changeto" name="changeto" style="font-size :x-large; "  type="text" placeholder="change to "> </div>
            <input style="font-size :x-large; width:100%" type="submit" name="submit" value="change" >
            <button  style="font-size :x-large; width:100% ;color:black;" onclick="document.location.href='mainstudent.html'" > &#8617;  Back</button>
        </form>
        <div id="error" style="color:red;" > <?php if (isset($_SESSION["user_updated"] ) ){ echo "user updated successfully "; unset($_SESSION["user_updated"] ); }  ?> </div>
    </div>
 

</body>
<script>

 

function validateForm() {
    // Retrieving the values of form elements 
    var change_that = document.contactForm.change.value;
    var change_to = document.contactForm.changeto.value;
    //document.getElementById("test").innerHTML = change_that+" "+change_to;
   
    if(change_that=="" ||change_to==""){ 
        document.getElementById("error").innerHTML = "Choose what to change and and its replacment ";
        return false;
        }
  //  Validate name
    if(change_that==="username"){ 
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(change_to) == false) {
             
            document.getElementById("error").innerHTML ="Invalid name ";
            return false ;
        }  
        else return true;
    }
     //validate password 
     if(change_that==="password"){ 
        if (change_to.length<6){
            document.getElementById("error").innerHTML ="Too short password";
             
            return false ;}  
        return true;}


   

    // Validate email address
     if (change_that=="email"){ 
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(change_to) == false) {
            document.getElementById("error").innerHTML ="Invalid email address";
           
             return false;
        } else{
             return true ;
        }
     }
     //document.getElementById("error").innerHTML ="invalid  ";
     return false;
 
};

</script>
</html>