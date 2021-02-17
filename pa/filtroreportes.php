<?php
  $page_title = 'Lista de pedidos';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   page_require_level(3);
$total=0;
$Costo=0;
$ganancia=0;
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Reportes</h6>
            </div>
            <div class="card-body">
		

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
       
        </div>
        <div class="panel-body">
          <div class="col-md-3">
             <div class="text-center"> <span><strong>Reportes de Ventas</strong></span></div>
              
              <bh></bh>
              <br>
                <div class="form-group">
                    
              <form method="post" action="procesar.php">
              
              <label>Fecha Inicio</label><input class="form-control" value="<?php echo date("Y-m-d");?>" required type="date" name="fecha1">
              <label>Fecha Fin</label><input class="form-control" value="<?php echo date("Y-m-d");?>" required type="date" name="fecha2">
                  <br>
                  <button type="submit" class="btn btn-success">Enviar</button>
              
              </form>
              </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>

	</div>
</div>