<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $Caracteristicas = find_by_id('Tbl_caracteristicas',$_GET['id']);
  if(!$Caracteristicas){
    $session->msg("d","ID de la caracteristica falta.");
    redirect('inicio.php?open=Caracteristicas');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_Caracteristicas',$Caracteristicas['Id']);
  if($delete_id){
      $session->msg("s","Caracteristica eliminada");
      redirect('inicio.php?open=Caracteristicas');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Caracteristicas');
  }
?>