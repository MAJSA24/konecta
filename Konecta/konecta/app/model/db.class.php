<?php

class database{

private $conexion;

public function conectar(){
           
      if(!isset($this->conexion)){ 
           
         $this->conexion = new mysqli('localhost','factory_majosa','majosa24091970','factory_konecta'); 
        
      }
 }

//---------------------------------
 
public function consulta($sql){
                 
     $resultado =$this->conexion->query($sql); 
      
      if(!$resultado){
           echo 'Error :'.$sql.$this->conexion->connect_errno;
           exit;
      }
      
     return $resultado;
}

 //----------------------------------

function numero_de_filas($result){
     return $result->num_rows;
}

//----------------------------------

function fetch_assoc($result){
      return $result->fetch_assoc();
}

//----------------------------------

public function disconnect(){
       mysqli_close($this->conexion);
}
  
}


?>
