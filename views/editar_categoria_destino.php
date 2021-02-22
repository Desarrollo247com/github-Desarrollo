<?php
  $page_title = 'Editar Categorías del destino';
 require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$tipo = find_by_id('tbl_categoriadestino',$_GET['id']);
$estado=find_all('tbl_estado');


if(!$tipo){
  $session->msg("d","No existe el id. de la categoría del destino");
  redirect('tipovehiculo.php');
}
?>
<?php
 if(isset($_POST['tipo'])){
    $req_fields = array('tipo-descripcion','tipo-estado' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['tipo-descripcion']));
       $p_status  = $_POST['tipo-estado'];
       
       
    
       $query   = "UPDATE tbl_categoriadestino SET";
       $query  .=" Descripcion ='{$p_name}', Estado ='{$p_status}'";
       $query  .=" WHERE Id ='{$tipo['Id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"La categoria ha sido actualizado. ");
                 redirect('inicio.php?open=CategoriaDestino', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('inicio.php?open=CategoriaDestino&id='.$tipo['Id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('../inicio.php?open=CategoriaDestino&id='.$tipo['Id'], false);
   }

 }

?>
<?php include_once('../layouts/header.php'); ?>

 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar categoría destino</h6>
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
           <form method="post" action="editar_categoria_destino.php?id=<?php echo (int)$tipo['Id'] ?>">
              <div class="form-group">
                <div class="input-group">
               <div class="col-md-12">
                <label>Categoría del destino:</label>  <input type="text" class="form-control" name="tipo-descripcion" value="<?php echo remove_junk($tipo['Descripcion']);?>">
              </div>
                  <div class="col-md-8">
                  <label>Estado:</label> 
                    <select class="form-control" name="tipo-estado">
                    <option value="">Selecciona un estado</option>
                   <?php  foreach ($estado as $cat): ?>
                     <option value="<?=$cat['Id']; ?>" <?php if($tipo['Estado'] === $cat['Id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['Descripcion']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
               </div>
              </div>
                        
              <button type="submit" name="tipo" class="btn btn-danger">Actualizar</button>
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
      