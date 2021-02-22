<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $Modelo = find_by_id('tbl_modelo',$_GET['id']);
  if(!$Modelo){
    $session->msg("d","ID del modelo falta.");
    redirect('inicio.php?open=Modelos');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_modelo',$Modelo['Id']);
  if($delete_id){
      $session->msg("s","Modelo eliminado");
      redirect('inicio.php?open=Modelos');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Modelos');
  }
?>
