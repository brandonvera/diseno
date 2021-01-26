<?php

 include ('ven_db.php');

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id = $_POST['id'];
  $costo = $_POST['costo'];
  
  $query = mysqli_query($conn,"INSERT INTO ventas(ID,COSTO)
  VALUES ('$id','$costo')");
  
  if($query){
    header('location: ../ven_index.php');
  }else{
    header('location: ../ven_index.php');
  }
 }
?>