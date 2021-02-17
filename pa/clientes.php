<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $Clientes = find_all('customer');
?>

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <div class="card-body">
		
				
		
		<div class="row">
			<div class="col-lg-12">
                  <?php echo display_msg($msg); ?>
				<div class="panel panel-default">
				
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="?open=Agregarclientes" class="btn btn-primary">Agregar cliente</a>
         </div>
        </div>
        <div class="table-responsive ">
         <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Nombre</th>
                <th> Tlf </th>
                <th class="text-center" style="width: 10%;"> Email</th>
                <th class="text-center" style="width: 10%;"> Comuna</th>
                <th class="text-center" style="width: 10%;"> Calle</th>  
                <th class="text-center" style="width: 10%;"> Nro</th>
               <th class="text-center" style="width: 100px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($Clientes as $customer):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($customer['Nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($customer['Tlf']); ?></td>
                <td class="text-center"> <?php echo remove_junk($customer['email']); ?></td>
                <td class="text-center"> <?php echo remove_junk($customer['Comuna']); ?></td>
                <td class="text-center"> <?php echo remove_junk($customer['Calle']); ?></td>
                <td class="text-center"> <?php echo remove_junk($customer['Nro']); ?></td>
               
                <td class="text-center">
                  <div class="btn-group">
                    <a href="?open=Editarclientes&Id=<?php echo (int)$customer['Id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                       <em class="fa fa-edit">&nbsp;</em>
                    </a>
                     <a href="delete_clientes.php?Id=<?php echo (int)$customer['Id'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
					</div>
				</div><!-- /.panel-->
				
		
				</div><!-- /.panel-->
			</div><!-- /.col-->
			    </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
