<?php 

  include ('cli_db.php'); 

  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 

    if(is_numeric($_POST['dni'])){
      $dni = test_input($_POST['dni']);
    }

    if(!empty($_POST['nombre'])){
      if(preg_match("/^[a-zA-Z-' ]*$/",$_POST['nombre'])){
        $nombre = test_input($_POST['nombre']);
      }   
    }

    if(!empty($_POST['direccion'])){
      if(preg_match("/^[a-z0-9A-Z-' ]*$/",$_POST['direccion'])){
        $direccion = test_input($_POST['direccion']);
      }
    }

    if(!empty($_POST['telefono'])){
      if(preg_match("/^[0-9-+' ]*$/",$_POST['telefono'])){
        $telefono = test_input($_POST['telefono']);
      }    
    }

    if(!empty($_POST["correo"])){
      if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)){
        $correo = test_input($_POST['correo']);
      }
    }
  }

  function test_input($data){         
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 
  $query = mysqli_query($conn,"INSERT INTO clientes(DNI,NOMBRE,DIRRECCION,TELEFONO,CORREO)
  VALUES ('$dni','$nombre','$direccion','$telefono','$correo')");
  
  if($query){
    header('location: ../cli_index.php');
  }else{
    header('location: ../cli_index.php');
  } 

?> 