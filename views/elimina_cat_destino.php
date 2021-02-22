<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $tipo = find_by_id('tbl_categoriadestino',$_GET['id']);
  if(!$tipo){
    $session->msg("d","ID de de categoría del destino falta.");
    redirect('inicio.php?open=CategoriaDestino');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_categoriadestino',$tipo['Id']);
  if($delete_id){
      $session->msg("s","Tipo de vehículo eliminada");
      redirect('inicio.php?open=CategoriaDestino');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=CategoriaDestino');
  }
?>