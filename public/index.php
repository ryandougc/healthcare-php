<!DOCTYPE HTML>
<html>
<head>
        <title>Healthcare Assitant System</title>
        <link href = "style.css" type = "text/css" rel = "stylesheet" />
        <p>WELCOME!!!</p>
        <p>Healthcare Assitant System</p>
        <style type = "text/css">

        #slider-image {
            overflow: hidden;
        }
        #slider-image figure {
            position: relative;
            width: 500%;
            margin: 0;
            left: 0;
            animation: 20s slider infinite;
        }

        #slider-image figure img {
            float: left;
            width: 20%;
        }

        @keyframes slider {
            0% {
                left: 0;
            }
            20% {
                left: 0;
            }
            25% {
                left: -100%;
            }
            45% {
                left: -100%;
            }
            50% {
                left: -200%;
            }
            70% {
                left: -200%;
            }
            75% {
                left: -300%;
            }
            95% {
                left: -300%;
            }
        }
        </style>
    </head>
    <body>
        <div id="slider-image">
            <figure>
                <img src = "images/hospital3.jpg">
                <img src = "images/hospital4.jpg">
                <img src = "images/hospital5.jpg">
                <img src = "images/hospital6.jpg">
            </figure>
        </div>
    </body>
<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: ../app/view/welcome.php');
}

?>
<body>
    <a href="app/view/signinpage.php">
        <button>Sign In</button>
    <a href="app/view/signuppage.php">
        <button>Sign Up</button>
</body>
</html> 
