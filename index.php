<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}else {
    header('location: auth/index.php');
}

?>
<p>hrello</p>
<p> trying to push the file, hello</p>

