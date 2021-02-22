<?php
if(isset($_GET['open'])) {
	switch($_GET['open']){
		case '' :
			if(!file_exists ("../views/main.php")) die ("Página principal vacía!");
			include "main.php"; break;
		

		case 'Main' :
			if(!file_exists ("main.php")) die ("Página principal vacía!");
			include "main.php"; break;

		case 'Marcas' :
			if(!file_exists ("marcas.php")) die ("Página principal vacía!");
			include "marcas.php"; break;

		case 'Modelos' :
			if(!file_exists ("modelos.php")) die ("Página principal vacía!");
			include "modelos.php"; break;	
			
		case 'Insignias' :
			if(!file_exists ("insignias.php")) die ("Página principal vacía!");
			include "insignias.php"; break;			

       	case 'EditaMarca' :
			if(!file_exists ("editar_marcas.php")) die ("Página principal vacía!");
			include "editar_marcas.php"; break;

		case 'EditaModelo' :
			if(!file_exists ("editar_modelos.php")) die ("Página principal vacía!");
			include "editar_modelos.php"; break;
			
		case 'EditaInsignia' :
			if(!file_exists ("editar_insignias.php")) die ("Página principal vacía!");
			include "editar_insignias.php"; break;	
            
            
		case 'Destinos' :
			if(!file_exists ("destinos.php")) die ("Página principal vacía!");
			include "destinos.php";	 break;
         
		case 'EditaDestino' :
		if(!file_exists ("editar_destino.php")) die ("Página principal vacía!");
		include "editar_destino.php";	 break;
            
        case 'Caracteristicas' :
			if(!file_exists ("caracteristicas.php")) die ("Página principal vacía!");
			include "caracteristicas.php"; break;   
		
		 case 'EditaCaracteristica' :
			if(!file_exists ("editar_caracteristicas.php")) die ("Página principal vacía!");
			include "editar_caracteristicas.php"; break;    	
            
          	case 'Editar_categoria' :
			if(!file_exists ("edit_categorie.php")) die ("Página principal vacía!");
			include "edit_categorie.php"; break; 
            
        	
		case 'TipoVehiculo' :
			if(!file_exists ("tipovehiculo.php")) die ("Página principal vacía!");
			include "tipovehiculo.php"; break; 
		
			case 'EditaTipo' :
			if(!file_exists ("editar_tipo.php")) die ("Página principal vacía!");
			include "editar_tipo.php"; break; 
			
			case 'CategoriaDestino' :
			if(!file_exists ("categorias_destinos.php")) die ("Página principal vacía!");
			include "categorias_destinos.php"; break; 

			case 'EditaCategoriaDestino' :
			if(!file_exists ("editar_categoria_destino.php")) die ("Página principal vacía!");
			include "editar_categoria_destino.php"; break;
			
			case 'Registro' :
			if(!file_exists ("registro_afiliados.php")) die ("Página principal vacía!");
			include "registro_afiliados.php"; break; 

			default:
			if(!file_exists ("../views/main.php")) die ("Página principal vacía!");
			include "main.php";	 break;
	}
}
else {
	if(!file_exists ("../views/main.php")) die ("Página principal vacía!");
			include "../views/main.php";	 //break;
}
?>