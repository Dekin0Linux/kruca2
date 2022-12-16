<?php

session_start();

include './db/db.php';


//INSERTING A NEW MODEL
if(isset($_POST['submit'])){
    
    //GETTING FORM DATA
    $fname = $_POST['fname'];
    $mobile = $_POST['mobile'];
    $body_type = $_POST['body_type'];
    $interest = $_POST['interest'];
    $description = $_POST['description'];
    $service = $_POST['service'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $amount = $_POST['amount'];
    
    //Image Uploading
    $uploadDir = './uploads/'; //upload Dir
    $allowTypes = array('jpg','png','jpeg','gif','pdf','JPG','JPEG'); //extensions
    
    //GET MULTIPLE IMAGES FROM FORM
    $imagesCount =  $_FILES['image']['name'];
    
    //DESTRUCTING IMAGE NAME IN VARIABLES
    list($imageName,$imageName2) = $imagesCount;
    
    echo $imageName . '<br>';
    echo $imageName2 ;
    
    //LOOPING THROUGH IMAGES
    foreach($imagesCount as $key => $value){
        $tempLoc = $_FILES['image']['tmp_name'][$key]; //TEMP LOCATIONS
        
        $uploadFile = $uploadDir . $value; //UPLOAD DIR
        
        $fileType = pathinfo($imageName, PATHINFO_EXTENSION); //FILE TYPE
    };
     //CHECKING FILE TYPE
        if(in_array($fileType,$allowTypes)){
            //CHECK IF FILE IS NOT EMPTY
            if(!empty($tempLoc)){
                move_uploaded_file($tempLoc,$uploadFile);
                
//                UPLOAD IMAGE NAME TO DB
                $insertSQL = "INSERT INTO model (fullName,mobile,interest,description,service,age,gender,image,image2,bodyType,amount) VALUES('$fname','$mobile','$interest','$description','$service','$age','$gender','$imageName','$imageName2','$body_type','$amount')";

                $query = mysqli_query($conn,$insertSQL) or die(mysqli_error);
                if($query){
                    echo $_SESSION['alertMsg'] = "<div class='alert alert-success mx-4'><h5>User Inserted</h5></div>";
                    header('location:addModel.php');
                }
            }else{
                echo $_SESSION['alertMsg']= "<div class='alert alert-danger mx-4'><h5>Error Uploading file</h5></div>";
                header('location:addModel.php');
            }
            
        }
    
}else{
     header('location:addModel.php');
}


?>