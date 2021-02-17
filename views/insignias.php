<?php
  $page_title = 'Listado de Modelos';
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_insignia = find_all('Tbl_insignias');
  $all_estado=find_all('Tbl_estado');
  $all_marcas=find_brand_active();
        //$all_photo = find_all('media');
?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">INSIGNIAS</h3>
              <P>Agrega los diferentes reconocimientos según el esfuerzo del afiliado.</P>
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
            <span>Agregar insignias</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="agrega_insignia.php" enctype="multipart/form-data">
            <div class="form-group">
            <input type="text" class="form-control" required name="insignia-name" placeholder="Nombre de la insignia">
            <input type="number" class="form-control" required name="insignia-puntos" placeholder="puntaje">
            <select placeholder="Estado" required="" aria-required="true" class="form-control" name="insignia-estado">
                 <option value=" ">- Seleccione un estado - </option>
                 <?php foreach ($all_estado as $est): ?>
                             
                  <option value="<?=$est['Id']?>"><?=$est['Descripcion'];?> </option>
                  <?php endforeach; ?>
              
                   </select>
                   <div class="input-group">
                     <span class="small">Las imagenes deben tener un tam. 200px (ancho) x 200px (largo).</span>
                  <span class="input-group-btn">
                    <input type="file" name="file_upload" multiple="multiple" accept="image/*" class="btn btn-primary btn-file"/>
                     
              
               </div> 
                 
                  
            </div>
         
            <button type="submit" name="add_insignia" class="btn btn-primary">Agregar insignia</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Listado de insignias</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nombre</th>
                    <th>Puntaje</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_insignia as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Descripcion'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['Puntuacion'])); ?></td>
                    <td><img src="../uploads/insignias/<?php echo $cat['Imagen'];?>" class="img-thumbnail" /></td>
                    <td><?php if(remove_junk(ucfirst($cat['Estado']))===1) echo 'ACTIVO';else { echo 'INACTIVO';}; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="../views/inicio.php?open=EditaInsignia&id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar"><em class="fa fa-edit">&nbsp;</em>
                        
                        </a>
                        <a href="elimina_insignia.php?id=<?php echo (int)$cat['Id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
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