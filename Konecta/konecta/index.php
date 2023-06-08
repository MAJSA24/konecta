<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head><meta http-equiv='expires' content='0'>
    <meta http-equiv='Cache-Control' content='no-cache'>
    <meta http-equiv='Pragma' CONTENT='no-cache'>
    <title></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="STYLESHEET" type="text/css" href="code/css/960.css">
    <link rel="STYLESHEET" type="text/css" href="code/css/reset.css">
    <link rel="STYLESHEET" type="text/css" href="code/css/text.css">
    <link rel="STYLESHEET" type="text/css" href="css/inicio.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script type="text/javascript" src="inicio.js"></script>

  <style>
  .textbox
  {
  border: 1px solid #DBE1EB;
  font-size: 18px;
  font-family: Arial, Verdana;
  padding-left: 7px;
  padding-right: 7px;
  padding-top: 10px;
  padding-bottom: 10px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -o-border-radius: 4px;
  background: #FFFFFF;
  background: linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
  color: #2E3133;
  }
   
  .textbox:focus
  {
  color: #2E3133;
  border-color: #FBFFAD;
  }
  
.styled-select {
   background: url(https://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(https://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 100px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
}

.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */
.slate   { background-color: #ddd; }
.green   { background-color: #779126; }
.blue    { background-color: #3b8ec2; }
.yellow  { background-color: #eec111; }
.black   { background-color: #000; }

/* -------------------- Colors: Text */
.slate select   { color: #000; }
.green select   { color: #fff; }
.blue select    { color: #fff; }
.yellow select  { color: #000; }
.black select   { color: #fff; }


/* -------------------- Select Box Styles: danielneumann.com Method */
/* -------------------- Source: https://danielneumann.com/blog/how-to-style-dropdown-with-css-only/ */
#mainselection select {
   border: 0;
   color: #EEE;
   background: #58B14C;
   font-size: 13px;
   font-weight: bold;
 
   width: 150px;
   *width: 150px;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:150px;
   -moz-border-radius: 5px 5px 5px 5px;
   -webkit-border-radius: 5px 5px 5px 5px;
   border-radius: 5px 5px 5px 5px;
   box-shadow: 1px 1px 11px #330033;
   background: #58B14C url("https://i62.tinypic.com/15xvbd5.png") no-repeat scroll 200px center;
   
}


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: https://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(https://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
   
}

select#soflow-color {
   color: #fff;
   background-image: url(https://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
   
} 
 
 } 
 </style>

</head>
<body>
  
<div id="cabecera" class="container_12">
  <div class="grid_12">
       <img src="imagenes/encabezado.jpg" width="500" height="80"/>
  </div>
</div>

<!------------------------------------>

<div class="container_12">
<hr>

<div class="grid_8">
    <div class="escudo">
       <img src="imagenes/cafeteria.jpg" width="350" height="350"/>
    </div>
</div>

<!------------------------------------>

<div class="grid_4" >

   <div class="login">
       <div class="silla">
            <img src="imagenes/login.jpg" width="100" height="100"/>
       </div>

<br>

<div class="textocuerpolateral">
                       

<div id="mainselection">
  <select id='rol'>
    <option VALUE="0">Seleccione Rol</option>
    <option VALUE="1" Selected>Administrador</option>    
    <option VALUE="2">Rol 1</option> 
    <option VALUE="3">Rol 2</option>                 
      
  </select>
</div>
<br>
<input type="text" name="usuario_nombre" id ="usuario" class="textbox" size="12" placeholder="Usuario" />

<br><br>
<input type="Password" name="usuario_clave" id="clave" class="textbox" size="12" placeholder="Contrase&ntilde;a" />

<br><br><br><br> 
                               
<input type="button" value="     << Ingresar >>    " class="button large green" onclick="ingresar();return false;"/><br>                              
<br><br><br>
 
</div>

</div>
</div>


</div>

<!--------- PIE DE LA PAGINA --------------->

<div class="container_12" id="pie">
<hr>
<div class="grid_12">
    <img src="imagenes/pie.jpg" />
</div>

<div class="clear"></div>

</div>

</body>
</html>
