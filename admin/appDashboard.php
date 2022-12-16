<?php
ob_start();
session_start();
include './db/db.php';

//ALL MODELS
$getALlModels = "SELECT * FROM model";
$query = mysqli_query($conn,$getALlModels) or die($conn);
$allModel = mysqli_num_rows($query);

//BOOOKED MODELS
$getBookedModels = "SELECT * FROM model WHERE MatchName != '' ";
$bookedQuery = mysqli_query($conn,$getBookedModels) or die($conn);
$bookedModel = mysqli_num_rows($bookedQuery);

//BOOOKED MODELS
$getUnBookedModels = "SELECT * FROM model WHERE MatchName = '' ";
$UnbookedQuery = mysqli_query($conn,$getUnBookedModels) or die($conn);
$UnbookedModel = mysqli_num_rows($UnbookedQuery);


//BOOKEDAMOUNT ---- WHERE MatchName != ''
$amount_booked = "SELECT SUM(amount) AS TotalAmount FROM model WHERE MatchName != '' ";
$amount_query = mysqli_query($conn, $amount_booked) or die($conn);
while($row = mysqli_fetch_array($amount_query)){
    $booked =  $row['TotalAmount'];
}

//ALLOW LOGGED IN ADMINS
if(!isset($_SESSION['user'])){
    header('location:index.php');
}

?>




<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Qrúca</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer"><span>Close </span>
                  <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                    <use xlink:href="#close-1"> </use>
                  </svg>
            </div>
            <div class="row w-100">
              <div class="col-lg-8 mx-auto">
                <form class="px-4" id="searchForm" action="#">
                  <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for...">
                    <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between py-1">
          <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="#
             ">
              <div class="brand-text brand-big"><strong class="text-primary">Qrúca</strong> <strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">Q</strong><strong>A</strong></div></a>
            <button class="sidebar-toggle">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                    <use xlink:href="#arrow-left-1"> </use>
                  </svg>
            </button>
          </div>
          <p><?=$_SESSION['user']?></p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>
            <li class="list-inline-item logout px-lg-2">                 
              <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="logout.php?logout=logout"> <span class="d-none d-sm-inline-block">Logout</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"></use>
                    </svg>
                </a>
                
              </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">

        <ul class="list-unstyled">
              <li class="sidebar-item active"><a class="sidebar-link" href="./appDashboard.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>

             <li class="sidebar-item"><a class="sidebar-link" href="tables.php"> 
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#user-1"> </use>
                        </svg><span>View Models </span></a></li>

              <li class="sidebar-item"><a class="sidebar-link" href="addModel.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#user-1"> </use>
                      </svg><span>Add New Models </span></a></li>

              <li class="sidebar-item"><a class="sidebar-link" href="adminChat.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Chat Section </span></a></li>
        </ul>
    
      </nav>
      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
                <?php if(isset($_SESSION['alertMsg'])){ echo $_SESSION['alertMsg']; unset($_SESSION['alertMsg']);}?>
              </div>
            </div>
        <section>
          <div class="container-fluid">
           
            <div class="row gy-4">
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                   
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#user-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Models</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-1"><?= $allModel; ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: <?= $allModel; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Booked</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-2"><?= $bookedModel ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: <?= $bookedModel ?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#survey-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Un-Booked</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-3"><?= $UnbookedModel ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: <?= $UnbookedModel ?>%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#paper-stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Amount</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-4">$ <?= $booked ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width:<?= $booked ?>%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
              </div>
              <div class="col-lg-8">
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
              
              </div>
              <div class="col-lg-4">
              
              </div>
              <div class="col-lg-4">
                  
              </div>
              <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row gy-3 align-items-center">
                          <div class="col-lg-4">
                            <div class="d-flex align-items-center"><strong class="text-sm d-none d-lg-block">4th</strong><img class="avatar ms-3" src="img/avatar-1.jpg" alt="Tomas Hecktor">
                              <div class="ms-3">
                                <h3 class="h5 mb-0">Tomas Hecktor</h3>
                                <p class="text-sm fw-light mb-0">@tomhecktor</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 text-center">
                            <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm">410 Contributions</div>
                          </div>
                          <div class="col-lg-4">
                            <ul class="list-inline text-center mb-0 d-flex justify-content-between mb-0 text-sm">                 
                              <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>110</li>
                              <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>200</li>
                              <li class="list-inline-item"><i class="fab fa-gg me-2"></i>100</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>

            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row d-flex align-items-stretch gy-4">
              <div class="col-lg-4"></div>
             
            </div>
          </div>
        </section>

        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="mb-0 text-dash-gray">2022 &copy; All Right Reserved.</p>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>