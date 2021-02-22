<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $tipo = find_by_id('tbl_tipovehiculo',$_GET['id']);
  if(!$tipo){
    $session->msg("d","ID de del tipo de vehículo falta.");
    redirect('inicio.php?open=TipoVehiculo');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_tipovehiculo',$tipo['Id']);
  if($delete_id){
      $session->msg("s","Tipo de vehículo eliminada");
      redirect('inicio.php?open=TipoVehiculo');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=TipoVehiculo');
  }
?>