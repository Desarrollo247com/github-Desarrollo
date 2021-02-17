<?php
  $page_title = 'Lista de pedidos';
  require_once('includes/load.php');
  $date_start=$_GET['d1'];
  $date_end=$_GET['d2'];

  // Checkin What level user has permission to view this page
   page_require_level(3);
$total=0;
$Costo=0;
$ganancia=0;
$t=0;

$sales = report_sale($date_start,$date_end);
?>

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Reporte de Ventas</h6>
            </div>
            <div class="card-body">
		

<div class="row">
  <div class="col-xs-4">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Todas la ventas</span>
            <div class="text-center">  <span class=" center-block">Desde: <?php echo $Inicio = date("d/m/Y", strtotime($date_start));?> &nbsp; al: <?php echo $Fin = date("d/m/Y", strtotime($date_end));?> </span></div>
          </strong>
          <div class="pull-right">
            <a href="inicio.php?open=Reportes" class="btn btn-primary">Atrás</a>
          </div>
        </div>
        <div class="panel-body">
          <div class="col-xs-8 table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                
              <tr>
                <th class="text-center" style="width: 5%;">#</th>
                <th>Fecha Pedido</th>
                <th class="text-center" style="width: 10%;"> Pedido</th>
                <th class="text-center" style="width: 15%;"> Ventas </th>
                <th class="text-center" style="width: 15%;"> Costo </th>
                <th class="text-center" style="width: 15%;"> Ganancias </th>
             </tr>
            </thead>
           <tbody>
               <?php foreach ($sales as $sale):?>
             <tr>
                 
               <td class="text-center"><?php echo $t=count_id();?></td>
               <td><?php echo $newDate = date("d/m/Y", strtotime(remove_junk($sale['start'])));?></td>
               <td class="text-center"><?php echo remove_junk($sale['codigo']); ?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['VentaPedido']), 2, '.', ',')?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['CostoPedido']), 2, '.', ',')?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['Ganancia']), 2, '.', ',')?></td>
                 
            </tr>
            <?php 
            $total=$sale['VentaPedido'] +$total;
            $Costo=$sale['CostoPedido']+$Costo;
            $ganancia=$sale['Ganancia']+$ganancia;
                   
            ?>
            
             <?php endforeach;?>
           </tbody>
         </table>
       
        </div>
        <div class="col-xs-4">
        
        <table class="table table-bordered table-striped">
           <tr>
               <td><strong>Ventas:</strong></td>
            <td><?=number_format($total, 2, '.', ',')?></td>
            </tr> 
             <tr>
                 <td><strong>Costos asociados:</strong></td>
            <td><?=number_format($Costo, 2, '.', ',')?></td>
            </tr> 
             <tr>
            <td><strong>Ganancia Neta:</strong></td>
            <td><?=number_format($ganancia, 2, '.', ',')?></td>
            </tr> 
            <tr>
            <td><strong>Nro. de Ventas:</strong></td>
            <td><?=(int)$t?></td>
            </tr> 
            </table>
        
        </div>
        </div>
      </div>
    </div>
  </div>

	 </div>
</div>