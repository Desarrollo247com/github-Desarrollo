<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_modelo'])){
   $req_field = array('modelo-name','modelo-estado','modelo-marca');
   validate_fields($req_field);
   $modelo_name = remove_junk($db->escape($_POST['modelo-name']));
   $modelo_status = remove_junk($db->escape($_POST['modelo-estado']));
   $modelo_marca = remove_junk($db->escape($_POST['modelo-marca']));
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_modelo (Id_marca,Descripcion,Estado) VALUES ('{$modelo_marca}','{$modelo_name}','{$modelo_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Modelo agregado exitosamente.");
        redirect('inicio.php?open=Modelos',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Modelos',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Marcas',false);
   }
 }
?>