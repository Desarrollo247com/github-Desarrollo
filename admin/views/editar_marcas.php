<?php
  $page_title = 'Editar marca';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$marca = find_by_id('tbl_marca',$_GET['id']);
$estado=find_all('tbl_estado');

if(!$marca){
  $session->msg("d","No existe el id. de la marca");
  redirect('marcas.php');
}
?>
<?php
 if(isset($_POST['marca'])){
    $req_fields = array('marca-descripcion','marca-estado' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['marca-descripcion']));
       $p_status  = $_POST['marca-estado'];
       
       
    
       $query   = "UPDATE tbl_marca SET";
       $query  .=" Descripcion ='{$p_name}', Estado ='{$p_status}'";
       $query  .=" WHERE Id ='{$marca['Id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Marca ha sido actualizada. ");
                 redirect('inicio.php?open=Marcas', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('inicio.php?open=EditaMarca&id='.$marca['Id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('../inicio.php?open=EditaMarca&id='.$marca['Id'], false);
   }

 }

?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar marca</h6>
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
           <form method="post" action="editar_marcas.php?id=<?php echo (int)$marca['Id'] ?>">
              <div class="form-group">
                <div class="input-group">
               <div class="col-md-12">
                <label>Nombre de la marca:</label>  <input type="text" class="form-control" name="marca-descripcion" value="<?php echo remove_junk($marca['Descripcion']);?>">
              </div>
                  <div class="col-md-8">
                  <label>Estado:</label> 
                    <select class="form-control" name="marca-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($marca['Estado'] === $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
               </div>
              </div>
                        
              <button type="submit" name="marca" class="btn btn-danger">Actualizar</button>
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
      