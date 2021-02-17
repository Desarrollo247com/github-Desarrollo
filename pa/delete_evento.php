<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
$Clave=$_GET['id'];
  

  $delete_id = delete_by_cod('events',$Clave);
  if($delete_id){
      
       $delete = delete_by_codigo('pedido',$Clave);
      
      $session->msg("s","evento eliminado");
      redirect('inicio.php?open=Revisar');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('inicio.php?open=Revisar');
  }
?>
