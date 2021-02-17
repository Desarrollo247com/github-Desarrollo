<?php

// Conexion a la base de datos
require_once('includes/load.php');


	
    
    

  if(isset($_POST['add_cliente'])){
      
      

   $req_fields = array('title', 'color', 'start', 'end','hora');
   validate_fields($req_fields);

   if(empty($errors)){
     $title   = remove_junk($db->escape($_POST['title']));
     $color=remove_junk($db->escape($_POST['color']));
     $start   = remove_junk($db->escape($_POST['start']));
    $end   = remove_junk($db->escape($_POST['end']));
    $hora=   remove_junk($db->escape($_POST['hora']));
     $cliente= (int)$db->escape($_POST['cliente']);
       
       
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
 
//Ejemplo de uso
 
$codigo=generarCodigo(10); // genera un código de 6 caracteres de longitud.

       
       
       
        $query = "INSERT INTO events (";
        $query .="title,color, start, end,hora, Id_cliente,Status,codigo";
        $query .=") VALUES (";
        $query .=" '{$title}','{$color}' ,'{$start}', '{$end}','{$hora}' ,'{$cliente}','0','{$codigo}'";
        $query .=")";
       
        if($db->query($query)){
          //sucess
          $session->msg('s'," Su reservación ha sido creada");
        header("Location:pedido.php?codigo=$codigo",TRUE,301);
        } else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
             header('Location: '.$_SERVER['HTTP_REFERER']);
       
        }
   } else {
     $session->msg("d", $errors);
        header('Location: '.$_SERVER['HTTP_REFERER']);
    
   }
 }


	 
 
?>