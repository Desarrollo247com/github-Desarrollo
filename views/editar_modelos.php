<?php
  $page_title = 'Editar marca';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$modelo = find_by_id('tbl_modelo',$_GET['id']);
$estado=find_all('tbl_estado');
$marcas=find_brand_active();

if(!$modelo){
  $session->msg("d","No existe el id. de la marca");
  redirect('marcas.php');
}
?>
<?php
 if(isset($_POST['modelo'])){
    $req_fields = array('modelo-marca','modelo-descripcion','modelo-estado' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['modelo-descripcion']));
       $p_status  = $_POST['modelo-estado'];
       $p_marca  = $_POST['modelo-marca'];
       
       
    
       $query   = "UPDATE tbl_modelo SET";
       $query  .=" Id_marca ='{$p_marca}',Descripcion ='{$p_name}', Estado ='{$p_status}'";
       $query  .=" WHERE Id ='{$modelo['Id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"El modelo ha sido actualizado. ");
                 redirect('inicio.php?open=Modelos', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('inicio.php?open=EditaModelo&id='.$marca['Id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('../inicio.php?open=EditaModelo&id='.$marca['Id'], false);
   }

 }

?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar modelo</h6>
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
           <form method="post" action="editar_modelos.php?id=<?php echo (int)$modelo['Id'] ?>">
              <div class="form-group">
                <div class="input-group">
               <div class="col-md-12">
                <label>Nombre del modelo:</label>  <input type="text" class="form-control" name="modelo-descripcion" value="<?php echo remove_junk($modelo['Descripcion']);?>">
              </div>
              <div class="col-md-8">
                  <label>Estado:</label> 
                    <select class="form-control" name="modelo-marca">
                    <option value="">Selecciona una marca</option>
                   <?php  foreach ($marcas as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($modelo['Id_marca']=== $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                </div>
                  <div class="col-md-8">
                  <label>Estado:</label> 
                    <select class="form-control" name="modelo-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $mol): ?>
                     <option value="<?=$mol['Id']; ?>" <?php if($modelo['Estado'] === $mol['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($mol['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
               </div>
              </div>
                        
              <button type="submit" name="modelo" class="btn btn-danger">Actualizar</button>
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
      