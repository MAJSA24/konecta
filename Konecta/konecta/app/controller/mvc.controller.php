<?php
require 'app/model/categoria.class.php';
require 'app/model/producto.class.php';
require 'app/model/venta.class.php';

class mvc_controller {
   
    function mostrar_categorias($inicio){
		
    $categoria = new categoria();
		
    //carga la plantilla 
		$pagina=$this->load_template('','page.php');

	  //obtiene  los registros de la base de datos
		  ob_start();

    //Calcula el Total de Categorias
      $total_categorias=$categoria->total_reg();

		//realiza consulta al modelo
		  $Array = $categoria->det_categorias($inicio);
	   		
      if($Array!=''){  //si existen registros carga el modulo  en memoria y rellena con los datos
			   
         $titulo = 'CATEGORIAS';
			   //carga la tabla de la seccion de VIEW
			   
         include 'app/views/default/modules/m.table_categoria.php';

         $table = ob_get_clean();
			   //realiza el parseado
			   $pagina = $this->replace_content('/\#CONTENIDO\#/', $table , $pagina);

    }

    $this->view_page($pagina);
   }

   
   
    function mostrar_productos($inicio){
		
    $producto = new producto();
		
    //carga la plantilla 
		$pagina=$this->load_template('','page_producto.php');

	  //obtiene  los registros de la base de datos
		  ob_start();

    //Calcula el Total de Productos
      $total_productos=$producto->total_reg();

		//realiza consulta al modelo
		  $Array = $producto->det_productos($inicio);
	   		
      if($Array!=''){  //si existen registros carga el modulo  en memoria y rellena con los datos
			   
         $titulo = 'PRODUCTOS';
			   //carga la tabla de la seccion de VIEW
			   
         include 'app/views/default/modules/m.table_producto.php';

         $table = ob_get_clean();
			   //realiza el parseado
			   $pagina = $this->replace_content('/\#CONTENIDO\#/', $table , $pagina);

    }

    $this->view_page($pagina);
   }

   
   
   
    function mostrar_ventas($inicio){
		
    $venta = new venta();	
		$pagina=$this->load_template('','page_venta.php');

		ob_start();
    $total_ventas=$venta->total_reg();
		$Array = $venta->det_ventas($inicio);
	   		
    if($Array!=''){  
			   
         $titulo = 'VENTAS';
			   
         include 'app/views/default/modules/m.table_venta.php';

         $table = ob_get_clean();
			   $pagina = $this->replace_content('/\#CONTENIDO\#/', $table , $pagina);

    }

    $this->view_page($pagina);
   }

   function principal() {
   
		$pagina=$this->load_template('','page.php');
		$html = $this->load_page('app/views/default/modules/m.principal.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/' ,$html , $pagina);
		$this->view_page($pagina);
   
   }

	function load_template($title='',$page=''){
  
		$pagina = $this->load_page('app/views/default/'.$page);
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$pagina = $this->replace_content('/\#HEADER\#/' ,$header , $pagina);
		$pagina = $this->replace_content('/\#TITLE\#/' ,$title , $pagina);
		$menu_left = $this->load_page('app/views/default/sections/s.menuizquierda.php');
		$pagina = $this->replace_content('/\#MENULEFT\#/' ,$menu_left , $pagina);
		return $pagina;
	
  }
	
	private function load_page($page){
		return file_get_contents($page);
	}
  
	private function view_page($html){
		echo $html;
	}

  private function replace_content($in='/\#CONTENIDO\#/', $out,$pagina){
		 return preg_replace($in, $out, $pagina);	 	
	}
	
}
?>
