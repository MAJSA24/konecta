<?php
require_once "db.class.php";

class producto extends database {

  function producto(){}

  function total_reg(){

	 $this->conectar();
   $query = $this->consulta("select * from producto");

   return ($this->numero_de_filas($query));
   
   $this->disconnect();

	}

 //---------------------------------

	function det_productos($inicio){
	
  $data=array();
          
	$this->conectar();		
		
  $query = $this->consulta("select * from producto 
                            order by id limit ".$inicio.",10");
    	
  if($this->numero_de_filas($query) > 0){
			
			while ($Array = $this->fetch_assoc($query) ) 
				$data[] = $Array;			                             
	}
		return $data;
	
  
  $this->disconnect();
  }
	
}

?>
