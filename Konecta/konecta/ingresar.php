<?php
  require'seguridad.php';
	require 'app/controller/mvc.controller.php';

	$mvc = new mvc_controller();

	if( $_GET['action']=='categoria'){
	    
      if (isset($_REQUEST['pos']))
         $inicio=$_REQUEST['pos'];
      else
          $inicio=0;

      $mvc->mostrar_categorias($inicio);
	}

	if( $_GET['action']=='producto'){
	    
      if (isset($_REQUEST['pos']))
         $inicio=$_REQUEST['pos'];
      else
          $inicio=0;

      $mvc->mostrar_productos($inicio);
	}
  
  
	if( $_GET['action'] == 'venta' ){
	    
      if (isset($_REQUEST['pos']))
         $inicio=$_REQUEST['pos'];
      else
          $inicio=0;

      $mvc->mostrar_ventas($inicio);
	}
  
  if( $_GET['action'] == '' ){ //Si no existe GET o POST -> muestra la pagina principal
		$mvc->principal();
	}

?>
