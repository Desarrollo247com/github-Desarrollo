<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_registro'])){
   $req_field = array('registro-name','registro-apellido','registro-email');
   validate_fields($req_field);
   $registro_name = remove_junk($db->escape($_POST['registro-name']));
   $registro_apellido = remove_junk($db->escape($_POST['registro-apellido']));
   $registro_nacimiento = remove_junk($db->escape($_POST['registro-nacimiento']));
    $registro_email = remove_junk($db->escape($_POST['registro-email']));
    $registro_movil = remove_junk($db->escape($_POST['registro-movil']));
    $registro_fijo = remove_junk($db->escape($_POST['registro-fijo']));
   $registro_status = remove_junk($db->escape($_POST['registro-estado']));
   if(empty($errors)){
      $sql  = "INSERT INTO tbl_registro (Nombre,Apellido,Fecha_Nac,Email,Telefono_movil, Telefono_fijo,Estado) VALUES ('{$registro_name}','{$registro_apellido}','{$registro_nacimiento}','{$registro_email}','{$registro_movil}','{$registro_fijo}','{$registro_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "Rgistro agregado exitosamente.");
        redirect('inicio.php?open=Registro',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Registro',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Registro',false);
   }
 }
?>