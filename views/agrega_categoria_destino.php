<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_tipo'])){
   $req_field = array('tipo-name','tipo-estado');
   validate_fields($req_field);
   $tipo_name = remove_junk($db->escape($_POST['tipo-name']));
   $tipo_status = remove_junk($db->escape($_POST['tipo-estado']));
   
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_categoriadestino (Descripcion,Estado) VALUES ('{$tipo_name}','{$tipo_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Categoría del destino se ha agregado exitosamente.");
        redirect('inicio.php?open=CategoriaDestino',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=CategoriaDestino',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=CategoriaDestino',false);
   }
 }
?>