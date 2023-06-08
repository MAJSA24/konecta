<?php
require_once "db.class.php";

if ($_POST['accion']=='listado'){

    $id1=$_POST['id1'];
    $id2=$_POST['id2'];
    $tabla=$_POST['tabla'];
    
    $obj = new database();
    $obj->conectar();
    $obj->consulta("set names 'utf8'");

    
    $query=$obj->consulta("select codigo,descripcion from ".$tabla." ORDER BY codigo"); 

    $cadena="<table class='hovertable1' border='0' cellspacing='0' cellpadding='0' width='100%'>";

    while($row = $obj->fetch_assoc($query)) {

      $cadena.="<tr>";
      $cadena.="<td align='center'> <img id='elem1'  class='confirmar' src='imagenes/boton.png' onClick='mostrar_lista(\"".$id1."\",\"".$id2."\",\"".$row['codigo']."\",\"".($row['descripcion'])."\");' height='20' width='30' alt='Seleccionar' title='Seleccionar'></td>";
      $cadena.="<td>".$row['codigo']."</td>
                <td>".$row['descripcion']."
                </td>
                </tr>";

    }

    $cadena.="</table>";
    echo $cadena;

    $obj->disconnect();

}

if ($_POST['accion']=='listado_productos'){

    $id1=$_POST['id1'];
    $id2=$_POST['id2'];
    $id3=$_POST['id3'];
    
    $tabla=$_POST['tabla'];
    
    $obj = new database();
    $obj->conectar();
    $obj->consulta("set names 'utf8'");

    
    $query=$obj->consulta("select id,nombre,precio,stock from ".$tabla." ORDER BY nombre"); 

    $cadena="<table class='hovertable1' border='0' cellspacing='0' cellpadding='0' width='100%'>";
    $cadena.="<tr style='background-color:#fcfe88;font-weight:bold;'>
              <td align='center'></td>
              <td align='center'>ID</td>
              <td align='center'>NOMBRE</td>
              <td align='right'>PRECIO</td>
              <td align='right'>STOCK</td>
              </tr>";
    
    
    while($row = $obj->fetch_assoc($query)) {

      $cadena.="<tr>";
      $cadena.="<td align='center'> <img id='elem1'  class='confirmar' src='imagenes/boton.png' onClick='mostrar_lista(\"".$id1."\",\"".$id2."\",\"".$id3."\",\"".$row['id']."\",\"".$row['nombre']."\",\"".$row['precio']."\");' height='20' width='30' alt='Seleccionar' title='Seleccionar'></td>";
      $cadena.="<td align='center' width='10%'>".$row['id']."</td>
                <td width='50%'>".$row['nombre']."
                <td align='right' width='20%'>$".$row['precio']."
                <td align='right' width='20%'>".$row['stock']."
                </td>
                </tr>";

    }

    $cadena.="</table>";
    echo $cadena;

    $obj->disconnect();

}

?>
