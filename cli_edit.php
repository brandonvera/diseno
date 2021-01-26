<?php require_once("superior.php");?>

<?php

 include ('clientes/cli_db.php');

  $id = $_GET['id'];
  $result = mysqli_query($conn,"select * from clientes where ID = '$id'");
  $row = mysqli_fetch_assoc($result);
   
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
    if(is_numeric($_POST['dni'])){
      $DNI = test_input($_POST['dni']);
    }

    if(!empty($_POST['nombre'])){
      if(preg_match("/^[a-zA-Z-' ]*$/",$_POST['nombre'])){
        $NOMBRE = test_input($_POST['nombre']);
      }   
    }

    if(!empty($_POST['direccion'])){
      if(preg_match("/^[a-z0-9A-Z-' ]*$/",$_POST['direccion'])){
        $DIRECCION = test_input($_POST['direccion']);
      }
    }

    if(!empty($_POST['telefono'])){
      if(preg_match("/^[0-9-+' ]*$/",$_POST['telefono'])){
        $TELEFONO = test_input($_POST['telefono']);
      }    
    }

    if(!empty($_POST["correo"])){
      if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)){
        $CORREO = test_input($_POST['correo']);
      }
    }

    $resultt = mysqli_query(
      $conn,
      "update clientes set 
      DNI = '$DNI', 
      NOMBRE = '$NOMBRE', 
      DIRRECCION = '$DIRECCION',
      TELEFONO = '$TELEFONO',
      CORREO = '$CORREO' where ID = '$id'");

    if($resultt){
      header('location: cli_index.php');
    }else{
      header('location: cli_index.php');
    }
  }

    function test_input($data){         
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<div id="content"> 
  <section class="py-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 my-3">
          <div class="card text-white bg-dark mb-3" style="max-width: 32rem;">
            <div class="card-header text-center"><h1><strong>Editar Cliente</strong></h1></div>
            <div class="card-body">
              <form method="POST">       
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Dni</label>
                    <input type="number" required placeholder="Dni" value="<?php echo $row['DNI'];?>" name="dni" class="form-control">                
                  </div>
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Nombre</label>               
                    <input type="text" required placeholder="Nombre" value="<?php echo $row['NOMBRE'];?>" name="nombre" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="validationCustom01">Direccion</label>
                  <input type="text" required placeholder="Direccion" value="<?php echo $row['DIRRECCION'];?>" name="direccion" class="form-control">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Telefono</label>
                    <input type="text" required placeholder="Telefono" value="<?php echo $row['TELEFONO'];?>" name="telefono" class="form-control">
                  </div>           
                  <div class="form-group col-md-6">
                    <label for="validationCustom01">Correo</label>
                    <input type="text" required placeholder="Correo" value="<?php echo $row['CORREO'];?>" name="correo" class="form-control">
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
</div>

<?php require_once("inferior.php");?>