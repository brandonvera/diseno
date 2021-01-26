</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!--Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>
    
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
            labels: [
              <?php 
                  
                  $sql = "SELECT month(fecha), sum(costo) FROM ventas where year(fecha) = $anio GROUP BY month(fecha)";
                  $result = mysqli_query($conn,$sql);
                  while($registro = mysqli_fetch_array($result)){

              ?>       

              '<?php echo $registro["month(fecha)"] ?>',       

              <?php        

                  }

              ?>
            ],
            datasets: [{
              label: '<?php echo $anio; ?>',
              backgroundColor: '#111b54',
              maxBarThickness: 30,
              borderColor: '#111b54',
              data: 
                <?php 
            
                  $sql = "SELECT month(fecha), sum(costo) FROM ventas where year(fecha) = $anio GROUP BY month(fecha)";
                  $result = mysqli_query($conn,$sql);

                ?>[
                  <?php 
                
                    while($registro = mysqli_fetch_array($result)){
            
                  ?>
                  <?php 
            
                    echo $registro["sum(costo)"] 

                  ?>,
                  <?php 
            
                    }

                  ?>
                ]
              }]
            },

          // Configuration options go here
          options: {}
      });

    </script>  

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

  </body>
</html>