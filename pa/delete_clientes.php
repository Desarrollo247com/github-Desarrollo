<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = find_by_id('customer',(int)$_GET['Id']);
  if(!$product){
    $session->msg("d","ID vacío");
    redirect('inicio.php?open=Clientes');
  }
?>
<?php
  $delete_id = delete_by_id('customer',(int)$product['Id']);
  if($delete_id){
      $session->msg("s","Cliente eliminado");
      redirect('inicio.php?open=Clientes');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Clientes');
  }
?>