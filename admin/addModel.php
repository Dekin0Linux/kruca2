<?php

session_start();

//ALLOW LOGGED IN ADMINS
if(!isset($_SESSION['user'])){
    header('location:index.php');
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
/*            background-image: url("https://i.imgur.com/GMmCQHC.png");*/
            background-image: url("https://www.pixelstalk.net/wp-content/uploads/2016/08/Best-1080p-HD-Backgrounds.jpg");
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
                <?php if(isset($_SESSION['alertMsg'])){ echo $_SESSION['alertMsg']; unset($_SESSION['alertMsg']);}?>
                
                <div class="card">
                    <h5 class="text-center mb-4">Add New Models</h5>
                    <form class="form-card" method="post" action="process.php" enctype="multipart/form-data">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Full Name<span class="text-danger"> *</span></label>
                                <input type="text" id="fname" name="fname" placeholder="Enter Full Name" required> 
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Mobile Number<span class="text-danger"> *</span></label>
                                <input type="text" id="lname" name="mobile" placeholder="Enter Mobile Number" required> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Body Type<span class="text-danger"> *</span></label>
                                <input type="text" id="body" name="body_type" placeholder="Ex. Slim, Thick, Plus size" required>
                            </div>
                               <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label>
                                <input type="text" id="body" name="gender" placeholder="Ex. Slim, Thick, Plus size" required>
                            </div>
                                
                            
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Interest<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="interest" placeholder="Ex. Travelling, Adventure, etc." >
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Age<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="age" placeholder="18" required>
                            </div>
                        </div>
                        
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Upload Picture<span class="text-danger"> *</span></label>
                                <input type="file" id="picture" name="image[]" placeholder="add pictures" required multiple> 
                            </div>
<!--
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Upload Picture<span class="text-danger"> *</span></label>
                                <input type="file" id="picture" name="image2" placeholder="add pictures" required> 
                            </div>
-->
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Amount<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="amount" placeholder="2000" required>
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Service<span class="text-danger"> *</span></label>
                                <input type="text" id="job" name="service" placeholder="regular" required>
                            </div>
                           
                        </div>
                        
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Description<span class="text-danger"> *</span></label>
                                <input type="text" id="ans" name="description" placeholder="" required> 
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <input type="submit" value="CREATE PROFILE" class="btn-block btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validate(val) {
            v1 = document.getElementById("fname");
            v2 = document.getElementById("lname");
            v3 = document.getElementById("email");
            v4 = document.getElementById("mob");
            v5 = document.getElementById("job");
            v6 = document.getElementById("ans");
            flag1 = true;
            flag2 = true;
            flag3 = true;
            flag4 = true;
            flag5 = true;
            flag6 = true;
            if (val >= 1 || val == 0) {
                if (v1.value == "") {
                    v1.style.borderColor = "red";
                    flag1 = false;
                }
                else {
                    v1.style.borderColor = "green";
                    flag1 = true;
                }
            }
            if (val >= 2 || val == 0) {
                if (v2.value == "") {
                    v2.style.borderColor = "red";
                    flag2 = false;
                }
                else {
                    v2.style.borderColor = "green";
                    flag2 = true;
                }
            }
            if (val >= 3 || val == 0) {
                if (v3.value == "") {
                    v3.style.borderColor = "red";
                    flag3 = false;
                }
                else {
                    v3.style.borderColor = "green";
                    flag3 = true;
                }
            }
            if (val >= 4 || val == 0) {
                if (v4.value == "") {
                    v4.style.borderColor = "red";
                    flag4 = false;
                }
                else {
                    v4.style.borderColor = "green";
                    flag4 = true;
                }
            }
            if (val >= 5 || val == 0) {
                if (v5.value == "") {
                    v5.style.borderColor = "red";
                    flag5 = false;
                }
                else {
                    v5.style.borderColor = "green";
                    flag5 = true;
                }
            }
            if (val >= 6 || val == 0) {
                if (v6.value == "") {
                    v6.style.borderColor = "red";
                    flag6 = false;
                }
                else {
                    v6.style.borderColor = "green";
                    flag6 = true;
                }
            }
            flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;
            return flag;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>