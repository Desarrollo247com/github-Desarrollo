<?php
require_once('includes/load.php');
$sales=find_evento();

?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Revisar  pedidos</h6>
				  <?php echo display_msg($msg); ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                <th class="text-right">#</th>
                <th class="text-right">Pedido</th>
                <th class="text-right"> Cliente</th>
                <th class="text-right"> Evento</th>
                <th class="text-right"> Fecha Entrega </th>
                
				<th class="text-right" style="width:15%"> Acciones </th> 		
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                <th class="text-center" style="width:5%">#</th>
                <th style="width:10%" class="text-right">Pedido</th>
                <th style="width:15%" class="text-right">Cliente</th>
                <th class="text-right" style="width:5%"> Evento</th>
                <th class="text-right" style="width:15%">Fecha Entrega </th>
                
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
                 <td class="text-right"><?php echo remove_junk($sale['codigo']); ?></td>
                 <td class="text-right"><?php echo remove_junk($sale['Nombre']); ?></td> 
                 <td class="text-right"><?php echo remove_junk($sale['title']); ?></td> 
               <td><?php echo $newDate = date("d/m/Y", strtotime(remove_junk($sale['start'])));?></td>
               
               
               
				<td>
				 
				  <div class="btn-group">
                    <a href="?open=modifica&id=<?php echo remove_junk($sale['codigo']); ?>" class="btn btn-success btn-xs"  title="Modificar Pedido" data-toggle="tooltip">
                      <em class="fa fa-edit">&nbsp;</em>
                    </a>
                     <a href="delete_evento.php?id=<?php echo remove_junk($sale['codigo']); ?>" class="btn btn-danger btn-xs"  title="Eliminar Producto" data-toggle="tooltip">
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