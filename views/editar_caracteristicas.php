<?php
  $page_title = 'Editar caracteristicas';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$caracteristica = find_by_id('tbl_caracteristicas',$_GET['id']);
$estado=find_all('tbl_estado');

if(!$caracteristica){
  $session->msg("d","No existe el id. de la caracteristica");
  redirect('caracteristicas.php');
}
?>
<?php
 if(isset($_POST['caracteristicas'])){
    $req_fields = array('caracteristica-descripcion','caracteristica-estado' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['caracteristica-descripcion']));
       $p_status  = $_POST['caracteristica-estado'];
       
       
    
       $query   = "UPDATE tbl_caracteristicas SET";
       $query  .=" Descripcion ='{$p_name}', Estado ='{$p_status}'";
       $query  .=" WHERE Id ='{$caracteristica['Id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"La característica ha sido actualizada. ");
                 redirect('inicio.php?open=Caracteristicas', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('inicio.php?open=EditaCaracteristica&id='.$caracteristica['Id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('../inicio.php?open=EditaCaracteristica&id='.$caracteristica['Id'], false);
   }

 }

?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar característica</h6>
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
           <form method="post" action="editar_caracteristicas.php?id=<?php echo (int)$caracteristica['Id'] ?>">
              <div class="form-group">
                <div class="input-group">
               <div class="col-md-12">
                <label>Nombre de la marca:</label>  <input type="text" class="form-control" name="caracteristica-descripcion" value="<?php echo remove_junk($caracteristica['Descripcion']);?>">
              </div>
                  <div class="col-md-8">
                  <label>Estado:</label> 
                    <select class="form-control" name="caracteristica-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($caracteristica['Estado'] === $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
               </div>
              </div>
                        
              <button type="submit" name="caracteristicas" class="btn btn-danger">Actualizar</button>
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
      