<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>

<?php
$pedido=$_GET['id'];
$Npedido=$_GET['ped'];
  $delete_id = delete_by_pedido('pedido',(int)$pedido);
  if($delete_id){
      $session->msg("s","Pedido eliminado");
         header("Location:inicio.php?open=modifica&id=$Npedido",TRUE,301);
  } else {
      $session->msg("d","Eliminación falló");
        header("Location:inicio.php?open=modifica&id=$Npedido",TRUE,301);
  }
?>
