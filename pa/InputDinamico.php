<?php  require_once('includes/load.php');

$productos=find_all('categories');
 ?>   
    
   
<div class="lista-producto float-clear" style="clear:both;">
 <ul class="list-group">
   <li class="list-group-item">
       <div class="row">
       
<div class="float-left"><input type="checkbox" name="item_index[]" /></div>
<div class="float-left col-md-5">
     <select id="cliente" name="pro_nombre[]" class="form-control">  <option value="">Selecciona un producto</option>
                    <?php  foreach ($productos as $prod): ?>
                      <option value="<?php echo (int)$prod['id'] ?>">
                        <?php echo $prod['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
    
    </div>
<div class="float-left col-xs-3"><input class="form-control" type="number" placeholder="Cantidad" name="pro_cantidad[]" style="width:110px;"/></div>
<div class="float-left col-xs-4"><input class="form-control" placeholder="Observación" type="textarea" name="item_observacion[]" /></div> 
           
           
           </div>
	</li>
 </ul> 
</div>