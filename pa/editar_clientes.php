<?php
  $page_title = 'Editar Clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $customer = find_by_id('customer',(int)$_GET['Id']);
  if(!$customer){
    $session->msg("d","Missing Customer Id.");
    redirect('inicio.php?open=Clientes');
  }
?>


<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <div class="card-body">
                
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>

     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editando <?php echo remove_junk(ucfirst($customer['Nombre']));?></span>
        </strong>
       </div>
       <div class="panel-body">
           
         <form method="post" action="editar_customer.php?Id=<?php echo (int)$customer['Id'];?>"  class="clearfix" >
             
             
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="customer-Nombre" placeholder="Nombre y Apellido" value="<?php echo remove_junk(ucfirst($customer['Nombre']));?>">
                  <input type="number" class="form-control" name="customer-Rut" placeholder="Rut"  value="<?php echo remove_junk(ucfirst($customer['Rut']));?>">
                   
               </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                      <select id="regiones" name="regiones" class="form-control" disabled >
                      <option><?php echo remove_junk(ucfirst($customer['Region']));?></option>
                      </select>
                  </div>
                  <div class="col-md-6">
                     <select id="comunas" name="comunas" class="form-control" disabled>
                      <option><?php echo remove_junk(ucfirst($customer['Comuna']));?></option>
                      </select>
                  </div>
                    <br>
                    <br>
                     <div class="col-md-4">    
                    <select class="form-control" name="customer-tipo">
                         <option><?php echo remove_junk(ucfirst($customer['Tipo']));?>
                         <option>Casa</option>
                        <option>Apartamento</option>
                         </select> 
                    </div>
                    <div class="col-md-8">
                     <input type="text" class="form-control" name="customer-calle" placeholder="Calle" value="<?php echo remove_junk(ucfirst($customer['Calle']));?>">
                          </div>
                    
                   
                    <div class="col-md-2">    
                     <input type="number" class="form-control" name="customer-nro" placeholder="Nro" value="<?php echo remove_junk(ucfirst($customer['Nro']));?>">
                        </div>
                     
                    <div class="col-md-8">    

                     <input type="text" class="form-control" name="customer-referencia" placeholder="Referencia" value="<?php echo remove_junk(ucfirst($customer['Referencia']));?>">
                    
                  
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-phone"></i>
                     </span>
                     <input type="phone" class="form-control" name="customer-tlf" placeholder="Teléfono" value="<?php echo remove_junk(ucfirst($customer['Tlf']));?>">
                  </div>
                 </div>
                       <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="customer-email"  placeholder="Correo electrónico" value="<?php echo remove_junk(ucfirst($customer['email']));?>">
                      
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
                      <input type="text" class="form-control" name="customer-nombrecontacto"  placeholder="Nombre persona de contacto" value="<?php echo remove_junk(ucfirst($customer['Nombre_contacto']));?>">
                      
                   </div>
                  </div>
                        <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-phone"></i>
                     </span>
                     <input type="phone" class="form-control" name="customer-tlfcontacto" placeholder="Teléfono persona contacto" value="<?php echo remove_junk(ucfirst($customer['Tlf_contacto']));?>">
                  </div>
                 </div>
                     </div>
                              
                </div>
                  
                  
              <button type="submit" name="edit_customer" class="btn btn-primary">Actualizar cliente</button>
         
             
         
         
           </form></div>
     </div>
   </div>
</div>

 </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      

