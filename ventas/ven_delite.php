<?php
 include ('ven_db.php');

$factura = $_GET['factura'];
$result = mysqli_query($conn,"DELETE FROM ventas where factura = '$factura'");
if($result){
    header('location: ../ven_index.php');
}

?>