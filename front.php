<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<?php
if($_SESSION['tmail']==null){
    header('location:api.php');
    }
    
$tmail=$_SESSION['tmail'];
$username=$user_data['user_name'];

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=login_sample_db', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="SELECT * FROM messages WHERE `user_name`= $username AND `temp_mail`=$tmail";

$statement=$pdo->prepare("SELECT * FROM messages WHERE `user_name`='$username' AND `temp_mail`='$tmail'");
$statement->execute();
$msg=$statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front.css">
    <title>Dashboard</title>
   
</head>
<body>
    <div class="bar">
        <div class="nav">
        
             <div>   <a class="home"  href=""> Mailinator</a></div>
             <div><a href="front.html">Generate mail </a></div>
             <div><a href="base.php">Dashboard </a></div>
             <div><a href="">Contact</a></div>

             <div><a  class="link" href="login.html"><?= $user_data['user_name'] ?></a>  </div>
           
             
                       
        </div></div>
    <div id="body">
        <div id="tmail">
        <div id="heading">
            <h2>Your temperary mail </h2>
        </div>
        <div id="mailid">
           <input type="text" name="" id="emailName" value = <?= $_SESSION['tmail']?> >
           <button>go</button>
        
        <div id="btn">
          <div class="button" id="copy"> <form   action="api.php" method='post' ><button><img src="icons/text-paragraph.svg" alt=""></button></form></div>
          <div class="button" id="edit"><form   action="api.php" method='post' ><button> <img src="icons/pencil.svg" alt=""></button></form></div>
          <div class="button" id="refresh"><form    action="api.php" method='post' ><button name='refresh'> <img src="icons/arrow-clockwise.svg" alt=""></button></form></div>
        </div></div>
        <div id="send">
            <form action="api.php" method='post'> <button name="getmail">Refresh inbox</button> </form>
            <form action="api.php" method='post'> <button name="getmailhidden" style="display:none;">Refresh inbox</button> </form>
        </div>
   
        </div>
    <div id="inbox">
        <div class="inboxdataList">
        <table>
        <tr class=headings>
                <div >
                    <td width="40%" >SENDER</td>
                    <td width="40%">SUBJECT</td>
                    
                    <td width="10%" > VIEW</td>

                
            </div></tr>
            <?php
               $i=0;
               foreach( $msg as $message){ ?>
           <tr class="mails">
         
                <div class="mail-content">
                        <td class="incoming_mail" title="hsingal200@gmail.com"><?= $message['sender']?></td>
                        <td class="subject"><?= $message['subject']?></td>
                       
                        <td class='btn'> <button class='view' ><img  src="icons/arrow-right-square.svg" alt=""></button> </td>                    
                </div>
               </tr>
               <div class="data-content" >
        <button class='b'>back</button>
        <button class='d'>delete</button>
        <div class="data-header">
           
            <div class="user-data-name">
                <p class="from-email"><?=$message['sender']?></p>
            </div>
            <div class="user-data-time">
                <div class="date-time-text">Date:</div>
                <div class="user-data-time-data" data-date=""><?=$message['date']?></div>
            </div>
    
        </div>
        <div class="user-data-subject">
            <small>Subject:</small> <h4 style="display:inline-block;"><?=$message['subject']?></h4>
        </div>
        <div class="inbox-data-content-intro">
                <p> <?=$message['body']?></p>
        
    </div>
    </div>
               
            <?php } ?> 
                   
               </table>
 
             
        </div>
    </div>
    <div class="explain">
        
        <div class="block">
            <h2>What is Disposable Temporary E-mail?</h2>
            <p>Disposable email - is a free email service that allows to receive email at a temporary address that self-destructed after a certain time elapses. It is also known by names like : tempmail, 10minutemail, 10minmail, throwaway email, fake-mail , fake email generator, burner mail or trash-mail. Many forums, Wi-Fi owners, websites and blogs ask visitors to register before they can view content, post comments or download something. Temp-Mail - is most advanced throwaway email service that helps you avoid spam and stay safe.</p>
        </div>
    </div>
  <footer>
       <div>
           <h4>ABOUT</h4>
           <p>
               Hi this is a college project done by Ankush. This website helps user to generate temperary mails for personal use . This helps to stop website spamming unnecessary mails and protect from shady websites.
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
       <div class='hidden'></div>
       <script src="front.js"></script>
    
</body>
</html>