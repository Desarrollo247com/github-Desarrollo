<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $Marca = find_by_id('Tbl_marca',$_GET['id']);
  if(!$Marca){
    $session->msg("d","ID de la marca falta.");
    redirect('inicio.php?open=Marcas');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_marca',$Marca['Id']);
  if($delete_id){
      $session->msg("s","Marca eliminada");
      redirect('inicio.php?open=Marcas');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Marcas');
  }
?>
