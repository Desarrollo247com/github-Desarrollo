<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $insignia = find_by_id('Tbl_insignias',$_GET['id']);
  if(!$insignia){
    $session->msg("d","ID de la insignia falta.");
    redirect('inicio.php?open=Insignias');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_insignias',$insignia['Id']);
  if($delete_id){
      $session->msg("s","insignia eliminada");
      redirect('inicio.php?open=Insignias');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Insignias');
  }
?>