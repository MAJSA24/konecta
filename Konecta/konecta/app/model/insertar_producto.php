<?php
require_once "db.class.php";

if ($_POST['accion']=='mostrar_tabla'){

    $cadena="<center><br>
            <table style='font-size:12px;' border='0' cellspacing='10' cellpadding='0' width='100%'>
            <tr><td>
            <b>CATEGORIA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' onclick=\"mostrar('c_id1','c_id2','categoria',450,310);\" type='text' id='c_id1' size='1'>
            <input style='border-radius:15px;font-weight:bold;text-align:center;background-color: #dfdcdc' type='text' id='c_id2' size='40' readonly=\"readonly\">&emsp;&emsp;

            <b>ID</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='id' size='3'>&emsp;&emsp;
            <b>NOMBRE</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='nombre' size='40'>
            </td>
            </tr>

            <tr>
            <td>
            <b>REFERENCIA</b>
            <input  style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='referencia' size='10' onkeyup = 'this.value=this.value.touppercase()'>&emsp;
            
            <b>PRECIO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='precio' size='10'>&emsp;

            <b>PESO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='peso' size='5'>&emsp;

            <b>STOCK</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='stock' size='5'>&emsp;

            <b>FECHA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='fecha' size='10' placeholder='AAAA-MM-DD'>


            <input type='button' class='button medium blue' name='btngrabar' onclick='grabar();' value=' Grabar '>&emsp;
            <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>

            </td>
            </tr>
            </table></center>

            <div id='dialog' style='background-color:#003366;' title='SELECCIONE CATEGORIA' style='display:none;'></div>";

    echo $cadena;

}

//------------------------------------

if ($_POST['accion']=='grabar_producto'){

    $obj = new database();

    $categoria=$_REQUEST['categoria'];
    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $referencia=$_REQUEST['referencia'];
    $precio=$_REQUEST['precio'];    
    $peso=$_REQUEST['peso'];
    $stock=$_REQUEST['stock'];    
    $fecha=$_REQUEST['fecha'];
    
    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $resultado=$obj->consulta("insert into producto values('".$categoria."','".$id."','".$nombre."','".$referencia."',".$precio.",".$peso.",".$stock.",'". $fecha."')");
    $obj->disconnect();

    if($resultado)
       echo "PRODUCTO REGISTRADO";
       
}
//------------------------------------

if ($_POST['accion']=='actualizar_producto'){

    $obj = new database();

    $categoria=$_REQUEST['categoria'];
    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $referencia=$_REQUEST['referencia'];
    $precio=$_REQUEST['precio'];    
    $peso=$_REQUEST['peso'];
    $stock=$_REQUEST['stock'];    
    $fecha=$_REQUEST['fecha'];
        
    $obj->conectar();
    $obj->consulta("set names 'utf8'");   
    $resultado=$obj->consulta("update producto 
                               set categoria ='".$categoria."',
                               nombre ='".$nombre."',
                               referencia ='".$referencia."',
                               precio =".$precio.",
                               peso=".$peso.",
                               stock=".$stock.",
                               fecha='".$fecha."'
                               where id='".$id."'");

    $obj->disconnect();

    if($resultado){
       echo "PRODUCTO ACTUALIZADO";
       
    }
}

//------------------------------------

if ($_POST['accion']=='borrar_producto'){

    $obj = new database();

    $id=$_POST['codigo'];
    $obj->conectar();
    
    $resultado=$obj->consulta("select * from venta 
                               where producto='".$id."'");
    
    $n=$obj->numero_de_filas($resultado);

    if ($n!=0){
       echo "No se puede Eliminar Producto - Contiene Venta -";
    }
    else{
       $resultado1=$obj->consulta("delete from producto 
                                   where id='".$id."'");

       if($resultado1){
          echo "PRODUCTO ELIMINADO";
       }
    }

    $obj->disconnect();
    
}

//------------------------------------

if ($_POST['accion']=='editar_producto'){


    $obj = new database();

    $id=$_POST['codigo'];
    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $query=$obj->consulta("select * from producto 
                           where id='".$id."'");
                               
    $row = $obj->fetch_assoc($query);

    $query1=$obj->consulta("select * from categoria 
                           where codigo='".$row['categoria']."'");
                               
    $row1 = $obj->fetch_assoc($query1);

    $cadena="<center><br>
            <table style='font-size:12px;' border='0' cellspacing='10' cellpadding='0' width='100%'>
            <tr><td>
            <b>CATEGORIA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' value='".$row['categoria']."' onclick=\"mostrar('c_id1','c_id2','categoria',450,310);\" type='text' id='c_id1' size='1'>
            <input style='border-radius:15px;font-weight:bold;text-align:center;background-color: #dfdcdc' type='text' value='".$row1['descripcion']."' id='c_id2' size='40' readonly=\"readonly\">&emsp;&emsp;

            <b>ID</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' value='".$row['id']."' id='id' size='3'>&emsp;&emsp;
            <b>NOMBRE</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' value='".$row['nombre']."' id='nombre' size='40'>
            </td>
            </tr>

            <tr>
            <td>
            <b>REFERENCIA</b>
            <input  style='border-radius:15px;font-weight:bold;text-align:center;' type='text' value='".$row['referencia']."' id='referencia' size='10' onkeyup = 'this.value=this.value.touppercase()'>&emsp;
            
            <b>PRECIO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' value='".$row['precio']."' id='precio' size='10'>&emsp;

            <b>PESO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='peso' value='".$row['peso']."' size='5'>&emsp;

            <b>STOCK</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' value='".$row['stock']."' id='stock' size='5'>&emsp;

            <b>FECHA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' value='".$row['fecha']."' id='fecha' size='10'>


            <input type='button' class='button medium blue' name='btngrabar' onclick='Actualizar();' value=' Actualizar '>&emsp;
            <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>

            </td>
            </tr>
            </table></center>

            <div id='dialog' style='background-color:#003366;' title='SELECCIONE CATEGORIA' style='display:none;'></div>";

    
    echo $cadena;
    
    $obj->disconnect();
}


?>
