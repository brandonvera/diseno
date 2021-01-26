<?php require_once("superior.php");?>

<?php
    include ('ventas/ven_db.php');
    $result = mysqli_query($conn,'SELECT * FROM ventas');
?>

<div id="content">
  <section class="bg-mix">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 my-3">
          <div class="card text-white bg-dark mb-3" style="max-width: 32rem;">
            <div class="card-header text-center"><h1><strong>Ventas</strong></h1></div>
            <div class="card-body">
              <form action="ventas/ven_add.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Id cliente</label>
                    <input type="text" required placeholder="01.." name="id" class="form-control">                
                  </div>
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Costo</label>               
                    <input type="text" required placeholder="999,99.." name="costo" class="form-control">
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
  <section class="bg-grey">
    <div class="container">    
      <div class="row justify-content-center">
        <div class="col-lg-7 my-3">
          <div class="card rounded-0">
            <div class="card-header bg-light">
              <h6 class="font-weight-bold mb-0">Ventas</h6>
            </div>
            <div class="card-body">
              <table class="table table-responsive table-striped table-bordered table-dark">
                <thead class="">
                  <tr>
                    <th scope="col">Factura</th>
                    <th scope="col">Id</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){ ?>
                    <tr>
                      <td><?php echo $row['FACTURA']; ?></td>
                      <td><?php echo $row['ID'] ?></td>
                      <td><?php echo $row['FECHA'] ?></td>
                      <td><?php echo $row['COSTO'] ?></td>
                      <td><a href="ven_edit.php?factura=<?php echo $row['FACTURA']?>" class="btn btn-primary">Editar</a></td>
                      <td><a href="ventas/ven_delite.php?factura=<?php echo $row['FACTURA']?>" class="btn btn-danger" >Eliminar</a></td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
</div>

<?php require_once("inferior.php");?>
