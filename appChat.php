<?php
include './db/db.php';
session_start();

if(isset($_SESSION['number'])){
    $clientPhone = $_SESSION['number'];
}elseif(isset($_SESSION['oldUser'])){
    $clientPhone = $_SESSION['oldUser'];
}else{
    
}


if($clientPhone || $oldUserNumber){
   //GET CLIENT DATA
$getClient = "SELECT * FROM client WHERE phone = '$clientPhone'";
$clientQuery = mysqli_query($conn,$getClient) or die($conn);
    
    while($row = mysqli_fetch_assoc($clientQuery)){
        $clientID = $row['id'];
        $clientName = $row['fullName'];

    }


}else{
    header('location:./userDetails.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    body {
	background: #E5DDD5 url("https://uploads-ssl.webflow.com/587121889ec910305c557a46/623c44a04b83ec5623d0e1ae_background.png") fixed;
}
.page-header {
	background: #006A4E;
	margin: 0;
  padding: 20px 0 10px;
	color: #FFFFFF;
	position: fixed;
	width: 100%;
  z-index: 1
}
.main {
	height: 100vh;
	padding-top: 70px;
}

.chat-log {
	padding: 40px 0 114px;
	height: auto;
	overflow: auto;
}
.chat-log__item {
	background: #fafafa;
	padding: 10px;
	margin: 0 auto 20px;
	max-width: 80%;
	float: left;
	border-radius: 20px;
  height: 80px;
	box-shadow: 0 1px 8px rgba(0,0,0,.1);
	clear: both;
}

.chat-log__item.chat-log__item--own {
	float: right;
	background: #DCF8C6;
	text-align: right;
  border-radius: 20px;
  height: 80px;
  box-shadow: 0 1px 8px rgba(0,0,0,.1);
	
}

.chat-form {
	background: #DDDDDD;
	padding: 40px 0;
	position: fixed;
	bottom: 0;
	width: 100%;
}

.chat-log__author {
	margin: 0 auto .5em;
	font-size: 14px;
	font-weight: bold;
}
  </style>
</head>
<body>
  

<header class="page-header">
  <div class="container ">
    <h2>Qrúca</h2>
  </div>
</header>
<div class="main">
  <div class="container ">
    <div class="chat-log" id="chats">
    
<!--     CHAT MESSAGES HERE -->
     
    </div>
  </div>
  <div class="chat-form">
    <div class="container ">

      <form class="form-horizontal" id='send'>
        <div class="row">
          <div class="col-sm-10 col-xs-8">
           <input type="hidden" name="" id="id" value="<?= $clientID ?>">
           
            <input type="text" class="form-control" id="message" placeholder="Message" name='message' required/>
          </div>
          <div class="col-sm-2 col-xs-4">
            <button class="btn btn-success btn-block">Send</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>



<!--POST CHATS USING AJAX-->
<script>
    $(document).ready(function(){
        $('#send').submit(function(e){
            e.preventDefault()
            
            let cid = $('#id').val();
            let msg = $('#message').val();
            
            $.ajax({
                type: 'POST',
                url : 'sendchat.php',
                data:{id : cid, message : msg},
                cache: true,
                success:function(data){
                    $('#message').val('');
                }
            })
        })
    })
</script>

<!--GET CHATS FROM PHP FILE-->
<script>
    $(document).ready(function(e){
        
        setInterval(function(){
            $.ajax({
                type:'GET',
                url: 'getChat.php',
                dataType : 'html',
                cache: true,
                success: function(data){
                    $('#chats').html(data);
                }
            })
        },100)
        
    })
    
//    var current_url = window.location.href;
//    window.history.replaceState({}, "", "./portfolio/appPortfolio.php");
</script>



</body>
</html>