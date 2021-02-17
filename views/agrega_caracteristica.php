<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_caracteristica'])){
   $req_field = array('caracteristica-name',);
   validate_fields($req_field);
   $caracteristica_name = remove_junk($db->escape($_POST['caracteristica-name']));
   $caracteristica_status = remove_junk($db->escape($_POST['caracteristica-estado']));
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_caracteristicas (Descripcion,Estado) VALUES ('{$caracteristica_name}','{$caracteristica_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Característica agregada exitosamente.");
        redirect('inicio.php?open=Caracteristicas',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=caracteristicas',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=caracteristicas',false);
   }
 }
?>