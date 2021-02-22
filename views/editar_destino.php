<?php
  $page_title = 'Editar destinos';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$destino = find_by_id('tbl_destino',$_GET['id']);
$estado=find_all('tbl_estado');
 $all_cat=find_detination_active();
if(!$destino){
    $session->msg("d","No existe el id. del destino");
     redirect('destinos.php');
}

 if(isset($_POST['add_destino'])){ 

                 $req_field = array('destino-name','destino-descripcion','destino-direccion','destino-latitud','destino-longitud','destino-tiempo');
   validate_fields($req_field);
     if(empty($errors)){
                    
   $destino_name = remove_junk($db->escape($_POST['destino-name']));
   $destino_descripcion = remove_junk($db->escape($_POST['destino-descripcion']));
   $destino_direccion = remove_junk($db->escape($_POST['destino-direccion']));
   $destino_latitud = remove_junk($db->escape($_POST['destino-latitud']));
   $destino_longitud = remove_junk($db->escape($_POST['destino-longitud'])); 
   $destino_categoria = remove_junk($db->escape($_POST['destino-categoria']));
   $destino_tiempo = remove_junk($db->escape($_POST['destino-tiempo']));
   $destino_estado = remove_junk($db->escape($_POST['destino-estado']));
   $tmp_name=$_FILES['file_upload']['tmp_name'];
   $uploads_dir = '../uploads/sitios';
                        
                        if(empty($tmp_name))

                        {

                                   $query   = "UPDATE tbl_destino SET";
                    $query  .=" Nombre ='{$destino_name}',Descripcion ='{$destino_descripcion}', Direccion ='{$destino_direccion}',Latitud ='{$destino_latitud}',Longitud ='{$destino_longitud}',Tiempo_promedio ='{$destino_tiempo}',Estado ='{$destino_estado}',Id_cat_destino ='{$destino_categoria}'";
                    $query  .=" WHERE Id ='{$destino['Id']}'";
                    $result = $db->query($query);
                            if($result && $db->affected_rows() === 1){
                                $session->msg('s',"El destino ha sido actualizado. ");
                                redirect('inicio.php?open=Destinos', false);
                            } else {
                                $session->msg('d',' Lo siento, actualización falló.');
                                redirect('inicio.php?open=EditaDestino&id='.$destino['Id'], false);
                            }

                        }

                        else{
                        $name = basename($_FILES["file_upload"]["name"]);       
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");

                    $query   = "UPDATE tbl_destino SET";
                    $query  .=" Nombre ='{$destino_name}',Descripcion ='{$destino_descripcion}', Direccion ='{$destino_direccion}',Latitud ='{$destino_latitud}',Longitud ='{$destino_longitud}',Tiempo_promedio ='{$destino_tiempo}',Imagen ='{$name}',Estado ='{$destino_estado}',Id_cat_destino='{$destino_categoria}'";
                    $query  .=" WHERE Id ='{$destino['Id']}'";
                    $result = $db->query($query);
                            if($result && $db->affected_rows() === 1){
                                $session->msg('s',"El destino ha sido actualizado. ");
                                redirect('inicio.php?open=Destinos', false);
                            } else {
                                $session->msg('d',' Lo siento, actualización falló.');
                                redirect('inicio.php?open=EditaDestino&id='.$destino['Id'], false);
                            }
                        
                        }  
                    }

                 }


                
 
                   
 
?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar Destino</h6>
            </div>
            <div class="card-body">
                
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span></span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
           <form method="post" action="editar_destino.php?id=<?php echo (int)$destino['Id'] ?>" enctype="multipart/form-data">
            <div class="form-group">
           <div class="col-md-12"><label>Nombre:</label><input type="text" value="<?=$destino['Nombre']?>" class="form-control" required name="destino-name" placeholder="Nombre del destino"></div>
           <div class="col-md-12"><label>Descripcion:</label> <textarea class="form-control" rows = "5" cols = "40"  required name="destino-descripcion" placeholder="Descripción del destino"><?=$destino['Descripcion']?></textarea></div>
           <div class="col-md-12"><label>Dirección:</label> <textarea class="form-control" rows = "5" cols = "40"  required name="destino-direccion" placeholder="Dirección del destino"><?=$destino['Direccion']?></textarea></div>
            <div class="col-md-12"><label>Categoría del destino:</label><select placeholder="Categoría del destino" required="" aria-required="true" class="form-control" name="destino-categoria">
                 <option value="">- Seleccione una categoría - </option>
                 <?php foreach ($all_cat as $catDes): ?>
                  <option value="<?=$catDes['Id']; ?>" <?php if($destino['Id_cat_destino'] == $catDes['Id']): echo "selected"; endif; ?> > <?=$catDes['Descripcion']?></option>          
               
                  <?php endforeach; ?>
              
                   </select></div>
           <div class="col-md-3"><label>Latitud:</label> <input type="number" value="<?=$destino['Latitud']?>" class="form-control" required name="destino-latitud" step=0.00000001 placeholder="Latitud"></div>
           <div class="col-md-3"><label>Longitud:</label> <input type="number" value="<?=$destino['Longitud']?>" class="form-control" required name="destino-longitud" step=0.00000001 placeholder="Longitud"></div>
           <div class="col-md-6"><label>Tiempo promedio:</label> <input type="number" value="<?=$destino['Tiempo_promedio']?>" class="form-control" required name="destino-tiempo" step=0.00000001 placeholder="Tiempo promedio en horas"></div>
                  <div class="col-md-6">
                  <label>Estado:</label> 
                    <select class="form-control" name="destino-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($destino['Estado'] === $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
                 <div class="col-md-3"><img src="../uploads/sitios/<?php echo $destino['Imagen'];?>" class="img-thumbnail" /><input type="file" name="file_upload" multiple="multiple" accept="image/*" class="btn btn-primary btn-file"/></div>  
                      

               </div>
              </div>
                        
              <button type="submit" name="add_destino" class="btn btn-danger">Actualizar</button>
          </form>
         </div>
        </div>
      </div>
  </div>

 </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      