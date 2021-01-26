<?php require_once("superior.php");?>

<?php 

  include ('clientes/cli_db.php');

  $anio;

	if ($_POST == null) {
    $anio = 2020;
	}else{
    $anio = $_POST['anio'];
  }

  $result1 = mysqli_query($conn,"SELECT * from usuarios");
  $result2 = mysqli_query($conn,"SELECT TRUNCATE(SUM(COSTO),2) from VENTAS");
  $result3 = mysqli_query($conn,"SELECT TRUNCATE(MAX(COSTO),2) from VENTAS");
  $result4 = mysqli_query($conn,"SELECT TRUNCATE(MIN(COSTO),2) from VENTAS");
  $result5 = mysqli_query($conn,"SELECT COSTO from VENTAS ORDER BY FECHA desc limit 4");

  $row1 = mysqli_fetch_assoc($result1);
  $row2 = mysqli_fetch_assoc($result2);
  $row3 = mysqli_fetch_assoc($result3);
  $row4 = mysqli_fetch_assoc($result4);

?>

<div id="content">
  <section class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $row1['USUARIO']; ?>!</h1>
          <p class="lead text-muted">Ultima información aquí</p>
        </div>
        <!--<div class="col-lg-3">
          <a class="btn btn-primary w-100" href="https://dolar.wilkinsonpc.com.co/divisas/" role="button">Divisa</a>
        </div>-->
      </div>
    </div>
  </section>
  <section class="bg-mix">
    <div class="container">
      <div class="card rounded-0">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 stat my-3 d-flex"> 
              <div class="mx-auto">
                <h6 class="text-muted">Ingresos totales</h6>
                <h3 class="font-weight-bold">$<?php echo $row2['TRUNCATE(SUM(COSTO),2)'];?></h3>
                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> Desde apertura</h6>
              </div>                   
            </div>
            <div class="col-lg-3 col-md-6 stat my-3 d-flex">
              <div class="mx-auto">
                <h6 class="text-muted">Mayor venta</h6>
                <h3 class="font-weight-bold">$<?php echo $row3['TRUNCATE(MAX(COSTO),2)'];?></h3>
                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> Revisa ventas</h6>
              </div>                   
            </div>
            <div class="col-lg-3 col-md-6 my-3 d-flex">
              <div class="mx-auto">
                <h6 class="text-muted">Menor venta</h6>
                <h3 class="font-weight-bold">$<?php echo $row4['TRUNCATE(MIN(COSTO),2)'];?></h3>
                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> Revisa ventas</h6>
              </div>                   
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-grey">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 my-3">
          <div class="card rounded-0">
            <div class="card-header bg-light text-center">                           
              <form method="POST">               
                <h6 class="font-weight-bold">Fluctuacion de ventas</h6>
                <div class="input-group">
                  <input type="number" name="anio" min="2020" max="2030" class="form-control">
                  <div class="input-group-append">
                    <button class="btn btn-outline-light" type="submit">Ir</button>
                  </div>
                </div>
              </form>              
            </div>
            <div class="card-body">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>        
        <div class="col-lg-4 my-3">
          <div class="card rounded-0">
            <div class="card-header bg-light">
              <h6 class="font-weight-bold mb-0">Ventas recientes</h6>
            </div>
            <div class="card-body pt-2">
              <?php foreach($result5 as $row5){ ?>           
              <div class="d-flex border-bottom py-2">
                <div class="d-flex mr-3">
                  <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                </div>
                <div class="align-self-center">
                  <h6 class="d-inline-block mb-0">$<?php echo $row5['COSTO'];?></h6><span class="badge badge-success ml-2"> venta %</span>
                  <small class="d-block text-muted">Vintage Store CO</small>
                </div>              
              </div>
              <?php } ?>
              <br>
              <a class="btn btn-primary w-100" href="ven_index.php" role="button">Ir a ventas</a>            
            </div>                                                                                                             
          </div>
        </div>
        
      </div>
    </div>
  </section>
</div> 

<?php require_once("inferior.php");?>      