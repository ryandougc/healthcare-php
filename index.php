<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}else {
    header('location: auth/index.php');
}

<<<<<<< HEAD
?>
<p>hrello</p>
=======


?>

<p>d</p>
>>>>>>> 1e62b550dc75b7eb78a54b9f17258a8a9edefe21
