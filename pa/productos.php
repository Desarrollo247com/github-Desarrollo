<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = find_all('mcombos');
?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Combos</h6>
            </div>
            <div class="card-body">
              
		
				
		
		<div class="row">
			<div class="col-lg-12">
                  <?php echo display_msg($msg); ?>
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="?open=Combo" class="btn btn-primary">Agragar combo</a>
         </div>
        </div>
      
          <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">#</th>
                <th> Nombre</th>
                <th> Precio de venta</th>
               
                <th class="text-center" style="width: 10%"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
               <?php echo remove_junk($product['descripcion']); ?>
                </td>
                <td> <?php echo remove_junk($product['Precio_venta']); ?></td>
               
          <td>
                  <div class="btn-group">
                    <a href="?open=editar_producto&id=<?php echo $product['id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <em class="fa fa-edit">&nbsp;</em>
                    </a>
                     <a href="delete_product.php?id=<?php echo $product['id'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <em class="fa fa-trash">&nbsp;</em>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>

					
           
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      
		   </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

   	