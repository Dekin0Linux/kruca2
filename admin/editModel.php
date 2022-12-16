<?php
ob_start();
session_start();

include './db/db.php';

//ALLOW LOGGED IN ADMINS
if(!isset($_SESSION['user'])){
    header('location:index.php');
}



if(isset($_GET['editID'])){
    
    //GET USER DATA FROM DATABES
    $edit_id = $_GET['editID'];
    
    $getModel = "SELECT * FROM model WHERE id= '$edit_id'";
    $query = mysqli_query($conn,$getModel) or die($conn);
    while($row = mysqli_fetch_assoc($query)){
        $fname = $row['fullName'];
        $mobile = $row['mobile'];
        $bodyType = $row['bodyType'];
        $gender = $row['gender'];
        $interest = $row['interest'];
        $age = $row['age'];
        $age = $row['age'];
        $amount = $row['amount'];
        $service = $row['service'];
        $description = $row['description'];
        
        $img = $row['image'];
        $img2 = $row['image2'];
    }//ENDIG WHILE LOOPS BRACES
    
          //EDIT MODEL DATA
    if(isset($_POST['update'])){
        
        //GETTING FORM DATA
        echo $edit_id ;
        $fname = $_POST['fname'];
        $mobile = $_POST['mobile'];
        $body_type = $_POST['body_type'];
        $interest = $_POST['interest'];
        $description = $_POST['description'];
        $service = $_POST['service'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $amount = $_POST['amount'];

       // Image Uploading
        $uploadDir = './uploads/'; //upload Dir
        $allowTypes = array('jpg','png','jpeg','gif','pdf'); //extensions
    
        $imageName = $_FILES['image']['name']; //get file name
        $imageName2 = $_FILES['image2']['name']; //get file name2

        $tempLoc = $_FILES['image']['tmp_name']; //temp location
        $tempLoc2 = $_FILES['image2']['tmp_name']; //temp location2
    
        $uploadFile = $uploadDir . $imageName;
        $uploadFile2 = $uploadDir . $imageName2;
        
        //image1
        if(!empty($imageName)){
            move_uploaded_file($tempLoc,$uploadFile);
                $create_user = "UPDATE model SET fullName='$fname',age='$age',gender='$gender',service='$service',mobile='$mobile',bodyType='$body_type',interest='$interest',image='$imageName',amount='$amount',description='$description' WHERE id= '$edit_id'; ";

                $query = mysqli_query($conn,$create_user) or die($conn);
                if($query){
                    $_SESSION['alert']= "<div class='alert alert-success mx-4'><h5>Image Updated</h5></div>";
                    header('location:appDashboard.php');
                }else{
                    $_SESSION['alert']= "<div class='alert alert-danger mx-4'><h5>Image Updated Failed</h5></div>";
                    header('location:tables.php');
                }
        }else{
            $create_user = "UPDATE model SET fullName='$fname',age='$age',gender='$gender',service='$service',mobile='$mobile',bodyType='$body_type',interest='$interest',image='$img',amount='$amount',description='$description' WHERE id = '$edit_id'; ";

            $query = mysqli_query($conn,$create_user) or die($conn);
            if($query){
                $_SESSION['alert']= "<div class='alert alert-success mx-4'><h5>Image Updated</h5></div>";
                header('location:tables.php');
            }else{
                $_SESSION['alert']= "<div class='alert alert-danger mx-4'><h5>Image Updated Failed</h5></div>";
                header('location:tables.php');
            }
        }
        
        //Image 2
        if(!empty($imageName2)){
            move_uploaded_file($tempLoc,$uploadFile2);
                $create_user = "UPDATE model SET fullName='$fname',age='$age',gender='$gender',service='$service',mobile='$mobile',bodyType='$body_type',interest='$interest',image2='$imageName2',amount='$amount',description='$description' WHERE id= '$edit_id'; ";

                $query = mysqli_query($conn,$create_user) or die($conn);
                if($query){
                    $_SESSION['alert']= "<div class='alert alert-success'><h5>Image Updated</h5></div>";
                    header('location:tables.php');
                }else{
                    $_SESSION['alert']= "<div class='alert alert-danger '><h5>Image Updated Failed</h5></div>";
                    header('location:tables.php');
                }
        }else{
            $create_user = "UPDATE model SET fullName='$fname',age='$age',gender='$gender',service='$service',mobile='$mobile',bodyType='$body_type',interest='$interest', image2='$img2',amount='$amount',description='$description' WHERE id= '$edit_id'; ";

            $query = mysqli_query($conn,$create_user) or die($conn);
            if($query){
                $_SESSION['alert']= "<div class='alert alert-success'><h5>Client Updated</h5></div>";
                header('location:tables.php');
            }else{
                $_SESSION['alert']= "<div class='alert alert-Danger mx-4'><h5>Updating Failed...</h5></div>";
                header('location:tables.php');
            }
        }
    }//UPDATE IF STATEMENT 

}
    else{
    header('location:appDashboard.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("background-image: url("https://www.pixelstalk.net/wp-content/uploads/2016/08/Best-1080p-HD-Backgrounds.jpg");");
/*            background-image: url("https://i.imgur.com/GMmCQHC.png");*/
            background-repeat: no-repeat;
            background-size: 100% 100%
        }
        
        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }
        
        .blue-text {
            color: #00BCD4
        }
        
        .form-control-label {
            margin-bottom: 0
        }
        
        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }
        
        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }
        
        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }
        
        .btn-block:hover {
            color: #fff !important
        }
        
        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
        
        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            background-color: black;
            border-block-color: inherit;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Qrúca</h3>
