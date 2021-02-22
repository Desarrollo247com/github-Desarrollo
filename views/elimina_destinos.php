<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $Destinos = find_by_id('tbl_destino',$_GET['id']);
  if(!$Destinos){
    $session->msg("d","ID de destino falta.");
    redirect('inicio.php?open=Destinos');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_destino',$Destinos['Id']);
  if($delete_id){
      $session->msg("s","Destino eliminado");
      redirect('inicio.php?open=Destinos');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Destinos');
  }
?>