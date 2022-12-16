<?php


$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Kruca';


////server
//$server = 'epiz_33176119_kruca';
//$user = 'epiz_33176119';
//$password = 'liux@1995';
//$dbname = 'epiz_33176119_kruca';


$conn = mysqli_connect($server,$user,$password,$dbname) or die($conn);

if(!$conn){
    echo 'Not connected to DB';
}

    

?> 