<!--                <?php if(isset($_SESSION['alertMsg'])){ echo $_SESSION['alertMsg']; unset($_SESSION['alertMsg']);}?>-->
                
                <div class="card">
                    <h5 class="text-center mb-4">Edit Models</h5>
                    <form class="form-card" method="post" action="" enctype="multipart/form-data">
                       <input type="hidden" name="id" value="<?= $edit_id; ?>">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Full Name<span class="text-danger"> *</span></label>
                                <input type="text" id="fname" name="fname" placeholder="Enter Full Name" required value="<?php if(isset($fname)){echo $fname; } ?>"> 
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Mobile Number<span class="text-danger"> *</span></label>
                                <input type="text" id="lname" name="mobile" placeholder="Enter Mobile Number" required value="<?php if(isset($mobile)){echo $mobile; } ?>"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Body Type<span class="text-danger"> *</span></label>
                                <input type="text" id="body" name="body_type" placeholder="Ex. Slim, Thick, Plus size" required value="<?php if(isset($bodyType)){echo $bodyType; } ?>">
                            </div>
                               <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label>
                                <input type="text" id="body" name="gender" placeholder="Ex. Slim, Thick, Plus size" required value="<?php if(isset($gender)){echo $gender; } ?>">
                            </div>
                                
                            
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Interest<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="interest" placeholder="Ex. Travelling, Adventure, etc." value="<?php if(isset($interest)){echo $interest; } ?>">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Age<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="age" placeholder="18" required value="<?php if(isset($age)){echo $age; } ?>">
                            </div>
                        </div>
                        
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                               <img src="./uploads/<?php if(isset($img)){echo $img; } ?>" alt="image" width="100px">
                                <label class="form-control-label px-3">Upload Picture<span class="text-danger"> *</span></label>
                                <input type="file" id="picture" name="image" placeholder="add pictures"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                               <img src="./uploads/<?php if(isset($img2)){echo $img2; } ?>" alt="image" width="100px">
                                <label class="form-control-label px-3">Upload Picture<span class="text-danger"> *</span></label>
                                <input type="file" id="picture" name="image2" placeholder="add pictures"> 
                            </div>
                            
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Amount<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="amount" placeholder="2000" required value="<?php if(isset($amount)){echo $amount; } ?>">
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Service<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="service" placeholder="regular" required value="<?php if(isset($service)){echo $service; } ?>">
                            </div>
                           
                        </div>
                        
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Description<span class="text-danger"> *</span></label>
                                <input type="text" id="ans" name="description" placeholder="" required value="<?php if(isset($description)){echo $description; } ?>"> 
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <input type="submit" value="UPDATE PROFILE" class="btn-block btn-primary" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>