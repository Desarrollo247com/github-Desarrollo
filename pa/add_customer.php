<?php
  $page_title = 'Agregar cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_customer = find_all('customer');

?>
<?php
 if(isset($_POST['add_customer'])){
   $req_fields = array('customer-Nombre','customer-tlf','customer-calle','customer-nro', 'customer-tipo' );
   validate_fields($req_fields);
   if(empty($errors)){
       
     $p_Nombre  = remove_junk($db->escape($_POST['customer-Nombre']));
     $p_Rut   = remove_junk($db->escape($_POST['customer-Rut']));
     $p_Tlf   = remove_junk($db->escape($_POST['customer-tlf']));
     $p_email   = remove_junk($db->escape($_POST['customer-email']));
     $p_Region   = remove_junk($db->escape($_POST['regiones']));
     $p_Comuna  = remove_junk($db->escape($_POST['comunas']));
     $p_Tipo  = remove_junk($db->escape($_POST['customer-tipo']));  
     $p_Calle  = remove_junk($db->escape($_POST['customer-calle']));
     $p_Nro  = remove_junk($db->escape($_POST['customer-nro']));
     $p_Referencia= remove_junk($db->escape($_POST['customer-referencia']));
     $p_Nombre_contacto  = remove_junk($db->escape($_POST['customer-nombrecontacto']));   
     $p_Tlf_contacto  = remove_junk($db->escape($_POST['customer-tlfcontacto']));
       
     $date    = make_date();
     $query  = "INSERT INTO customer (";
     $query .=" Nombre,Rut,Tlf,email,Region,Comuna,Tipo,Calle,Nro,Referencia,Nombre_contacto,Tlf_contacto,Fecha_creacion";
     $query .=") VALUES (";
     $query .=" '{$p_Nombre}', '{$p_Rut}','{$p_Tlf}' ,'{$p_email}', '{$p_Region}', '{$p_Comuna}','{$p_Tipo}', '{$p_Calle}','{$p_Nro}','{$p_Referencia}' ,'{$p_Nombre_contacto}','{$p_Tlf_contacto}','{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE Nombre='{$p_Nombre}'";
     if($db->query($query)){
       $session->msg('s',"Cliente agregado exitosamente. ");
       redirect('inicio.php?open=Clientes', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('inicio.php?open=Clientes', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('inicio.php?open=Clientes',false);
   }

 }

?>
<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
            </div>
            <div class="card-body">
		

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
           
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_customer.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="customer-Nombre" placeholder="Nombre y Apellido">
                  <input type="number" class="form-control" name="customer-Rut" placeholder="Rut">
                   
               </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                      <input id="regiones" name="regiones" class="form-control" disabled value="Región Metropolitana de Santiago">
                  </div>
                  <div class="col-md-6">
                     <select id="comunas" name="comunas" class="form-control">
						 <option value="">- Selecciona una Comuna -</option>
					 <option value="Cerrillos">Cerrillos</option>
					 <option value="Cerro Navia">Cerro Navia</option> 
					 <option value="Conchalí">Conchalí</option> 
					 <option value="El Bosque">El Bosque</option>
					 <option value="Estación Central">stación Central</option>
					 <option value="Huechuraba">Huechuraba</option>
					 <option value="Independencia">Independnci</option>
					 <option value="La Cisterna">La Cisterna</option> 
					 <option value="La Florida">La Florida</option>
					 <option value="La Granja">La Granja</option>
					 <option value="La Pintana">La Pintana</option>
					<option value="La Reina">La Reina</option>
					<option value="Las Condes">Las Condes</option> 
					<option value="Lo Barnechea">Lo Barnechea</option>
					<option value="Lo Espejo">Lo Espejo</option>
					<option value="Lo Prado">Lo Prado</option> 
					<option value="Macul">Malcu</option> 
					<option value="Maipú">Maipú</option>
					<option value="Ñuñoa">Ñuñoa</option>
					<option value="Pedro Aguirre Cerda">Pedro AguirreCerda</option>
					<option value="Peñalolén">Peñalolén</option>
					<option value="Providencia">Providencia</option>
					<option value="Pudahuel">Pudahuel</option> 
					<option value="Quilicura">Quilicura</option>
					<option value="Quinta Normal">Quinta Normal</option>
					<option value="Recoleta">Recoleta</option>
					<option value="Renca">Renca</option>
					<option value="San Joaquín">San Joaquín</option>
					<option value=	"San Miguel">San Miguel</option>
					<option value="San Ramón">San Ramón</option> 
					<option value="Vitacura">Vitacura</option>
					<option value="Puente Alto">Puente Alto</option>
					<option value="Pirque">Pirque</option> 
					<option value="San José de Maipo">San José de Maipo</option>
					<option value="Colina">Colina</option>
					<option value="Lampa">Lampa</option>
					<option value="TilVl">TilVl</option>
					<option value="San Bernardo">San Bernardo</option>
					<option value="Buin">Buin</option>
					<option value="Calera de Tango">Calera de Tango</option>
					<option value="Paine">Paine</option>
					<option value=	"Melipilla">Melipilla</option>
					<option value="Alhué">Alhué</option>
					<option value="Curacaví">Curacaví</option>
					<option value="María Pinto">María Pinto</option>
					<option value="San Pedro">San Pedro</option>
					<option value="Talagante">Talagante</option>
					<option value="El Monte">El Monte</option>
					<option value="Isla de Maipo">Isla de Maipo</option> 
					<option value="Padre Hurtado">Padre Hurtado</option>
					<option value="Peñaflor">Peñaflor</option>
					  
					  
					  </select>
                  </div>
                    <br>
                    <br>
                     <div class="col-md-4">    
                    <select class="form-control" name="customer-tipo">
                         <option>- Seleccione Vivienda -</option>
                         <option>Casa</option>
                        <option>Apartamento</option>
                         </select> 
                    </div>
                    <div class="col-md-8">
                     <input type="text" class="form-control" name="customer-calle" placeholder="Calle">
                          </div>
                    
                   
                    <div class="col-md-2">    
                     <input type="number" class="form-control" name="customer-nro" placeholder="Nro">
                        </div>
                     
                    <div class="col-md-8">    

                     <input type="text" class="form-control" name="customer-referencia" placeholder="Referencia">
                    
                  
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-phone"></i>
                     </span>
                     <input type="phone" class="form-control" name="customer-tlf" placeholder="Teléfono">
                  </div>
                 </div>
                       <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="customer-email"  placeholder="Correo electrónico">
                      
                   </div>
                  </div>
                     </div>
                </div>
                  
                          <div class="form-group">
               <div class="row">
            
                       <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>
                      <input type="text" class="form-control" name="customer-nombrecntacto"  placeholder="Nombre persona de contacto">
                      
                   </div>
                  </div>
                        <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-phone"></i>
                     </span>
                     <input type="phone" class="form-control" name="customer-tlfcontacto" placeholder="Teléfono persona contacto">
                  </div>
                 </div>
                     </div>
                </div>
                  
                  
              <button type="submit" name="add_customer" class="btn btn-danger">Agregar Cliente</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

 </div>
          </div>
