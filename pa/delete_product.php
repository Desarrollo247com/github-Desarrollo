<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = $_GET['id'];
  
?>
<?php
  $delete_id = delete_by_id('mcombos',$product);
  if($delete_id){
      $delete_id2 = delete_by_idP('combos',$product);
      $session->msg("s","Producto eliminado");
      redirect('inicio.php?open=Productos');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Productos');
  }
?>


?>