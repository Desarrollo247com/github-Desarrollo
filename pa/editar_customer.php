
  

<?php require_once('includes/load.php');
if(isset($_POST['edit_customer'])){
    $id=$_GET[Id];
  $req_field = array('customer-Nombre');
  validate_fields($req_field);
    $cat_name = remove_junk($db->escape($_POST['customer-Nombre']));
    $rut= remove_junk($db->escape($_POST['customer-Rut']));
    $tipo=remove_junk($db->escape($_POST['customer-tipo']));
    $tlf=remove_junk($db->escape($_POST['customer-tlf']));
    $email=remove_junk($db->escape($_POST['customer-email']));
    $tlf=remove_junk($db->escape($_POST['customer-tlf']));
    $calle=remove_junk($db->escape($_POST['customer-calle']));
    $nro=remove_junk($db->escape($_POST['customer-nro']));
    $referencia=remove_junk($db->escape($_POST['customer-referencia']));
    $nomcon=remove_junk($db->escape($_POST['customer-nombrecontacto']));
    $tlfcont=remove_junk($db->escape($_POST['customer-tlfcontacto']));
    
  if(empty($errors)){
        $sql = "UPDATE customer SET Nombre='{$cat_name}',Rut='{$rut}',Tlf='{$tlf}',email='{$email}',Tipo='{$tipo}',Calle='{$calle}',Nro='{$nro}',Referencia='{$referencia}',Nombre_contacto='{$nomcon}',Tlf_contacto='{$tlfcont}'";
       $sql .= " WHERE Id='{$id}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Cliente actualizado con éxito.");
       redirect('inicio.php?open=Clientes',false);
     } else {
       $session->msg("d", "Lo siento, actualización falló.");
       redirect('inicio.php?open=Clientes',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('inicio.php?open=Clientes',false);
  }
}
?>