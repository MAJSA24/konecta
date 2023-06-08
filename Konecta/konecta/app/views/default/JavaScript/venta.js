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
document.location.href="ingresar.php?action=venta&pos="+inicio;
}


//----------------------------------------------------
$(document).ready(function(){


    $("#bton_insertar").click(function(){
         
         var parametros = {"accion":'mostrar_tabla'};
                    $.ajax({
                    data:  parametros,
                    url:"app/model/insertar_venta.php",
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
document.getElementById('fecha').value="";
document.getElementById('p_id1').value="";
document.getElementById('p_id2').value="";
document.getElementById('cantidad').value="";
document.getElementById('precio').value="";
document.getElementById('total').value="";
}

//--------------------------------------------

function grabar(){

var p = parametro('pos');

if (p=="")
    p=0;


var v1=get('fecha');
var v2=get('p_id1');
var v3=get('cantidad');
var v4=get('precio');
var v5=get('total');

if (v1=="") {
    alert("SELECCIONE FECHA");
    return 0;
}
if (v2=="") {
    alert("SELECCIONE PRODUCTO");
    return 0;
}

if (v3=="") {
    alert("DIGITE CANTIDAD");
    return 0;
}



var parametros = {"accion":'grabar_venta',
                          "fecha":v1,
                          "producto":v2,
                          "cantidad":v3,
                          "precio":v4,
                          "total":v5
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_venta.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        Limpiar();
                        document.location.href="ingresar.php?action=venta&pos="+p;
                }
        });

}

//------------------------------------

function Actualizar(){

var p = parametro( 'pos' );

if (p==""){
    p=0;
}

var v1=get('fecha');
var v2=get('orden');

if (v1=="") {
    alert("SELECCIONE FECHA");
    return 0;
}

var parametros = {"accion":'actualizar_venta',
                          "fecha":v1,
                          "orden":v2
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_venta.php",
                type:  'post',
                success:function (response){                       
                        document.location.href="ingresar.php?action=venta&pos="+p;
                        alert(response);
                }
        });

}

//------------------------------------------
function Eliminar(orden,inicio,total){

  $( "#dialog1" ).dialog({
          width: 40,
          height:0,
          buttons: { //crear botón de cerrar
          
            "SI": function() {
    if ((total>10) && (total-inicio==1)){
       inicio=inicio-10;
   }

   var parametros = {"accion":'borrar_venta',"orden" :orden};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_venta.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        document.location.href="ingresar.php?action=venta&pos="+inicio;
                      
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

function Editar(orden,inicio){

    var parametros = {"accion":'editar_venta',"orden" :orden};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_venta.php",
                type:  'post',
                success: function(opciones){$("#insertar").html(opciones);
   
                }
        });
}

//-----------------------------------
function calcular(){

var producto,cantidad,precio,total;

producto=document.getElementById('p_id1').value;
cantidad=document.getElementById('cantidad').value;
    
    var parametros = {"accion":'verificar_stock',
                      "producto":producto,
                      "cantidad":cantidad
                      };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_venta.php",
                type:  'post',
                success: function(opciones){
                
                  if (opciones=='NO'){
                      alert('NO EXISTE STOCK SUFICIENTE');
                      document.getElementById('cantidad').value='';
                  }
                  else{
                  
                      precio=document.getElementById('precio').value;
                      total=cantidad*precio;
                      document.getElementById('total').value=total;                  
                  }
   
   
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

function mostrar(id1,id2,id3,tabla,ancho, alto){

  $( "#dialog" ).dialog({
          width: ancho,
          height: alto

  });

var parametros = {"accion":'listado_productos',
                  "tabla":tabla,
                  "id1":id1,
                  "id2":id2,
                  "id3":id3
                  };

                    $.ajax({
                    data:  parametros,
                    url:"app/model/catalogos.php",
                    type: "POST",
                success: function(opciones){$("#dialog").html(opciones);}})
}

//-----------------------------


function mostrar_lista(id1,id2,id3,codigo,nombre,precio){

    document.getElementById(id1).value=codigo;
    document.getElementById(id2).value=nombre;
    document.getElementById(id3).value=precio;
   
    document.getElementById('cantidad').value="";
    document.getElementById('total').value=""; 
   
    
    $("#dialog").click(function () {
            $(this).dialog('close');

    });

    document.getElementById(id2).style.color = '#B40404';
    document.getElementById(id1).focus();

}
