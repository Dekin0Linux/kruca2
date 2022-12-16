<?php
include './db/db.php';
session_start();

if(isset($_SESSION['number'])){
    $clientPhone = $_SESSION['number'];
}elseif(isset($_SESSION['oldUser'])){
    $clientPhone = $_SESSION['oldUser'];
}else{
    
}


if($clientPhone){
   //GET CLIENT DATA
$getClient = "SELECT * FROM client WHERE phone = '$clientPhone' ";
$clientQuery = mysqli_query($conn,$getClient) or die($conn);
    while($row = mysqli_fetch_assoc($clientQuery)){
        $clientID = $row['id'];
        $clientName = $row['fullName'];
    }

}else{
    header('location:./overview/appOverview.php');
}

?>
<?php
    $getChatFromClient = "SELECT * FROM chat WHERE txtFrom = 'admin' AND txt_to = '$clientID' OR txtFrom ='$clientID' AND txt_to = 'admin'";
    $chatQuery =  mysqli_query($conn,$getChatFromClient) or die($conn);
    while($row = mysqli_fetch_assoc($chatQuery)):
?>
<?php if($row['txtFrom'] == 'admin'): ?>
   
    <div class="chat-log__item">
     <h3 class="chat-log__author"><?= $row['txtFrom'] ?> <small><?= $row['time'] ?></small></h3>
     <div class="chat-log__message"><?= $row['message'] ?></div>
    </div>

<?php else : ?>
    <div class="chat-log__item chat-log__item--own">
    <h3 class="chat-log__author"><?= 'Me' ?> <small>14:30</small></h3>
    <div class="chat-log__message"><?= $row['message'] ?></div>
    </div>  
<?php endif; ?>

<?php endwhile; ?>