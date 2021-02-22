<?php require_once('../includes/load.php');


/*
  listar todos los destinos o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')

{
 $table=$_GET['tabla'];
  $filtre=$_GET['filtro'];


    if (isset($_GET['filtro']))
    {
      //Mostrar un destino
     $consulta = consultasfiltro($table,$filtre);
      header("HTTP/1.1 200 OK");
      echo json_encode($consulta);
      exit();
	  }
    else {

         $consulta=find_all($table);
     
      header("HTTP/1.1 200 OK");
      echo json_encode($consulta);
      exit();
	}
}



//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>