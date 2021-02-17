<?php
   require_once('includes/load.php');
   
?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
      <p class="modal-title" id="myModalLabel">Pedido #   <?php  echo $_POST["id"];?></p>
             
          <?php
       
                $codigo=$_POST["id"];
                $pedido=pedido_lista($codigo);
           
          
        
            if($pedido>0){
            
                $total=0;
                          ?> 
                          <table class="table table-bordered table-xs">
<thead>

<th>Productos</th>
<th>Precio Unitario</th>
<th>Cantidad</th>
<th>Subtotal</th>   
   </thead>                           
                              
                            
                
                           
                               <?php  foreach($pedido as $datos): ?>   
                               
                            <tbody>
                                  
                                <td class="text-center"><h4><span class="small"><?=$datos["descripcion"]?></span></h4></td> 
                                <td class="text-right"><?=number_format($datos["Precio_venta"],2,".",",")?></td>
                                <td class="text-right"><?=number_format($datos["cantidad"],2,".",",")?></td>
                                <td class="text-right"><?=number_format($datos["Precio_venta"]*$datos["cantidad"],2,".",".")?></td>    
                                <?php $total=($datos["Precio_venta"]*$datos["cantidad"]) + $total;?>
                                
                            </tbody>
                              <?php endforeach;?>
                             </table>     
<table class="table table-bordered table-xs">
  <tr>  
      <td>Total del pedido:</td>
      <td><?php echo number_format($total,2,".",".") ?> </td> 
    
    </tr>
</table>
<?php } else{  echo "No hay pedidos asociados";} ?>
          
        
        
         
      </div>
      
    </div>
  </div>
