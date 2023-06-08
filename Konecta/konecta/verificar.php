<?php
require_once 'app/model/db.class.php';
if (!isset($_SESSION)) { session_start(); }

if ($_POST['accion']=='Ingresar'){
       
    $obj = new database();
    $obj->conectar();
    $obj->consulta("set names 'utf8'");

    $rol = $_POST['rol'];
    $usuario_nombre = $_POST['usuario'];
    $usuario_clave =$_POST['clave'];

    $resultado=$obj->consulta("select id,usuario,contrasena,rol 
                               from usuarios 
                               where rol='".$rol."' 
                               AND usuario='".$usuario_nombre."' 
                               AND contrasena='".$usuario_clave."'");

    $n=$obj->numero_de_filas($resultado);

    if ($n==1){

        $row = $obj->fetch_assoc($resultado);
                                    
        $_SESSION['LOGIN'] ='SI';                       
        echo $row['id']."-".$row['rol'];


    }
    else{
        echo "Datos Incorrectos";

    }
    $obj->disconnect();

}

//----------------------------------------


if ($_POST['accion']=='mostrar_anolectivo'){

     echo "<b>A&Ntilde;O LECTIVO ".$_SESSION['anolectivo']."</b>";
   
}

//----------------------------------------

if ($_POST['accion']=='mostrar_nombre_docente'){

    $obj = new database();

    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    
    $query=$obj->consulta("SELECT * FROM profesores
                           WHERE anolectivo=".$_SESSION['anolectivo']." 
                           AND cedula='".$_SESSION['profesor']."'");

    $row =$obj->fetch_assoc($query);
    echo "<b>".$row['nombres']."</b>";
      
    $obj->disconnect();    
}
//--------------------------------------

if ($_POST['accion']=='mostrar_usuario'){

    echo $_SESSION['usuario1'];     
      
}

//----------------------------------------

if ($_POST['accion']=='mostrar_password'){

     echo $_SESSION['contrasena'];
      
    
}

//--------------------------------------

if ($_REQUEST['accion']=='mostrar_hijos'){

    $obj = new database();

    $obj->conectar();
    $obj->consulta("set names 'utf8'");
    
    $query=$obj->consulta("SELECT matriculas.codigo,
                           CONCAT(alumnos.p_apellido,' ',alumnos.s_apellido,' ',alumnos.p_nombre,' ',alumnos.s_nombre) as nombres 
                           FROM matriculas 
                           INNER JOIN alumnos 
                           ON matriculas.codigo=alumnos.codigo 
                           WHERE matriculas.anolectivo=".$_SESSION['anolectivo']." 
                           AND alumnos.acudiente='".$_SESSION['id']."'");

    $n=$obj->numero_de_filas($query);


    if ($n!=0){

        $opciones = '';
         while($row =$obj->fetch_assoc($query)){
               $opciones.='<option value="'.$row['codigo'].'">'.$row['codigo'].' '.$row['nombres'].'</option>';
         }

         echo $opciones;
    }

    
    $obj->disconnect();
}
//----------------------------------------

if ($_POST['accion']=='actualizar_usuario_clave'){

$cadena="<table align='center' border='1' cellspacing='0' cellpadding='0' class='hovertable'>

    <tr>
        <td style='font-size: 12px;background:#FACC2E' align='center' colspan='2' height='20'><B>ACTUALIZAR CONTRASE&Ntilde;A</B></td>
    </tr>
    
    <tr>
        <td style='font-weight:bold;text-align:center;font-size: 12px'>
        <b>USUARIO</b>
        </td>
        <td>
        <input style='border-radius:15px;font-weight:bold;text-align:center;font-size: 12px' value='".$_SESSION['usuario1']."' id='usuario' size='15' readonly='readonly'>        
        </td>
    </tr>


    <tr>
        <td style='font-weight:bold;text-align:center;font-size: 12px'>
        <b>CONTRASE&Ntilde;A</b>
        </td>
        <td>
        <input style='border-radius:15px;font-weight:bold;text-align:center;font-size: 12px'  type='text' id='password' size='15'>       
        </td>
    </tr>


    <tr>
        <td align='center' colspan='2' height='20'>Mostrar Contrase&ntilde;a<input type='checkbox' id='clave' onclick='mostrar_clave()'>      
        </td>
    </tr>

    <tr>
        <td colspan='2' height='20' align='center'>
        <input type='button' name='btnmostrar' class='button small green' onclick='nuevo_usuario();' value=' Actualizar '>
        </td>
    </tr>

</table>";

     echo $cadena;
      
    
}
?>
