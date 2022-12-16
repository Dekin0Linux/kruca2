<?php
session_start();
if(isset($_GET['logout'])){
    // Destroy the user's session
    session_destroy();

    // Redirect the user to the login page
    header('Location: index.php');
    exit;
    }


?>