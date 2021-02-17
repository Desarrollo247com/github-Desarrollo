<?php
require_once('includes/load.php');
$sales=ListadoPedido();

?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de pedidos</h6>
				  <?php echo display_msg($msg); ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                <th class="text-right">#</th>
                <th class="text-right">Fecha Pedido</th>
                 <th class="text-right">Hora</th>        
                <th class="text-right"> Cliente</th>
                <th class="text-right"> Pedido</th>
                <th class="text-right"> Persona Contacto </th>
         
				<th class="text-right" style="width:15%"> Status </th> 
				<th class="text-right" style="width:15%"> Acciones </th> 		
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                <th class="text-center" style="width:5%">#</th>
                <th style="width:10%" class="text-right">Fecha Pedido</th>
                        <th class="text-right" style="width:15%"> Hora de entrega </th>
                <th style="width:15%" class="text-right">Cliente</th>
                <th class="text-right" style="width:5%"> Pedido</th>
                <th class="text-right" style="width:15%"> Persona Contacto </th>
                <th class="text-right" style="width:15%"> Estatus </th>
              
				 	
				<th class="text-right" style="width:15%"> Acciones </th> 		
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $i=0;
                      foreach ($sales as $sale):
                      $i=$i +1;?>
             <tr>
                 
               <td class="text-center"><?php echo $t=count_id();?></td>
               <td><?php echo $newDate = date("d/m/Y", strtotime(remove_junk($sale['start'])));?></td>
                  <td><?php echo remove_junk($sale['hora']);?></td>
               <td class="text-right"><?php echo remove_junk($sale['Nombre']); ?></td> 
               <td class="text-right"><a href="javascript:void(0);" data-toggle="modal" data-target="#modal" onclick="carga_ajax('<?php echo remove_junk($sale['codigo']); ?>','modal','ajax_mesa.php');"  id="carousel-selector-<?=$i?>"  >
                   <?php echo remove_junk($sale['codigo']); ?></a></td>
               <td class="text-right"><?php echo remove_junk($sale['Nombre_contacto'])?></td>
                    <td class="text-right"><?php if(remove_junk($sale['Status'])==0){echo "<span class='bg-gradient-warning text-gray-100'><strong>Pendiente</strong></span>";} if(remove_junk($sale['Status'])==2){echo "<span class='bg-gradient-info text-gray-100'><strong>Cancelado</strong></span>";} if(remove_junk($sale['Status'])==1) { echo "<span class='bg-gradient-success text-gray-100'><strong>Entregado</strong></span>";};?></td>
				<td>
				 
				  <div class="btn-group">
                    <a href="?open=edita_entrega&id=<?php echo $sale['codigo'];?>" class="btn btn-success btn-xs"  title="Pedido Entregado" data-toggle="tooltip">
                      <em class="fa fa-edit">&nbsp;</em>
                    </a>
                     <a href="?open=cancela_entrega&id=<?php echo $sale['codigo'];?>" class="btn btn-danger btn-xs"  title="Pedido Cancelado" data-toggle="tooltip">
                      <em class="fa fa-trash">&nbsp;</em>
                    </a>
                  </div>
				 
				 </td> 
				
            </tr>
            
            
             <?php endforeach;?>

                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      
      <!--modal-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Datos de la mesa</h4>
      </div>
      <div class="modal-body">
        <h1></h1>
      </div>
      <div class="modal-footer">
            <h4>Blackbox</h4>
      </div>
    </div>
  </div>
</div>
<!--/modal-->
  <script src="js/funciones.js"></script>