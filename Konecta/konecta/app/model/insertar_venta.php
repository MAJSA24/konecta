<?php
require_once "db.class.php";

if ($_POST['accion']=='mostrar_tabla'){

    $cadena="<center><br>
            <table style='font-size:12px;' border='0' cellspacing='5' cellpadding='0' width='70%'>
            <tr><td>
            
            <b>FECHA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' id='fecha' size='10' placeholder='AAAA-MM-DD'>&emsp;            
            
            <b>PRODUCTO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' onclick=\"mostrar('p_id1','p_id2','precio','producto',450,310);\" type='text' id='p_id1' size='1'>
            <input style='border-radius:15px;font-weight:bold;text-align:center;background-color: #dfdcdc' type='text' id='p_id2' size='40' readonly=\"readonly\">&emsp;
            </td>
            </tr> 
                      
            
            <tr>
            <td>           
            <b>CANTIDAD</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' onBlur='calcular();' type='text' id='cantidad' size='3'>

            <b>PRECIO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='precio' size='10' readonly='readonly'>&emsp;

            <b>TOTAL</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='total' size='5' readonly='readonly'>&emsp;


            <input type='button' class='button medium blue' name='btngrabar' onclick='grabar();' value=' Grabar '>&emsp;
            <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>

            </td>
            </tr>
            </table></center>

            <div id='dialog' style='background-color:#003366;' title='SELECCIONE PRODUCTO' style='display:none;'></div>";

    echo $cadena;

}

//------------------------------------

if ($_POST['accion']=='grabar_venta'){

    $obj = new database();

    $fecha=$_REQUEST['fecha'];
    $producto=$_REQUEST['producto'];
    $cantidad=$_REQUEST['cantidad'];
    $precio=$_REQUEST['precio'];    
    $total=$_REQUEST['total'];
      
    $obj->conectar();
    $resultado=$obj->consulta("insert into venta(fecha,producto,cantidad,precio,total) 
                    values('".$fecha."','".$producto."',".$cantidad.",".$precio.",".$total.")");
    
    $obj->consulta("UPDATE producto SET stock=(stock-".$cantidad.") WHERE id='".$producto."'"); 
                    
    
    if($resultado)
       echo "VENTA REGISTRADA";
           
    $obj->disconnect();


       
}
//------------------------------------

if ($_POST['accion']=='actualizar_venta'){

    $obj = new database();

    $fecha=$_REQUEST['fecha'];
    $orden=$_REQUEST['orden']; 
       
    $obj->conectar();  
    $resultado=$obj->consulta("update venta 
                               set fecha ='".$fecha."'
                               where orden=".$orden);

    if($resultado)
       echo "FECHA ACTUALIZADA";
 
    $obj->disconnect();       
}

//------------------------------------

if ($_POST['accion']=='borrar_venta'){

    $obj = new database();

    $orden=$_POST['orden'];
    $obj->conectar();
    
    $resultado1=$obj->consulta("delete from venta where orden=".$orden);

    if($resultado1){
       echo "VENTA ELIMINADA";

    }

    $obj->disconnect();
    
}

//------------------------------------

if ($_POST['accion']=='editar_venta'){


    $obj = new database();

    $orden=$_POST['orden'];
    
    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $query=$obj->consulta("select * from venta 
                           WHERE orden=".$orden);
                               
    $row = $obj->fetch_assoc($query);

    $query1=$obj->consulta("select * from producto 
                           where id='".$row['producto']."'");
                               
    $row1 = $obj->fetch_assoc($query1);

    $cadena="<center><br>
            <table style='font-size:12px;' border='0' cellspacing='5' cellpadding='0' width='70%'>
            <tr><td>
            
            <b>FECHA</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' type='text' value='".$row['fecha']."' id='fecha' size='10'>&emsp;            
            
            <b>PRODUCTO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' onclick=\"mostrar('p_id1','p_id2','precio','producto',450,310);\" type='text' value='".$row['producto']."' id='p_id1' size='1'>
            <input style='border-radius:15px;font-weight:bold;text-align:center;background-color: #dfdcdc' type='text' value='".$row1['nombre']."' id='p_id2' size='50' readonly=\"readonly\">&emsp;
            </td>
            </tr> 
                      
            
            <tr>
            <td>           
            <b>CANTIDAD</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center;' onBlur='calcular();' type='text' value='".$row['cantidad']."' id='cantidad' size='3'>

            <b>PRECIO</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='precio' size='10' value='".$row['precio']."' readonly='readonly'>&emsp;

            <b>TOTAL</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' id='total' size='5' value='".$row['total']."' readonly='readonly'>&emsp;

            <b>No.</b>
            <input style='border-radius:15px;font-weight:bold;text-align:center; type='text' value='".$row['orden']."' id='orden' size='2' readonly='readonly'>&emsp;


            <input type='button' class='button medium blue' name='btngrabar' onclick='Actualizar();' value=' Actualizar '>&emsp;
            <input type='button' class='button medium blue' name='btnlimpiar' onclick='Limpiar();' value=' Limpiar '>

            </td>
            </tr>
            </table></center>

            <div id='dialog' style='background-color:#003366;' title='SELECCIONE PRODUCTO' style='display:none;'></div>";

    echo $cadena;
    
    $obj->disconnect();
}

//------------------------------------

if ($_POST['accion']=='verificar_stock'){
    
    $obj = new database();

    $producto=$_REQUEST['producto'];
    $cantidad=$_REQUEST['cantidad'];
    
    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    $query=$obj->consulta("select * from producto 
                           where id='".$producto."'");
    
                               
    $row = $obj->fetch_assoc($query);

    if ($row['stock']<$cantidad)
        echo "NO";
    else
        echo "SI";
    
    $obj->disconnect();    
    
}

?>
