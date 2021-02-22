<?php //ORDEN MCY102-178641

  $page_title = 'Listado de Modelos';
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_registro = find_all('tbl_registro');
  $all_estado=find_all('tbl_estado');
 
        //$all_photo = find_all('media');
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">REGISTRO AFILIADOS</h3>
              <P>Aquí se registran los afiliados que ingresan a la aplicación.</P>
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
            <span>Agregar afiliados</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="agrega_afiliados.php" enctype="multipart/form-data">
            <div class="form-group">
            <input type="text" class="form-control" required name="registro-name" placeholder="Nombre del afiliado">
             <input type="text" class="form-control" required name="registro-apellido" placeholder="Apellido del afiliado">
             <input type="date" class="form-control" required name="registro-nacimiento" placeholder="Fecha de nacimiento">
            <input type="email" class="form-control" required name="registro-email" placeholder="Correo del afiliado">
           <input type="phone"  class="form-control" required name="registro-movil" placeholder="Número de celular">
           <input type="phone"  class="form-control" required name="registro-fijo" placeholder="Número de teléfono fijo">
            <select placeholder="Estado" required="" aria-required="true" class="form-control" name="registro-estado">
                 <option value=" ">- Seleccione un estado - </option>
                 <?php foreach ($all_estado as $est): ?>
                             
                  <option value="<?=$est['Id']?>"><?=$est['Descripcion'];?> </option>
                  <?php endforeach; ?>
              
                   </select>
                   <div class="input-group">
                                  
               </div> 
                 
                  
            </div>
         
            <button type="submit" name="add_registro" class="btn btn-primary">Agregar afiliado</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Listado de afiliados</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered small" id="dataTable" width="70%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_registro as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Nombre'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Apellido'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Email'])); ?></td>
                    <td><?php if(remove_junk(ucfirst($cat['Estado']))==1) echo 'ACTIVO'; else { echo 'INACTIVO';}; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="../views/inicio.php?open=EditaDestino&id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar"><em class="fa fa-edit">&nbsp;</em>
                        
                        </a>
                            <a href="elimina_registro.php?id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
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

            <!--modal--><!--llevar a otros usos -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">   
      </div>
    </div>
  </div>
</div>
<!--/modal-->
<script src="../vendor/jquery/modal.js"></script>    
