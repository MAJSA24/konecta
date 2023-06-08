<?php
require_once "db.class.php";

class categoria extends database {

  function categoria(){}

  function total_reg(){

	 $this->conectar();
   $query = $this->consulta("select * from categoria");

   return ($this->numero_de_filas($query));
   
   $this->disconnect();

	}

 //---------------------------------

	function det_categorias($inicio){
	
  $data=array();
          
	$this->conectar();		
		
  $query = $this->consulta("select * from categoria 
                            order by codigo limit ".$inicio.",10");
    	
  if($this->numero_de_filas($query) > 0){
			
			while ($Array = $this->fetch_assoc($query) ) 
				$data[] = $Array;			                             
	}
		return $data;
	
  
  $this->disconnect();
  }
	
}

?>
