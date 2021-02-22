<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_categoria'])){
   $req_field = array('categoria-name');
   validate_fields($req_field);
   $categoria_name = remove_junk($db->escape($_POST['categoria-name']));
   $categoria_status = remove_junk($db->escape($_POST['categoria-estado']));
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_categoria(Descripcion,Estado) VALUES ('{$categoria_name}','{$categoria_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Categoria agregada exitosamente.");
        redirect('inicio.php?open=CategoriaBlog',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=CategoriaBlog',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=CategoriaBlog',false);
   }
 }
?>