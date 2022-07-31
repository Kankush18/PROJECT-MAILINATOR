<?php
session_start();

 
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<?php


 $tmail=$_GET['tmail'] ?? null;

   $username=$_SESSION['username'];
    
    
    $q ="DELETE FROM `temp_mails` WHERE `user_name` = '$username' AND `temp_mail` = '$tmail' ";
    $q2 = "DELETE FROM `messages` WHERE `user_name` = '$username' AND `temp_mail` = '$tmail' ";
    echo $q ;
    echo $q2;
	mysqli_query($con, $q);
    mysqli_query($con, $q2);
   header('location:base.php')
    


?>