<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $Registro = find_by_id('tbl_registro',$_GET['id']);
  if(!$Registro){
    $session->msg("d","ID del registro falta.");
    redirect('inicio.php?open=Registro');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_registro',$Registro['Id']);
  if($delete_id){
      $session->msg("s","Marca eliminada");
      redirect('inicio.php?open=Registro');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Regisro');
  }
?>
