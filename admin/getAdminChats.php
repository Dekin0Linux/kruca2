
<?php 

session_start();

include './db/db.php';

$clientid='';

if(isset($_SESSION['currentClientID'])){
    
    $clientid = $_SESSION['currentClientID'];
}

     //clients ID
    if(isset($_GET['clientID'])){
        $clientid = $_GET['clientID']; //GETTING CLIENTS ID
//        echo $clientid;
    }else{

    }
    $getUserChats = "SELECT * FROM chat where txtFrom ='$clientid' AND txt_to = 'admin' OR txtFrom ='admin' AND txt_to = '$clientid' ";
    $query = mysqli_query($conn,$getUserChats) or die($conn);
    $chatRow = mysqli_num_rows($query);
    if($chatRow <= 0){
        echo '<h3 class="fw-bold text-info text-center mt-5">No Chat Available</h3>';
    };
    while($row = mysqli_fetch_assoc($query)):
?>



<?php if($row['txtFrom'] == $clientid ): ?>
    <li class="sender">
        <p> <?= $row['message']?> </p>
        <span class="time"><?= $row['time']?></span>
    </li>
    <?php else : ?>
      <li class="repaly">
<!--       <a href="" class="mx-2" ><i class="fa-solid fa-trash" style="color:red"></i></a>-->
        <p onclick="delMsg()"><?= $row['message']?> </p>
        <span class="time"><?= $row['time']?></span>
      </li>
      
    <?php endif;?>

<?php endwhile; ?>
<script>
function delMsg(){
    alert('Hello');
}
</script>
