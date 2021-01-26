<?php 
 
  include ('clientes/cli_db.php');
  $result1 = mysqli_query($conn,"SELECT * from usuarios");
  $row1 = mysqli_fetch_assoc($result1);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css//bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css//estilo_dash.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Dashboard</title>
  </head>
  <body>
    <div class="wrapper">
      <nav id="sidebar">
        <div class="sidebar-header">
          <h4 class="text-light font-weight-bold d-block p-3"> VintageStore <i class="icon ion-md-planet"></i></h4>
        </div>
        <ul class="list-unstyled components">
          <p>Barra de Navegacion</p>
          <li class="active">
            <a href="paginaprincipal.php" class="d-block p-3 text-light"><i class="icon ion-md-paper-plane mr-2 lead"></i> Inicio</a>
          </li>
          <li>
            <a href="cli_index.php" class="d-block p-3 text-light"><i class="icon ion-md-checkmark mr-2 lead"></i> Clientes</a>
          </li>
          <li>
            <a href="ven_index.php" class="d-block p-3 text-light"><i class="icon ion-md-star mr-2 lead"></i> Ventas</a>
          </li>
        </ul>
      </nav>
        <div class="w-100">
          <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-outline-light">
                <i class="icon ion-md-planet"></i>
                <span>Ocultar</span>
              </button>            
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>         
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon ion-md-planet img-fluid rounded-circle avatar mr-2"></i>
                      <?php echo $row1['USUARIO']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="login/salir.php">Cerrar sesion</a>  
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>