<?php
  $page_title = 'Editar insignias';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$insignia = find_by_id('tbl_insignias',$_GET['id']);
$estado=find_all('tbl_estado');

if(!$insignia){
    $session->msg("d","No existe el id. de la marca");
     redirect('insignias.php');
}

 if(isset($_POST['add_insignia'])){ 

                $req_fields = array('insignia-descripcion','insignia-puntaje','insignia-estado' );
                validate_fields($req_fields);
     if(empty($errors)){
                    
                        $p_name  = remove_junk($db->escape($_POST['insignia-descripcion']));
                        $p_puntaje=remove_junk($db->escape($_POST['insignia-puntaje']));
                        $p_status  = $_POST['insignia-estado'];
                        $tmp_name=$_FILES['file_upload']['tmp_name'];
                       
                 
                         
                        $uploads_dir = '../uploads/insignias';
                        
                        if(empty($tmp_name))

                        {

                                   $query   = "UPDATE tbl_insignias SET";
                    $query  .=" Descripcion ='{$p_name}',Puntuacion ='{$p_puntaje}', Estado ='{$p_status}'";
                    $query  .=" WHERE Id ='{$insignia['Id']}'";
                    $result = $db->query($query);
                            if($result && $db->affected_rows() === 1){
                                $session->msg('s',"La insignia ha sido actualizada. ");
                                redirect('inicio.php?open=Insignias', false);
                            } else {
                                $session->msg('d',' Lo siento, actualización falló.');
                                redirect('inicio.php?open=EditaInsignia&id='.$insignia['Id'], false);
                            }

                        }

                        else{
                        $name = basename($_FILES["file_upload"]["name"]);       
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");

                    $query   = "UPDATE tbl_insignias SET";
                    $query  .=" Descripcion ='{$p_name}',Puntuacion ='{$p_puntaje}',Imagen ='{$name}', Estado ='{$p_status}'";
                    $query  .=" WHERE Id ='{$insignia['Id']}'";
                    $result = $db->query($query);
                            if($result && $db->affected_rows() === 1){
                                $session->msg('s',"La insignia ha sido actualizada. ");
                                redirect('inicio.php?open=Insignias', false);
                            } else {
                                $session->msg('d',' Lo siento, actualización falló.');
                                redirect('inicio.php?open=EditaInsignia&id='.$insignia['Id'], false);
                            }
                        
                        }  
                    }

                 }


                
 
                   
 
?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar Insignia</h6>
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
           <form method="post" action="editar_insignias.php?id=<?php echo (int)$insignia['Id'] ?>" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
               <div class="col-md-12">
                <label>Nombre de la insignia:</label>  <input type="text" class="form-control" name="insignia-descripcion" value="<?php echo remove_junk($insignia['Descripcion']);?>">
              </div>
               <div class="col-md-6">
                <label>Puntuación:</label>  <input type="number" class="form-control" name="insignia-puntaje" value="<?php echo remove_junk($insignia['Puntuacion']);?>">
              </div>
                  <div class="col-md-6">
                  <label>Estado:</label> 
                    <select class="form-control" name="insignia-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($insignia['Estado'] === $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
                 <div class="col-md-3"><img src="../uploads/insignias/<?php echo $insignia['Imagen'];?>" class="img-thumbnail" /><input type="file" name="file_upload" multiple="multiple" accept="image/*" class="btn btn-primary btn-file"/></div>  
                      

               </div>
              </div>
                        
              <button type="submit" name="add_insignia" class="btn btn-danger">Actualizar</button>
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
      