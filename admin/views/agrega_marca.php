<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_marca'])){
   $req_field = array('marca-name');
   validate_fields($req_field);
   $marca_name = remove_junk($db->escape($_POST['marca-name']));
   $marca_status = remove_junk($db->escape($_POST['marca-estado']));
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_marca (Descripcion,Estado) VALUES ('{$marca_name}','{$marca_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Marca agregada exitosamente.");
        redirect('inicio.php?open=Marcas',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Marcas',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Marcas',false);
   }
 }
?>