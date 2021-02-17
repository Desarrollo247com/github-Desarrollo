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
            
        case 'Clientes' :
			if(!file_exists ("clientes.php")) die ("Página principal vacía!");
			include "clientes.php"; break;  

		case 'Agregarclientes' :
			if(!file_exists ("add_customer.php")) die ("Página principal vacía!");
			include "add_customer.php"; break;
            
        case 'Editarclientes' :
			if(!file_exists ("editar_clientes.php")) die ("Página principal vacía!");
			include "editar_clientes.php"; break;   
            
		case 'Medias' :
			if(!file_exists ("media.php")) die ("Página principal vacía!");
			include "media.php"; break;   
            
        case 'Usuarios' :
			if(!file_exists ("users.php")) die ("Página principal vacía!");
			include "users.php"; break;   
        
         case 'Crea_usuarios' :
			if(!file_exists ("add_user.php")) die ("Página principal vacía!");
			include "add_user.php"; break;  
            
        case 'Edita_usuarios' :
			if(!file_exists ("edit_user.php")) die ("Página principal vacía!");
			include "edit_user.php"; break;  
            
		 case 'Pedido' :
			if(!file_exists ("pedido.php")) die ("Página principal vacía!");
			include "pedido.php"; break;  
            
         case 'Reportes' :
			if(!file_exists ("filtroreportes.php")) die ("Página principal vacía!");
			include "filtroreportes.php"; break; 
            
        case 'Resultados' :
			if(!file_exists ("reportes.php")) die ("Página principal vacía!");
			include "reportes.php"; break;  
			
		case 'Perfil' :
			if(!file_exists ("profile.php")) die ("Página principal vacía!");
			include "profile.php"; break;
			case 'Cuenta' :
			if(!file_exists ("edit_account.php")) die ("Página principal vacía!");
			include "edit_account.php"; break;		
            
           case 'Pedidos' :
			if(!file_exists ("listadopedidos.php")) die ("Página principal vacía!");
			include "listadopedidos.php"; break;    
		
			  case 'Clave' :
			if(!file_exists ("change_password.php")) die ("Página principal vacía!");
			include "change_password.php"; break; 
			
			 case 'edita_entrega' :
			if(!file_exists ("entrega.php")) die ("Página principal vacía!");
			include "entrega.php"; break; 
			
			 case 'cancela_entrega' :
			if(!file_exists ("cancela.php")) die ("Página principal vacía!");
			include "cancela.php"; break;
            
            case 'Revisar' :
			if(!file_exists ("revisarpedidos.php")) die ("Página principal vacía!");
			include "revisarpedidos.php"; break;
            
            case 'modifica' :
			if(!file_exists ("modifica_pedido.php")) die ("Página principal vacía!");
			include "modifica_pedido.php"; break;
			
            case 'agrega_evento' :
			if(!file_exists ("modifica_pedido.php")) die ("Página principal vacía!");
			include "modifica_pedido.php"; break;
            
             case 'Combo' :
			if(!file_exists ("combo.php")) die ("Página principal vacía!");
			include "combo.php"; break;
            
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