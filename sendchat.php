<?php

include './db/db.php';

//client Send chat

if(isset($_POST['id']) && isset($_POST['message'])){
    $c_id = $_POST['id'];
    $c_msg = $_POST['message'];
    $c_msg = str_replace("'","\'", $c_msg);
    
    $txTo = 'admin';
    
    //INSERT CHAT
    $chat = "INSERT INTO chat(txtFrom,txt_to,message,time) VALUES('$c_id','$txTo','$c_msg', now())";
    $chatQuery = mysqli_query($conn,$chat) or die($conn);
}else{
    header('location:userDetails.php');
}





?>