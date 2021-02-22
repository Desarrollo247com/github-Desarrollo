<?php
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $blog = find_by_id('tbl_categoria',$_GET['id']);
  if(!$blog){
    $session->msg("d","ID de la categoria falta.");
    redirect('inicio.php?open=CategoriaBlog');
  }
?>
<?php
  $delete_id = delete_by_id('tbl_categoria',$blog['Id']);
  if($delete_id){
      $session->msg("s","Categoría eliminada");
      redirect('inicio.php?open=CategoriaBlog');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=CategoriaBlog');
  }
?>
