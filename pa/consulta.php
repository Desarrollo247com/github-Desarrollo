<?php
  require_once('includes/load.php');



///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Nombre']))
{

$buscarAlumnos=find_all_sale($_POST['Nombre']);

    ?>
	          <table class="table table-bordered table-striped">
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
               <?php foreach ($buscarAlumnos as $sale):?>
             <tr>
                 
               <td class="text-center"><?php echo $t=count_id();?></td>
               <td><?php echo $newDate = date("d/m/Y", strtotime(remove_junk($sale['start'])));?></td>
               <td class="text-center"><?php echo remove_junk($sale['codigo']); ?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['VentaPedido']), 2, '.', ',')?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['CostoPedido']), 2, '.', ',')?></td>
               <td class="text-center"><?php echo number_format(remove_junk($sale['Ganancia']), 2, '.', ',')?></td>
                 
            </tr>
          
            
             <?php endforeach;?>
           </tbody>
         </table>

<?php } ?>