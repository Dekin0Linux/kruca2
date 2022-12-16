<?php
include './db/db.php';

//ADMIN SEND CHAT
if(isset($_POST['userid']) && isset($_POST['adminMssg'])){
    $c_id = $_POST['userid'];
    $c_msg = $_POST['adminMssg'];
    $c_msg = str_replace("'","\'", $c_msg);
    
    $txt_From = 'admin';


//    INSERT CHAT
    $chat = "INSERT INTO chat(txtFrom,txt_to,message,time) VALUES('$txt_From','$c_id','$c_msg', now())";
    $chatQuery = mysqli_query($conn,$chat) or die($conn);
    if($chatQuery){
        echo 'Message Sent';
    }
}else{
//    header('location:userDetails.php');
    echo 'Error Sending Message';
}


?>