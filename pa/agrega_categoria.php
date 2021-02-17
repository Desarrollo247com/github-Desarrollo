<?php
  require_once('includes/load.php');
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   $cat_cost = remove_junk($db->escape($_POST['categorie-cost']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name,Costo) VALUES ('{$cat_name}','{$cat_cost}')";
     
      if($db->query($sql)){
        $session->msg("s", "Artículo agregado exitosamente.");
        redirect('inicio.php?open=Categorias',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Categorias',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Categorias',false);
   }
 }
?>