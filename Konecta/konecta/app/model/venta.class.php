<?php
require_once "db.class.php";

class venta extends database {

  function venta(){}

  function total_reg(){

	 $this->conectar();
   $query = $this->consulta("select * from venta");

   return ($this->numero_de_filas($query));
   
   $this->disconnect();

	}

 //---------------------------------

	function det_ventas($inicio){
	
  $data=array();
          
	$this->conectar();		
		
  $query = $this->consulta("select * from venta 
                            order by fecha limit ".$inicio.",10");
    	
  if($this->numero_de_filas($query) > 0){
			
			while ($Array = $this->fetch_assoc($query) ) 
				$data[] = $Array;			                             
	}
		return $data;
	
  
  $this->disconnect();
  }
	
}

?>
