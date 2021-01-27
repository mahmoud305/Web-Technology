<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-image: url("admin.jpg");
            /* background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed; */
            color: #FFF;
            text-align: center;
            font-size: xx-large;
        }

        #maindev {
            width: 700px;
            text-align: center;
            display: block;
            color: #fff;
            border: 5px groove yellowgreen;
            margin: 0 auto;
            font-size: xx-large;
        }

        .bt {
            width: 80%;
            background-color: #4CAF50;
            color: #FFF;
            font-size: xx-large;
            font-weight: bold;
        }

        .smalldiv {

            margin: 20px 0;
        }
    </style>

    <script>
        function showbooks() {
            // if (str == "") {
            //     document.getElementById("txtHint").innerHTML = "";
            //     return;
            // } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("printbooks").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "printbooks.php", true);
                xmlhttp.send();
            // }
        }
    </script>

</head>

<body>
    <h2> Welcome would you want to :</h2>
        <div id="maindev">
            <div class="smalldiv"> <button class="bt" onclick="document.location.href='update_admin_details.php'"> Update your details </button></div>
            <div class="smalldiv"><button class="bt" onclick="document.location.href='admin.php';"> Add a book </button>
            </div>
            <div class="smalldiv"><button class="bt" onclick="document.location.href='update_book_details.php';" > Update a book details</button></div>
            
            <div class="smalldiv"><button class="bt" onclick="showbooks()">Browsing books </button> </div>
            <div class="smalldiv"><button class="bt" onclick="document.location.href='sendmail.php';">Send mail for late borrowers </button> </div>
            <div class="smalldiv"><button class="bt" onclick="document.location.href='print_specific.php';"> Showing specific books </button> </div>

            <div class="smalldiv"  ><button style="background-color: red; "class="bt" onclick="document.location.href='logout.php';"> Logout  </button></div>
            <br>
            <div style="color:red;"><?php if (isset($_SESSION["sendedmails"] ) ){if ($_SESSION["sendedmails"]==false) echo " No late borrowers  "; else echo "There is ".$_SESSION["sendedmails"]." late borrowers and alert email sent  "; unset($_SESSION["sendedmails"]); }  ?> </div>
        </div>
<br>
        <div id="printbooks"></div>

</body>

</html>