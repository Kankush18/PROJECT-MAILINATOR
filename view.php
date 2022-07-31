<?php
$tmail=$_GET['tmail'];
$_SESSION['tmail']=$tmail;
header('location:front.php');


?>