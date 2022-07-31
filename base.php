<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<?php
$tmail=$_SESSION['tmail'];
$username=$user_data['user_name'];

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=login_sample_db', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$statement=$pdo->prepare("SELECT * FROM temp_mails WHERE `user_name`='$username'");
$statement->execute();
$mails=$statement->fetchAll(PDO::FETCH_ASSOC);


function no_of_mails($temp_mail){
    
   
    $username=$_SESSION['username'];
    $p = new PDO('mysql:host=localhost;port=3306;dbname=login_sample_db', 'root','');
    $p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $st=$p->prepare("SELECT * FROM messages WHERE `user_name`= '$username' AND `temp_mail`= '$temp_mail'");
    $st->execute();
    $temperary_mails=$st->fetchAll(PDO::FETCH_ASSOC);
    $i=0;
    foreach($temperary_mails as $m){
        $i++;
    }
    return $i;
  }

?>
<?php 
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="base.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="bar">
        <div class="nav">
        
             <div>   <a class="home"  href=""> Mailinator</a></div>
             <div><a href="front.php">Generate mail </a></div>
             <div><a href="base.php">Dashboard </a></div>
             <div><a href="">Contact</a></div>
             <div><a  class="link" href="login.html"> Sign up/Log In</a>  </div>   
        </div></div>
       <div id="h"> <h1> PREVIOUSLY USED MAILS </h1></div>
        <hr>

        <div id="container">
        <?php   
               
               
               foreach( $mails as $mail){
                $i=no_of_mails( $mail['temp_mail']);  ?>
          <div class="recent" > <div class="mail"><?= $mail['temp_mail']?></div><span class="recieve"><?=$i  ?> MAILS</span>
           <div class='buttons'>
           
                  <a href='view.php?tmail=<?= $mail['temp_mail']?>'>  <button class='action' value='<?=$mail['temp_mail'] ?>'>view</button></a>
               
               
                  <a href='delete.php?tmail=<?= $mail['temp_mail']?>'>  <button class='action' value='<?=$mail['temp_mail'] ?>'>delete</button></a>
               
                
               </div>
        
        
        </div>
           <?php } ?> 

</div>

        <footer>
            <div>
                       <h4>ABOUT</h4>
                       <p>
                           Hi this is a college project done by three people Shaurya,Himanshu add Ankush. This website helps user to generate temperary mails for personal use . This helps to stop website spamming unnecessary mails and protect from shady websites.
                       </p>
                   </div>
                  
                   <div>
                    <h4>Quick links</h4>
                    <ul>
                        <li><a href="">Generate mail</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Profile</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                   </div>
                   </footer>
        <script src="dashboard/java.js"></script>

</body>
</html>