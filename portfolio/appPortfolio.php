<?php
include '../db/db.php';

$getModel = "SELECT * FROM model";
$query = mysqli_query($conn,$getModel) or die($conn);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Qrúca</title>
        <link rel="stylesheet" href="./scss/styles.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> </head>

    <body>
        <div class="scrollToTop">
            <div class="brand">
                <div class="logo">
                    <h3>Q</h3></div>
            </div>
        </div>
        <div class="search__bar">
            <div class="brand__container">
                <div class="brand">
                    <div class="logo">
                        <h3>Q</h3></div>
                    <div class="text">Qrúca</div>
                </div> <i class="fas fa-bars responsive__toggle"></i> </div>
            <div class="wishlist__cart"></div>
        </div>
        <div class="navbar"> </div>
        <div class="responsive__navbar">
            <div class="responsive__nav__brand">
                <div class="brand">
                    <div class="logo">
                        <h3>Q</h3></div>
                    <div class="text">Qrúca</div>
                </div>
            </div>
            <div class="responsive__nav__links">
                <ul>
                    <li><a id="nav__link" href="#">Home</a></li>
                    <li><a id="nav__link" href="#">About</a></li>
                    <li><a id="nav__link" href="#">Privacy</a></li>
                    <li><a id="nav__link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
        <section class="deals">
            <div class="title">
                <h2>Model Portfolio</h2> 
            </div>
            <div class="deal__container">
               
               <?php while($row = mysqli_fetch_assoc($query)): ?>
                   <div class="deal">
                    <div class="deal__image"> 
                        <img src="../admin/uploads/<?= $row['image']?>" alt="" /> 
                    </div>
                    
                    <a href="../overview/appOverview.php?userId=<?=$row['id']?>">
                        <div class="deal__info">
                            <div class="deal__details">
                                <div class="deal__name">
                                    <h3><?= $row['fullName']?></h3></div>
                                <div class="deal__price">
                                    <h3 class="deal__Off__price">$ <?= $row['amount']?></h3> 
                                </div>
                                <div class="deal__detail">
                                    <h5></h5>
                                    <h5>ETA : 40min</h5> </div>
                            </div>
                        </div>
                    </a>
                </div>
               <?php endwhile; ?>
                

      </div>
</section>
        <footer>
            <div class="footer__content">
                <div class="footer__brand">
                    <div class="brand">
                        <div class="logo">
                            <h3>Q</h3></div>
                        <div class="text">Qrúca</div>
                    </div>
                    <p class="mt-2"></p>
                </div>
            </div>
            <div class="footer__copyright">
                <h5>&copy; 2022. All Rights reserved.</h5> </div>
        </footer>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="./scripts/script.js"></script>
        <script src="./scripts/animation.js"></script>
    </body>

    </html>