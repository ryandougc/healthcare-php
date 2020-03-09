<?php

session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}else {
    header('location: auth/index.php');
}

?>
<<<<<<< HEAD
<p>hrello</p>
<p> trying to push the file, hello</p>
=======
>>>>>>> 9ae7147043e097b1ec97cf512a6e583e5ff64f54

