<?php

session_start();
$id=  $_SESSION['model'];

//OPEN CHAT IF USER IS ALREADY A MEMBER
//if(isset($_GET['prevUser'])){
//    
//    $prevUSerNumber = $_GET['prevUser'];
//    if($prevUSerNumber != ''){
//        $_SESSION['oldUser'] = $prevUSerNumber;
//        header('location:appChat.php');
//    }
//}

include './db/db.php';

if(isset($_POST['request'])){
    $clientName = $_POST['fname'];
    $clientMobile = $_POST['mobile'];
    
    if(!empty($clientMobile) && !empty($clientName)){
         
    //INSERT INTO MODEL
        $updateModel = "UPDATE model SET MatchName = '$clientName',MatchNumber ='$clientMobile' WHERE id='$id' ";
        $updateQuery = mysqli_query($conn,$updateModel) or die($conn);
        //INSERTING USER INTO 
        if($updateQuery){
            $insertClient = "INSERT INTO client (fullName,phone,model_id) VALUES ('$clientName','$clientMobile','$id')";
            $insertQuery = mysqli_query($conn,$insertClient) or die($conn);
            
            //CREATING A SESSION TO STORE CLIENTS PHONES NUMBER
            $_SESSION['number'] = $clientMobile;
            $expiration_time = time() + (3 * 24 * 60 * 60);
            
//            setcookie('clientNumber',$clientMobile , $expiration_time);
            
            header('location:appChat.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Qrúca</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <h1>Qrúca</h1>
              </div>
              <p class="login-card-description">Kindly input your details to request a model.</p>
              
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
                  <div class="form-group">
                    <label for="name" class="sr-only">Full Name</label>
                    <input type="text" name="fname" id="name" class="form-control" placeholder="Full Name" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="number" class="sr-only">Number</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required>
                  </div>
                  <input type="submit" class="btn btn-block login-btn mb-4" type="button" value="Request" name="request" >
                </form>
                
                
                <a href="#!" class="forgot-password-link"></a>
                <p class="login-card-footer-text"><a href="#!" class="text-reset"></a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!"></a>
                  <a href="#!"></a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
