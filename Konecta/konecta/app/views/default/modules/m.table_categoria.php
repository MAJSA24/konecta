<div class="t"><?php echo $titulo; ?></div>		
<table border="0" cellspacing="0" cellpadding="0" class="hovertable" width="100%">
	  <tr>
    <th style='background-color:#fcfe88' colspan="2"></th>
	  <th style='background-color:#fcfe88'>CODIGO</th>
	  <th style='background-color:#fcfe88'>DESCRIPCION</th>
	  </tr>

    <?php $cantidad=0; ?>
	  <?php foreach ($Array as $data): ?>

    <?php $cantidad++; ?>
	  <tr onmouseover="this.style.backgroundColor='#89F2AC';" onmouseout="this.style.backgroundColor='#BBE9EE';">
        <td align="center"> <img id="elemento1"  class="confirmar" src="imagenes/foto1.jpg" onClick="Eliminar(<?php echo $data['codigo'];?>,<?php echo $inicio; ?>,<?php echo $total_categorias; ?>)" height="20" width="20" alt="Eliminar" title="Eliminar">  </td>
        <td align="center"> <img id="elemento2"  class="confirmar" src="imagenes/editar.jpg" onClick="Editar(<?php echo $data['codigo'];?>,<?php echo $inicio; ?>)" height="20" width="20" alt="Editar" title="Editar">  </td>
        <td align="center"><?php echo $data['codigo'];?></td>
        <td><?php echo ($data['descripcion']);?></td>
	  </tr>
	  <?php endforeach; ?>

            <?php

            if ($cantidad>=1 && $cantidad<10){

                  for ($i=1; $i<=10-$cantidad; $i++) {  ?>

                     <tr onmouseover="this.style.backgroundColor='#89F2AC';" onmouseout="this.style.backgroundColor='#BBE9EE';">
                     <td align="center"> <img id="elemento1"  class="confirmar" src="imagenes/foto1b.jpg" height="20" width="20" >  </td>
                     <td align="center"> <img id="elemento2"  class="confirmar" src="imagenes/foto1b.jpg" height="20" width="20" >  </td>
                     <td></td><td></td>
	             </tr>

                 <?php } 

                    if($total_categorias>10){ ?>

                        <tr>
                        <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                        <td></td><td></td>
                        <td align="center">
                        <INPUT TYPE="button" class="button medium green" name="restar" onclick="disminuir(<?php echo $inicio; ?>);" value=" <<  Anterior  ">
                        </td>                       
                        </tr>
                     <?php } else { ?>
                    
                        <tr>
                        <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                        <td></td><td></td>
                        </tr>
                        
                     <?php }

                  } else {

                       //------------------------------
                       if ($cantidad==0){

                           for ($i=1; $i<=10; $i++) {  ?>

                            <tr onmouseover="this.style.backgroundColor='#89F2AC';" onmouseout="this.style.backgroundColor='#BBE9EE';">
                            <td align="center"> <img id="elemento1"  class="confirmar" src="imagenes/foto1b.jpg" height="20" width="20" >  </td>
                            <td align="center"> <img id="elemento2"  class="confirmar" src="imagenes/foto1b.jpg" height="20" width="20" >  </td>
                            <td></td><td></td><td></td>
                            </tr>

                            <?php }?>

                            <tr>
                            <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                            <td></td><td></td><td></td>
                            </tr>

                       <?php
                       }
                       else{

                       //------------------------------

                        if ($inicio==0 && $total_categorias>10){ ?>

                          <tr>
                          <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                          <td></td><td></td>
                          <td align="center">
                          <INPUT TYPE="button" name="sumar" class="button medium green" onclick="aumentar(<?php echo $inicio; ?>);" value=" Siguiente >> ">                          
                          </td>
                          
                          </tr>

                        <?php }else if (($inicio==$total_categorias-10)&& ($total_categorias>10)){ ?>

                          <tr>
                          <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                          <td></td><td></td>
                          <td align="center">
                          <INPUT TYPE="button" name="restar" onclick="disminuir(<?php echo $inicio; ?>);" value=" <<  Anterior  ">
                          </td>
                          </tr>

                         <?php }else if ($total_categorias==10){ ?>

                            <tr>
                            <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                            <td></td><td></td><td></td>
                            </tr>

                        <?php }else{  ?>

                          <tr>
                          <td align="center" colspan="2"><INPUT TYPE="button" class="button medium green" id="bton_insertar" value="  Insertar  "></td>
                          <td></td><td></td><td></td>
                          <td align="center" colspan="2">
                          <INPUT TYPE="button" name="restar" class="button medium green" onclick="disminuir(<?php echo $inicio; ?>);" value=" <<  Anterior  ">
                          <INPUT TYPE="button" name="sumar" class="button medium green" onclick="aumentar(<?php echo $inicio; ?>);" value=" Siguiente >> ">
                          </td>
                          </tr>

                       <?php }
                      }
             } ?>

            </table>

<div id="insertar">
    
</div>
