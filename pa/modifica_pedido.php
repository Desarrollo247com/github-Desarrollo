<?php
  $page_title = 'Lista de categorías';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $pedido=$_GET['id'];
  $all_pedidos = consulta_pedido($pedido);
$productos=find_all('mcombos');
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Modificar Pedido</h6>
            </div>
            <div class="card-body">
		
				
		
	  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Pedido</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="agrega_evento.php">
            <div class="form-group">
                <input name="numero_pedido" type="text" class="form-control" value="<?php echo $pedido?>" hidden="true">
                  <select id="cliente" name="categorie-name" class="form-control">  <option value="">Selecciona un producto</option>
                    <?php  foreach ($productos as $prod): ?>
                      <option value="<?php echo $prod['id'] ?>">
                        <?php echo $prod['descripcion'] ?></option>
                    <?php endforeach; ?>
                    </select>
               <div class="float-left col-xs-3"><input class="form-control" type="number" placeholder="Cantidad" name="cantidad" style="width:110px;"/></div>
<div class="float-left col-xs-12"><input class="form-control" placeholder="Observación" type="textarea" name="observacion" /></div> 
            </div>
            <button type="submit" name="add_cat" class="btn btn-primary">Agregar pedido</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Lista de categorías</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Observaciones</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_pedidos as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['descripcion'])); ?></td>
                     <td><?php echo remove_junk(ucfirst($cat['cantidad'])); ?></td>
                     <td><?php echo remove_junk(ucfirst($cat['Observaciones'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                       
                        <a href="delete_pedido.php?id=<?php echo $cat['Id_pedido'];?>&ped=<?php echo $pedido;?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar Producto">
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

        </div>
        <!-- /.container-fluid -->

      </div>