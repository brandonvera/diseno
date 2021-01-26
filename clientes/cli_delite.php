<?php
 include ('cli_db.php');

$id = $_GET['id'];
$result = mysqli_query($conn,"DELETE FROM clientes where ID = '$id'");
if($result){
    header('location: ../cli_index.php');
}

?>