<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = updateProducto($_GET['id']);
  if($delete_id){
      $session->msg("s","Pedido Entregado");
     echo "<script> window.location='inicio.php?open=Pedidos'; </script>";
    exit;
  } else {
      $session->msg("d","Se ha producido un error con el pedido");
     echo "<script> window.location='inicio.php?open=Pedidos'; </script>";
	     exit;
  }
?>
