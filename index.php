<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}else {
    header('location: auth/index.php');
}

?>
<p>hrello</p>
$str = <<<EOD
The customers name is HarveerDeol
and they live at 8428 street
EOD;

echo $str;