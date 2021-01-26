<?php require_once("superior.php");?> 

<?php
    include ('clientes/cli_db.php');
    $result = mysqli_query($conn,'SELECT * FROM clientes');
?>
    
<div id="content">
  <section class="bg-mix">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 my-3">
          <div class="card text-white bg-dark mb-3" style="max-width: 32rem;">
            <div class="card-header text-center"><h1><strong>Clientes</strong></h1></div>
            <div class="card-body">
              <form action="clientes/cli_add.php" method="POST">       
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="validationCustom01">Dni</label>
                      <input type="text" required placeholder="123..." name="dni" class="form-control">                
                  </div>
                  <div class="form-group col-md-6">
                      <label for="validationCustom01">Nombre</label>               
                      <input type="text" required placeholder="Nombre..." name="nombre" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Direccion</label>
                    <input type="text" required placeholder="Avd.. st.. num.." name="direccion" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="validationCustom01">Telefono</label>
                        <input type="text" required placeholder="123456..." name="telefono" class="form-control">
                    </div>           
                    <div class="form-group col-md-6">
                        <label for="validationCustom01">Correo</label>
                        <input type="text" required placeholder="Example@gmail.com" name="correo" class="form-control">
                    </div>
                </div>           
                <button type="submit" class="btn btn-primary btn-block">Agregar</button>                     
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-grey">
    <div class="container">    
      <div class="row">
        <div class="col-lg-12 my-3">
          <div class="card rounded-0">
            <div class="card-header bg-light">
              <h6 class="font-weight-bold mb-0">Clientes</h6>
            </div>
            <div class="card-body">
              <table class="table table-responsive table-striped table-bordered table-dark">
                <thead class="">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">dni</th>
                    <th scope="col">nombre</th>
                    <th scope="col">direccion</th>
                    <th scope="col">telefono</th>
                    <th scope="col">correo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){ ?>
                    <tr>
                      <td><?php echo $row['ID']; ?></td>
                      <td><?php echo $row['DNI'] ?></td>
                      <td><?php echo $row['NOMBRE'] ?></td>
                      <td><?php echo $row['DIRRECCION'] ?></td>
                      <td><?php echo $row['TELEFONO'] ?></td>
                      <td><?php echo $row['CORREO'] ?></td>
                      <td><a href="cli_edit.php?id=<?php echo $row['ID']?>" class="btn btn-primary">Editar</a></td>
                      <td><a href="clientes/cli_delite.php?id=<?php echo $row['ID']?>" class="btn btn-danger" >Eliminar</a></td>
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
