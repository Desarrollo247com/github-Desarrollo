 <?php require_once('../includes/load.php');


/*
  listar todos los destinos o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un destino
     $destino = find_by_id('tbl_destino',$_GET['id']);
      header("HTTP/1.1 200 OK");
      echo json_encode($destino);
      exit();
	  }
    else {

         $destino=find_all('tbl_destino');
     
      header("HTTP/1.1 200 OK");
      echo json_encode($destino );
      exit();
	}
}



//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>