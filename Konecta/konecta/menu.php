<?php
  include('seguridad.php')

?>
<html>   
  <head>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='Cache-Control' content='no-cache'>
  <meta http-equiv='Pragma' CONTENT='no-cache'>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title></title>
    
    <link href="menu_assets/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/capas.css"/>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

</head>
<body bgcolor="black">

<div id="gn">

    <div id="cp1">
    <center>
       <img src="imagenes/encabezado.jpg" width=50% height=50%>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
       <img src="imagenes/cafeteria.jpg" width=10% height=70%>
    </center>
    </div>

<div id="cp2">

<center>

<FONT COLOR="red"> <H2>MENU PRINCIPAL</H2> </FONT><br>

<table align='CENTER' border='0' cellspacing='0' cellpadding='0' class='hovertable' width='30%'>
<tr>
<td>

<div id='cssmenu'>
<ul>
 
<li><a href='ingresar.php?action='><B><span>INGRESAR</span></B></a></li>
       
<li><a href='salir.php'><B><span>SALIR</span></B></a></li>

   
</ul>
</div>

</td>
</tr>
</table>


<div style="font-size:12pt" id="dialog" title="Seleccione Periodo">

</div>

<BR><BR><BR><BR><BR>

<div style="font-size:14pt" id='anolectivo' </div>


 </center>

   <div id="dialog" title="Seleccione Items"> </div>

</div>

    <div id="cp3">
     <center>
     <img src="imagenes/pie.jpg" />
     </center>
   </div>
   
   
</div>

</body>
</html>

