var inicio=0;

function aumentar(num){

inicio = num + 10;
Cargar();
}

function disminuir(num){

  if(num>0 ){
    inicio = num - 10;
    Cargar();
  }

}

function Cargar(){
document.location.href="ingresar.php?action=producto&pos="+inicio;
}


//----------------------------------------------------
$(document).ready(function(){


    $("#bton_insertar").click(function(){
         
         var parametros = {"accion":'mostrar_tabla'};
                    $.ajax({
                    data:  parametros,
                    url:"app/model/insertar_producto.php",
                    type: "POST",
                success: function(opciones){
                                                
                        $("#insertar").html(opciones);
                    }
                })
                
            });
              
  });
//-----------------------------------------------------
function get(id){
    return document.getElementById(id).value;
}

function Limpiar(){

document.getElementById('c_id1').value="";
document.getElementById('c_id2').value="";
document.getElementById('id').value="";
document.getElementById('nombre').value="";
document.getElementById('referencia').value="";
document.getElementById('precio').value="";
document.getElementById('peso').value="";
document.getElementById('stock').value="";
document.getElementById('fecha').value="";

}

//--------------------------------------------

function grabar(){


var p = parametro('pos');


if (p=="")
    p=0;


var v1=get('c_id1'); //--Categoria
var v2=get('id');
var v3=get('nombre');
var v4=get('referencia');
var v5=get('precio');
var v6=get('peso');
var v7=get('stock');
var v8=get('fecha');

if (v1=="") {
    alert("SELECCIONES CATEGORIA");
    return 0;
}
if (v2=="") {
    alert("DIGITE ID");
    return 0;
}

if (v3=="") {
    alert("DIGITE NOMBRE");
    return 0;
}
if (v4=="") {
    alert("DIGITE REFERENCIA");
    return 0;
}

if (v5=="") {
    alert("DIGITE PRECIO");
    return 0;
}
if (v6=="") {
    alert("DIGITE PESO");
    return 0;
}

if (v7=="") {
    alert("DIGITE STOCK");
    return 0;
}
if (v8=="") {
    alert("DIGITE FECHA");
    return 0;
}


var parametros = {"accion":'grabar_producto',
                          "categoria":v1,
                          "id":v2,
                          "nombre":v3,
                          "referencia":v4,
                          "precio":v5,
                          "peso":v6,
                          "stock":v7,
                          "fecha":v8
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_producto.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        Limpiar();
                        document.location.href="ingresar.php?action=producto&pos="+p;
                }
        });

}

//------------------------------------

function Actualizar(){

var p = parametro( 'pos' );

if (p==""){
    p=0;
}

var v1=get('c_id1'); //--Categoria
var v2=get('id');
var v3=get('nombre');
var v4=get('referencia');
var v5=get('precio');
var v6=get('peso');
var v7=get('stock');
var v8=get('fecha');

if (v1=="") {
    alert("SELECCIONES CATEGORIA");
    return 0;
}
if (v2=="") {
    alert("DIGITE ID");
    return 0;
}

if (v3=="") {
    alert("DIGITE NOMBRE");
    return 0;
}
if (v4=="") {
    alert("DIGITE REFERENCIA");
    return 0;
}

if (v5=="") {
    alert("DIGITE PRECIO");
    return 0;
}
if (v6=="") {
    alert("DIGITE PESO");
    return 0;
}

if (v7=="") {
    alert("DIGITE STOCK");
    return 0;
}
if (v8=="") {
    alert("DIGITE FECHA");
    return 0;
}
var parametros = {"accion":'actualizar_producto',
                          "categoria" :v1,
                          "id" :v2,
                          "nombre" :v3,
                          "referencia" :v4,
                          "precio" :v5,
                          "peso" :v6,
                          "stock" :v7,
                          "fecha" :v8
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_producto.php",
                type:  'post',
                success:function (response){                       
                        document.location.href="ingresar.php?action=producto&pos="+p;
                        alert(response);
                }
        });

}

//------------------------------------------
function Eliminar(codigo,inicio,total){

  $( "#dialog1" ).dialog({
          width: 40,
          height:0,
          buttons: { //crear botón de cerrar
          
            "SI": function() {
    if ((total>10) && (total-inicio==1)){
       inicio=inicio-10;
   }

   var parametros = {"accion":'borrar_producto',"codigo" :codigo};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_producto.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        document.location.href="ingresar.php?action=producto&pos="+inicio;
                      
                }
        });
   
            $( this ).dialog( "close" );
            },

            "NO": function() {
              $( this ).dialog( "close" );
            }
                      
          }

  });


}

//------------------------------------------

function Editar(codigo,inicio){

    var parametros = {"accion":'editar_producto',"codigo" :codigo};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_producto.php",
                type:  'post',
                success: function(opciones){$("#insertar").html(opciones);
   
                }
        });
}

//-----------------------------------
function parametro( name ){
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );
	if( results == null )
		return "";
	else
		return results[1];
}

//---------------------------------

function mostrar(id1,id2,tabla,ancho, alto){

  $( "#dialog" ).dialog({
          width: ancho,
          height: alto

  });

var parametros = {"accion":'listado',"tabla":tabla,"id1":id1,"id2":id2};

                    $.ajax({
                    data:  parametros,
                    url:"app/model/catalogos.php",
                    type: "POST",
                success: function(opciones){$("#dialog").html(opciones);}})
}

//-----------------------------


function mostrar_lista(id1,id2,codigo,nombre){

    document.getElementById(id1).value=codigo;
    document.getElementById(id2).value=nombre;

    $("#dialog").click(function () {
            $(this).dialog('close');

    });

    document.getElementById(id2).style.color = '#B40404';
    document.getElementById(id1).focus();


}
