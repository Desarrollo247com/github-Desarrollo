
<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_destino'])){
   $req_field = array('destino-name','destino-descripcion','destino-direccion','destino-latitud','destino-longitud','destino-tiempo');
   validate_fields($req_field);
   $destino_name = remove_junk($db->escape($_POST['destino-name']));
   $destino_descripcion = remove_junk($db->escape($_POST['destino-descripcion']));
   $destino_direccion = remove_junk($db->escape($_POST['destino-direccion']));
   $destino_latitud = remove_junk($db->escape($_POST['destino-latitud']));
   $destino_longitud = remove_junk($db->escape($_POST['destino-longitud'])); 
   $destino_tiempo = remove_junk($db->escape($_POST['destino-tiempo']));
   $destino_estado = remove_junk($db->escape($_POST['destino-estado']));

   $tipo_archivo = $_FILES['file_upload']['type'];
   $tamano_archivo = $_FILES['file_upload']['size'];
   $uploads_dir = '../uploads/sitios';
    $tmp_name=$_FILES['file_upload']['tmp_name'];
   if(empty($errors)){

    if(!empty($tmp_name)){

        $name = basename($_FILES["file_upload"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
      
     $destino_photo=$name;
    } else{
     
      $destino_photo="no_imagen.jpg";
      
    }

      $sql  = "INSERT INTO tbl_destino (Nombre,Descripcion,Direccion,Latitud,Longitud,Tiempo_promedio,Imagen,Estado) VALUES ('{$destino_name}','{$destino_descripcion}','{$destino_direccion}','{$destino_latitud}','{$destino_longitud}','{$destino_tiempo}','{$destino_photo}','{$destino_estado}')";
     
      if($db->query($sql)){
        $session->msg("s", "Destino agregado exitosamente.");
        redirect('inicio.php?open=Destinos',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Destinos',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Destinos',false);
   }
 }
?>