function get(id){
    return document.getElementById(id).value;
}


function ingresar(){
   
var rol=document.getElementById('rol').value;

if (rol=="0") {
    alert("Seleccione Rol");
    return 0;
}

var v1=get('usuario');
var v2=get('clave');


   
var parametros = {"accion":'Ingresar',
                    "usuario" :v1,
                    "clave" :v2,
                    "rol" :rol
                  };


    $.ajax({
           data:  parametros,
           url:   'verificar.php',
           type:  'post',
           success:function (response){
                                                            
               if  (response=='Datos Incorrectos')
                    alert("DATOS INCORRECTOS");
               
               else{
                    var elem = response.split('-');
                    cod = elem[0];
                    rol = elem[1];
                                              
                    if (rol=='1')                      
                        document.location.href="menu.php";
                                     
                       
                }
            }
            });
           
}

