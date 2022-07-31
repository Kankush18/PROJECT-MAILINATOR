<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<?php

if(isset($_POST['refresh']) or $_SESSION['tmail']== null){
    $call=file_get_contents("https://www.1secmail.com/api/v1/?action=genRandomMailbox&count=1");
    $data = json_decode($call, true);
    $_SESSION['tmail'] = $data[0];
    $user_name=$user_data['user_name'];
    $query = "insert into temp_mails (user_name,temp_mail) values ('$user_name','$data[0]')";

	mysqli_query($con, $query);
    header('Location: front.php');
    
}

?>
<?php
if(isset($_POST['getmail'])){
    $tmail=$_SESSION['tmail'];
    $i=0;
    $domain=$login='';
    for($i=0;$i<strlen($tmail);$i++){
        if($tmail[$i]=='@'){
            break;
        }
        $login.=$tmail[$i];
    }
    for($j=$i+1;$j<strlen($tmail);$j++){
        
        $domain.=$tmail[$j];
    }
    
    

    $apicall=file_get_contents("https://www.1secmail.com/api/v1/?action=getMessages&login=$login&domain=$domain");
    $message_data=json_decode($apicall,true);
    
    $user_name=$user_data['user_name'];
    foreach($message_data as $msg ){
    $mid=$msg['id'];
    
    $api_msg=file_get_contents("https://www.1secmail.com/api/v1/?action=readMessage&login=$login&domain=$domain&id=$mid");
    $inner_msg=json_decode($api_msg,true);
        
        $body=$inner_msg['textBody'];
        $sender=$msg['from'];
        $subject=$msg['subject'];
        $date=$msg['date'];
        $sql = "INSERT INTO messages (user_name,temp_mail,message_id,sender,subject,date,attachment,body) VALUES ('$user_name','$tmail','$mid','$sender','$subject','$date','null','$body')";
    
        mysqli_query($con, $sql);
        header("Location: front.php");
    }

    
  
}


?>