<?php
  //require_once('/includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1";
    
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}


/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT Id_usuario,Nombre_usuario,Clave_usuario,Nivel_usuario FROM Tbl_usuarios WHERE Nombre_usuario ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['Clave_usuario'] ){
        return $user['Id_usuario'];
      }
    }
   return false;
  }
  
  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }

  /*--------------------------------------------------------------*/
  /* Find brand according to model
  /* 
  /*--------------------------------------------------------------*/
  function find_model(){
      global $db;
      $results = array();
      $sql = "SELECT m.*,a.Descripcion as Marca FROM tbl_marca a, tbl_modelo m WHERE a.Id=m.Id_marca";
      $result = find_by_sql($sql);
      return $result;
  }


    /*--------------------------------------------------------------*/
  /* Find brand active
  /* 
  /*--------------------------------------------------------------*/
  function find_brand_active(){
      global $db;
      $results = array();
      $sql = "SELECT * FROM tbl_marca WHERE Estado=1";
      $result = find_by_sql($sql);
      return $result;
  }

      /*--------------------------------------------------------------*/
  /* Find destination active
  /* 
  /*--------------------------------------------------------------*/
  function find_detination_active(){
      global $db;
      $results = array();
      $sql = "SELECT * FROM tbl_categoriadestino WHERE Estado=1";
      $result = find_by_sql($sql);
      return $result;
  }


  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE Tbl_usuarios SET Fecha_actulizacion='{$date}' WHERE Id_usuario ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

 /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateProducto($id)
	{
		global $db;
   
    $sql = "UPDATE events SET Status='1' WHERE codigo='{$id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}


 /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateCancela($id)
	{
		global $db;
   
    $sql = "UPDATE events SET Status='2' WHERE codigo ='{$id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM Tbl_user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['Nivel_usuario']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('../index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.cost_price,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT e.id, c.Nombre,e.codigo,e.start,a.sale_price,a.quantity,a.cost_price,p.cantidad AS pedido,a.quantity * a.cost_price AS CostoTotal,p.cantidad * a.quantity AS  Unidades,sum((p.cantidad* a.quantity) * a.cost_price) AS CostoPedido ,sum(p.cantidad * a.sale_price) AS VentaPedido,SUM((p.cantidad * a.sale_price) - ((p.cantidad* a.quantity) * a.cost_price)) AS Ganancia, e.Status
FROM pedido p, events e,customer c,products a  WHERE p.Npedido=e.codigo AND   e.Id_cliente=c.Id AND   a.id=p.id_producto and  e.Status=0  GROUP BY c.Nombre,e.codigo,DATE(e.start) ORDER BY DATE(e.start) Asc";
   
   return find_by_sql($sql);
 }

/*--------------------------------------------------------------*/
 /* Function listado pedido
 /*--------------------------------------------------------------*/

function ListadoPedido(){
    global $db;
    $sql="SELECT e.title,e.`start`,e.hora,c.Nombre,c.Nombre_contacto,e.codigo,e.`Status` FROM events e,customer c WHERE e.Id_cliente=c.Id";
    return find_by_sql($sql);
}

 /*--------------------------------------------------------------*/
 /* Function for report sales
 /*--------------------------------------------------------------*/
 function report_sale($start_date,$end_date){
   global $db;
$start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
   $sql  = "SELECT c.Nombre,e.codigo,e.start,a.sale_price,a.quantity,a.cost_price,p.cantidad AS pedido,a.quantity * a.cost_price AS CostoTotal,p.cantidad * a.quantity AS  Unidades,sum((p.cantidad* a.quantity) * a.cost_price) AS CostoPedido ,sum(p.cantidad * a.sale_price) AS VentaPedido,SUM((p.cantidad * a.sale_price) - ((p.cantidad* a.quantity) * a.cost_price)) AS Ganancia
FROM pedido p, events e,customer c,products a  WHERE p.Npedido=e.codigo AND   e.Id_cliente=c.Id AND   a.id=p.id_producto AND   e.Status=1 and e.start BETWEEN '{$start_date}' AND '{$end_date}' GROUP BY c.Nombre,e.codigo,DATE(e.start) ORDER BY DATE(e.start) Asc";
  
   return find_by_sql($sql);
 }

 /*--------------------------------------------------------------*/
 /* Function for count orders
 /*--------------------------------------------------------------*/
 function find_count_order(){
   global $db;
     
      $resultado = array();
       $sql  = "SELECT COUNT(*) AS total FROM events WHERE STATUS='0'";
      $resultado = find_by_sql($sql);
      return $resultado;
     
 
   
  
 }

 /*--------------------------------------------------------------*/
 /* Function for count orders
 /*--------------------------------------------------------------*/
 function find_evento(){
   global $db;
     
      $resultado = array();
       $sql  = "SELECT c.Nombre,e.title, e.`start`,e.`codigo` FROM events e, customer c WHERE c.Id=e.Id_cliente and e.`Status`='0'";
      $resultado = find_by_sql($sql);
      return $resultado;
     
 
   
  
 }





 /*--------------------------------------------------------------*/
 /* Function for count orders
 /*--------------------------------------------------------------*/
 function find_count_entregado(){
   global $db;
     
      $resultado = array();
       $sql  = "SELECT COUNT(*) AS total FROM events WHERE STATUS='1'";
      $resultado = find_by_sql($sql);
      return $resultado;
     
 
   
  
 }

 /*--------------------------------------------------------------*/
 /* Function for count orders
 /*--------------------------------------------------------------*/
 function find_count_cancelado(){
   global $db;
     
      $resultado = array();
       $sql  = "SELECT COUNT(*) AS total FROM events WHERE STATUS='2'";
      $resultado = find_by_sql($sql);
      return $resultado;
     
 
   
  
 }

/*--------------------------------------------------------------*/
 /* Function for count sales
 /*--------------------------------------------------------------*/
 function find_count_ventas(){
   global $db;
     
      $results = array();
       $sql  = "SELECT COUNT(*) AS Venta FROM events WHERE MONTH(end) = MONTH (NOW()) AND YEAR(end) = YEAR(NOW()) and STATUS='1'";
      $result = find_by_sql($sql);
      return $result;
     
 
   
  
 }
/*--------------------------------------------------------------*/
 /* Function for count customer
 /*--------------------------------------------------------------*/
 function find_count_clientes(){
   global $db;
     
      $results = array();
       $sql  = "SELECT COUNT(*) AS Clientes FROM customer";
      $result = find_by_sql($sql);
      return $result;
     
 
   
  
 }

/*--------------------------------------------------------------*/
 /* Function for count products
 /*--------------------------------------------------------------*/
 function find_count_productos(){
   global $db;
     
      $results = array();
       $sql  = "SELECT COUNT(*) AS Productos FROM products";
      $result = find_by_sql($sql);
      return $result;
     
 
   
  
 }

 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  pedido_lista($codigo){
  global $db;
  $sql  = "SELECT p.*,m.descripcion,m.Precio_venta FROM pedido p, mcombos m
WHERE Npedido='{$codigo}' AND m.id=p.id_producto";

 
 
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  consulta_pedido($codigo){
  global $db;

  
  $sql="SELECT d.descripcion,c.Id_pedido,c.cantidad,c.Observaciones FROM pedido c, mcombos d WHERE c.Npedido='{$codigo}' AND c.id_producto=d.id";
 
  return find_by_sql($sql);
}




?>
