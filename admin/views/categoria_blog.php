<?php
  $page_title = 'Listado de categorías de destinos';
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_blog = find_all('tbl_categoria');
  $all_estado=find_all('tbl_estado');
        //$all_photo = find_all('media');
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">CATEGORIAS DEL BLOG</h3>
              <P>Agrega las diferentes categorías de los artículos.</P>
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
            <span>Agregar categorías del blog</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="agrega_categoria.php">
            <div class="form-group">
                <input type="text" class="form-control" name="categoria-name" placeholder="Escribe la categoría del blog" required>
                 <select placeholder="Estado" required="" aria-required="true" class="form-control" name="categoria-estado">
                 <option value=" ">- Seleccione un estado - </option>
                 <?php foreach ($all_estado as $est): ?>
                             
                  <option value="<?=$est['Id']?>"><?=$est['Descripcion'];?> </option>
                  <?php endforeach; ?>
              
                   </select>
                 
                  
            </div>
         
            <button type="submit" name="add_categoria" class="btn btn-primary">Agregar categoría</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Listado de categorías del blog</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nombre de la categoría</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_blog as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Descripcion'])); ?></td>
                    <td><?php if(remove_junk(ucfirst($cat['Estado']))==1) echo 'ACTIVO';else { echo 'INACTIVO';}; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="../views/inicio.php?open=EditaCategoriaBlog&id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar"><em class="fa fa-edit">&nbsp;</em>
                        
                        </a>
                        <a href="elimina_categoria_blog.php?id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
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