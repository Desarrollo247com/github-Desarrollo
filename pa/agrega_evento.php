<?php
  require_once('includes/load.php');
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name','numero_pedido','cantidad');
   validate_fields($req_field);
     
   $Npedido= remove_junk($db->escape($_POST['numero_pedido']));
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
     $Cantidad=remove_junk($db->escape($_POST['cantidad']));
     $Observacion=remove_junk($db->escape($_POST['observacion']));
     
   if(empty($errors)){
      $sql  = "INSERT INTO pedido (Npedido,id_producto,cantidad,status,Observaciones) VALUES ('{$Npedido}','{$cat_name}','{$Cantidad}','0','{$Observacion}')";
     
      if($db->query($sql)){
        $session->msg("s", "Pedido agregado exitosamente.");
         header("Location:inicio.php?open=modifica&id=$Npedido",TRUE,301);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        header("Location:inicio.php?open=modifica&id=$Npedido",TRUE,301);
      }
   } else {
     $session->msg("d", $errors);
      header("Location:inicio.php?open=modifica&id=$Npedido",TRUE,301);
   }
 }
?>