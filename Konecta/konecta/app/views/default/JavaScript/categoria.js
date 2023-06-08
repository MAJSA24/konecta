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
document.location.href="ingresar.php?action=categoria&pos="+inicio;
}


//----------------------------------------------------
$(document).ready(function(){


    $("#bton_insertar").click(function(){
         
         var parametros = {"accion":'mostrar_tabla'};
                    $.ajax({
                    data:  parametros,
                    url:"app/model/insertar_categoria.php",
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

    document.getElementById('codigo').value="";
    document.getElementById('descripcion').value="";  
}

//--------------------------------------------

function Grabar(){

var p = parametro('pos');

if (p=="")
    p=0;

var v1=get('codigo');
var v2=get('descripcion');

if (v1=="") {
    alert("Digite Código");
    return 0;
}
if (v2=="") {
    alert("Digite Descripción");
    return 0;
}

var parametros = {"accion":'grabar_categoria',
                          "codigo" :v1,
                          "descripcion" :v2
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_categoria.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        Limpiar();
                        document.location.href="ingresar.php?action=categoria&pos="+p;
                }
        });


}

//------------------------------------

function Actualizar(){

var p = parametro( 'pos' );

if (p==""){
    p=0;
}

var v1=get('codigo');
var v2=get('descripcion');

if (v2=="") {
    alert("Digite Descripción");
    return 0;
}

var parametros = {"accion":'actualizar_categoria',
                          "codigo" :v1,
                          "descripcion" :v2
                           };
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_categoria.php",
                type:  'post',
                success:function (response){                       
                        document.location.href="ingresar.php?action=categoria&pos="+p;
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

   var parametros = {"accion":'borrar_categoria',"codigo" :codigo};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_categoria.php",
                type:  'post',
                success:function (response){
                        alert(response);
                        document.location.href="ingresar.php?action=categoria&pos="+inicio;
                      
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

    var parametros = {"accion":'editar_categoria',"codigo" :codigo};
        $.ajax({
                data:  parametros,
                url:"app/model/insertar_categoria.php",
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

