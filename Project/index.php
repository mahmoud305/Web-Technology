<?php
session_start();
 function isemail_exist($e){
    return $e;

 }
?>

<!DOCTYPE HTML>

<html>

<head>
    <style>
        body {
            background-image: url('books5.jpg');
            background-repeat: no-repeat;
            background-size: cover;

        }

        .tablee {
            font-size: x-large;
            position: relative;

        }
    </style>

    <title>Sign in OR Sign up </title>

</head>

<body>
   
 

    <div class="one" style=" font-size: xx-large ;border-bottom: 2px groove red; text-align: center; padding:  20px;">
        <form action="login.php" method="POST"  >
        <div style="display: inline-block; position: relative;padding-left: 700px;"> <label for="email"> Email :</label>

            <input type="text" name="email" id="email" style="width:15em ; " required placeholder="email">
            </div>
        <div style="display: inline-block;"><label for="password"> Password: </label> <input type="password"
                name="password" id="password" required placeholder="password"> </div>
        <div style="display: inline-block; position: relative;"> <button type="submit"  
                style=" font-size: x-large;"> Sign in </button></div>
              
    <div style="font-size: large; color: blue ;padding-left:800px; "  >   <?php if(isset($_SESSION['flag'])) echo"<br>  invalid email or password ";
                                                                                 unset ($_SESSION['flag'])  ;        ?> </div>  
        </form>
    </div>
    <br>

    <div style=" margin-left: 1000px; width: 400px; border: 1px solid red; text-align: center;">
        <form name="contactForm" onsubmit="return validateForm()" action="qwe.php" method="POST">
            <h2> Don't have an account? fill out the following form to get one </h2>
                <br> <br>
                <div class="tablee"> <label for="name">Name:</label> <input class="tablee" type="text " id="name"
                        name="name" placeholder="name" required> </div>
                <br>

                <div class="tablee"> <label for="password">Password: </label> <input type="password" class="tablee"
                        style="width: 257px;" type="text" id="password" name="password" placeholder="password" required>
                </div> 
                <br>
                <div class="tablee"> <label for="email">Email: </label> <input class="tablee" type="text" onblur="validateEmail(email)" name="email"
                        id="email" placeholder="email" required> </div>
                <br>
                <div class="tablee" style="  display: inline-block;"> <label for="admin"> <input type="radio"
                            name="role" value="admin" id="admin"> Admin </label></div>

                <div class="tablee" style="  display: inline-block;"> <label for="User"> <input type="radio"
                            value="user" name="role" id="user"> User </label> <br> </div>
                <br><br>
                 <div  id="as" style="font-size: large; color: blue;" > </div>
                 <br>
                <div> <input class="tablee" type="submit" value="Register"  > </div>
        </form>
        <br>
       <div style="font-size: large; color: green ;">
        <?php if (isset($_SESSION["userAdded"])){  echo "New record created successfully you can login now ";unset($_SESSION["userAdded"]) ;}
        ?> </div>
        <div style="font-size: large; color: red ;"> <?php if (isset($_SESSION["exist_email"])) {echo"this email (".$_SESSION["exist_email"].")\n is already registered ";unset($_SESSION["exist_email"]) ; }
?> </div>
    </div>

    <script>

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}



 
// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.contactForm.name.value;
    var email = document.contactForm.email.value;
    var pass = document.contactForm.password.value;
    var radio_1= document.getElementById("admin").checked;
    var radio_2 = document.getElementById("user").checked;
   
    
 
    
    // Validate name
    
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) == false) {
             
            document.getElementById("as").innerHTML ="invalid name "
            return false ;
        }  
    
     //validate password 
        if (pass.length<6){
            document.getElementById("as").innerHTML ="too short password";
             
            return false ;}
        
    if (radio_1==false && radio_2==false ){
        document.getElementById("as").innerHTML = "are you an admin or user ? ";
        return false;
    }


    // Validate email address
     
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) == false) {
            document.getElementById("as").innerHTML ="invalid email address";
           
             return false;
        } else{//then it is in the email format 
          
             return true ;
        }
    
    
 
};

        

    </script>

</body>

</html>