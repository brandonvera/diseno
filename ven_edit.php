<?php require_once("superior.php");?>

<?php
 include ('ventas/ven_db.php');

    $factura = $_GET['factura'];
    $result = mysqli_query($conn,"select * from ventas where factura = '$factura'");
    $row = mysqli_fetch_assoc($result);
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ID = $_POST['id'];
      $COSTO = $_POST['costo'];
      $resultt = mysqli_query(
         $conn,
         "update ventas set 
         ID = '$ID',  
         COSTO = '$COSTO'
         where FACTURA = '$factura'");
      if($resultt){
        header('location: ven_index.php');
      }
   }

?>

<div id="content"> 
  <section class="py-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 my-3">
          <div class="card text-white bg-dark mb-3" style="max-width: 32rem;">
            <div class="card-header text-center"><h1><strong>Editar Venta</strong></h1></div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Id cliente</label>
                    <input type="number" required placeholder="Id" value="<?php echo $row['ID'];?>" name="id" class="form-control">                
                  </div>
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Costo</label>               
                    <input type="number" required placeholder="Costo" value="<?php echo $row['COSTO'];?>" name="costo" class="form-control">
                  </div>
                </div>  
                <input type="submit" value="Agregar" class="btn btn-primary btn-block">
              </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once("inferior.php");?>