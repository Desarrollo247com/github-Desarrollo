


<?php
 require_once('includes/load.php');
$codigo=$_GET['codigo'];

	if(!empty($_POST["guardar"])) {
	  
		$contador = count($_POST["pro_nombre"]);
        $pedido='0';
		$ProContador=0;
		$query = "INSERT INTO pedido (Npedido,id_producto,cantidad,status,Observaciones) VALUES ";
		$queryValue = "";
		for($i=0;$i<$contador;$i++) {
			if(!empty($_POST["pro_nombre"][$i]) || !empty($_POST["pro_cantidad"][$i])) {
				$ProContador++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $codigo . "','" . $_POST["pro_nombre"][$i] . "', '" . $_POST["pro_cantidad"][$i] . "','" . $pedido . "','" . $_POST["item_observacion"][$i] . "')";
			}
		}
		$sql = $query.$queryValue;
		if($ProContador!=0) {
		    $resultadocon =$db->query($sql);
			if(!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
   <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
		}
	}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Crear pedidos</title>

<!-- Bootstrap core CSS -->
<link href="input/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="input/assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="input/assets/style.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<script>
function AgregarMas() {
	$("<div>").load("InputDinamico2.php", function() {
			$("#productos").append($(this).html());
	});	
}
function BorrarRegistro() {
	$('div.lista-producto').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</script>

</head>

<body>


<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Pedidos</h3>
  <hr>
  <div class="row">
    <div class="col-md-12"> 
      <!-- Contenido -->
      


<form name="frmProduct" method="post" action="">
<div id="outer">
<div id="header">

Pedido Nro. <?php echo $codigo; ?>
</div>
<div id="productos">
<?php require_once("InputDinamico2.php") 
      ?>
</div>
<div class="btn-action float-clear">
   
<input class="btn btn-success" type="button" name="agregar_registros" value="Agregar combo" onClick="AgregarMas();" />
<input class="btn btn-danger" type="button" name="borrar_registros" value="Borrar combo" onClick="BorrarRegistro();" />
<span class="success"><?php if(isset($resultado)) { echo $resultado; }?></span>
</div>
<div style="position: relative;">

<input class="btn btn-primary" type="submit" name="guardar" value="Guardar Ahora" />
</div>
</div>
        
</form>


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
  
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="input/dist/js/bootstrap.min.js"></script>
</body>
</html>