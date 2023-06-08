<?php
require_once "db.class.php";

if ($_POST['accion']=='mostrar_tabla'){

    $cadena="<center>
            <br>
            <table style='font-size:12px;font-weight:bold;text-align:center;' border='0' cellspacing='0' cellpadding='0' width='60%'>            
            <tr><td colspan='4'></td></tr>
            
            <tr>
            <td><b>CODIGO</b></td><td>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='codigo' size='2'>
            </td>
     
            <td><b>DESCRIPCI&Oacute;N</b></td>
            <td><input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='descripcion' size='40'>
            </td>
       
            </tr>
           
           <tr>
           <td colspan='4' align='center'><br>
           <input type='button' class='button medium blue' name='btngrabar' onclick='Grabar();' value=' Grabar '>
           <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>
           </td>
           </tr>
           </table>
           <center>";
    
    echo $cadena;

}

//------------------------------------

if ($_POST['accion']=='grabar_categoria'){

    $obj = new database();

    $codigo=$_REQUEST['codigo'];
    $descripcion=$_REQUEST['descripcion'];

    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $resultado=$obj->consulta("insert into categoria values('".$codigo."','". $descripcion."')");
    $obj->disconnect();

    if($resultado)
       echo "REGISTRO GRABADO";
       
}
//------------------------------------

if ($_POST['accion']=='actualizar_categoria'){

    $obj = new database();

    $codigo=$_POST['codigo'];
    $descripcion=$_POST['descripcion'];
        
    $obj->conectar();
    $obj->consulta("set names 'utf8'");   
    $resultado=$obj->consulta("update categoria 
                               set descripcion ='".$descripcion."'
                               where codigo='".$codigo."'");

    $obj->disconnect();

    if($resultado){
       echo "CATEGORIA ACTUALIZADA";
       
    }
}

//------------------------------------

if ($_POST['accion']=='borrar_categoria'){

    $obj = new database();

    $codigo=$_POST['codigo'];
    $obj->conectar();
    
    $resultado=$obj->consulta("select * from producto 
                               where categoria='".$codigo."'");
    
    $n=$obj->numero_de_filas($resultado);

    if ($n!=0){
       echo "No se puede Eliminar Categoria - Contiene Productos -";
    }
    else{
       $resultado1=$obj->consulta("delete from categoria 
                                   where codigo='".$codigo."'");

       if($resultado1){
          echo "CATEGORIA ELIMINADA";
       }
    }

    $obj->disconnect();
    
}

//------------------------------------

if ($_POST['accion']=='editar_categoria'){


    $obj = new database();

    $codigo=$_POST['codigo'];
    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $query=$obj->consulta("select * from categoria 
                           where codigo='".$codigo."'");
                           
    $obj->disconnect();
    
    $row = $obj->fetch_assoc($query);

    $cadena="<center>
            <br>
            <table style='font-size:12px;font-weight:bold;text-align:center;' border='0' cellspacing='0' cellpadding='0' width='60%'>            
            <tr><td colspan='4'></td></tr>
            
            <tr>
            <td><b>CODIGO</b></td><td>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' value='".$row['codigo']."' id='codigo' size='2'>
            </td>
     
            <td><b>DESCRIPCI&Oacute;N</b></td>
            <td><input style='border-radius:15px;font-weight:bold;text-align:center;' value='".$row['descripcion']."' type='text' id='descripcion' size='40'>
            </td>
       
            </tr>
           
           <tr>
           <td colspan='4' align='center'><br>
           <input type='button' class='button medium blue' name='btngrabar' onclick='Actualizar();' value=' Actualizar '>
           <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>
           </td>
           </tr>
           </table>
           <center>";
    
    echo $cadena;

}


?>
