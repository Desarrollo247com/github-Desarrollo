
<?php
  require_once('../includes/load.php');

 if(isset($_POST['add_insignia'])){
   $req_field = array('insignia-name','insignia-puntos','insignia-estado');
   validate_fields($req_field);
   $insignia_name = remove_junk($db->escape($_POST['insignia-name']));
   $insignia_puntos = remove_junk($db->escape($_POST['insignia-puntos']));
   $insignia_status = remove_junk($db->escape($_POST['insignia-estado']));
   
   $tipo_archivo = $_FILES['file_upload']['type'];
   $tamano_archivo = $_FILES['file_upload']['size'];
   $uploads_dir = '../uploads/insignias';
    $tmp_name=$_FILES['file_upload']['tmp_name'];
   if(empty($errors)){

    if(!empty($tmp_name)){

        $name = basename($_FILES["file_upload"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
      
     $insignia_photo=$name;
    } else{
     
      $insignia_photo="no_imagen.jpg";
      
    }

      $sql  = "INSERT INTO tbl_insignias (Descripcion,Puntuacion,Imagen,Estado) VALUES ('{$insignia_name}','{$insignia_puntos}','{$insignia_photo}','{$insignia_status}')";
     
      if($db->query($sql)){
        $session->msg("s", "insignia agregada exitosamente.");
        redirect('inicio.php?open=Insignias',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('inicio.php?open=Insignias',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('inicio.php?open=Insignias',false);
   }
 }
?>


