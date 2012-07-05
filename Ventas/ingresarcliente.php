<!DOCTYPE html>
<?php 
include('../clases/Conexion.php');
?>
<html><!-- InstanceBegin template="/Templates/venta.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Ventas</title>
<!-- InstanceEndEditable -->
<!--<script src="js/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>-->
<script src="js/tablaDir.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/ingresarCliente.js"></script>

<script src="js/jquery.Rut.js" type="text/javascript"></script>
<script src="js/cargarLocalidad.js" type="text/javascript"></script>
<script src="js/jquery.ui.core.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>


<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>
		<div id="contenedor"> 
        	<div id="header">            
        	</div> 
         
            <div id="contenido">
                <?php include("menu.php"); ?>
                <div id="right_container">
                    <div style="height:50px;background-color:#999;margin-bottom:15px;">   
                    <p style="text-align:center;font-weight:bold;">Ingresar Nuevo Cliente</p>
                    </div>    
                    <form action="procesarCliente.php" method="post">
                    <div style="float:left;height:228px;border-right:1px solid black;">
                       <table id="TableCliente" style="text-align: right;">
                           <tr> 
                               <td><label for="Rut">Rut:</label></td>
                               <td><input style="width:150px;" type="text" name="Rut" id="Rut" class="required rut"/></td>
                               <td><label for="TP" style="margin:0 0 0 auto;">Tipo Persona:</label></td>
                               <td><select style="width:157px;" id="TP" name="TP">
                                       <option value="0">Natural</option>
                                       <option value="1">Juridica</option>
                                  </select>
                               </td>
                           </tr>
                           <tr>
                               <td><label for="NB">Nombre:</label></td>
                               <td><input style="width:150px;" type="text" name="NB" id="NB"/></td>
                               <td><label for="NF">Nombre Fantasia:</label></td>
                               <td><input style="width:150px;" type="text" name="NF" id="NF"/></td>
                           </tr>
                           <tr>
                               <td><label for="AP">Apellido Paterno:</label></td>
                               <td><input style="width:150px;" type="text" name="AP" id="AP"/></td>
                               <td><label for="AM">Apellido Materno:</label></td>
                               <td><input style="width:150px;" type="text" name="AM" id="AM"/></td>
                           </tr>                        
                            <tr>
                              <td><label for="FN">Fecha Nacimiento:</label></td>
                              <td><input style="width:100px;float:left;" type="text" name="FN" id="FN" readonly="readonly"/><button type="button" id="datepicker"><img src="img/calendar.png"/></button></td>
                              <td><label style="text-align:right;" for="Sexo">Sexo:</label></td>
                              <td>
                                  <select style="width:157px;" id="Sexo" name="Sexo">
                                       <option value="f">Femenino</option>
                                       <option value="m">Masculino</option>
                                  </select>
                              </td>
                            </tr>
                             <tr style="margin-left:10px;">
                              <td><label for="GR">Giro:</label></td>
                              <td><input style="width:150px;" type="text" name="GR" id="GR"/></td>
                              <td><label for="RZ">Razon Social:</label></td>
                              <td><input style="width:150px;" type="text" name="RZ" id="RZ"/></td>
                            </tr>
                       </table>
                    </div>
                    <div style="float:left;margin-left:0px;width:512px;height:228px;">
                    <table id="tableDir1">
                        <tr>
                            <td><label for="calle" style="float:left;">Calle:</label></td>
                            <td><input style="width:190px;" type="text" name="calle" id="calle" /></td> 
                            <td><label for="num" style="float:left;">N&uacute;mero:</label></td>
                            <td><input style="width:50px;" type="text" name="num" id="num" MAXLENGTH=5 /></td> 
                            <td><label for="depto" style="float:left;">Depto:</label></td>
                            <td><input style="width:50px;" type="text" name="depto" id="depto" MAXLENGTH=6 /></td> 
                        </tr>
                        <tr>
                            <td><label for="poblacion" style="float:left;">Poblaci&oacute;n:</label></td> 
                            <td><input style="width:190px;float:left;" type="text" name="poblacion" id="poblacion" /></td> 
                            <td><label for="sector" style="float:left;">Sector:</label></td> 
                            <td colspan="3"><input style="width:165px;float:left;" type="text" name="sector" id="sector" /></td>
                        </tr>
                        <tr>
                            <td><label for="region">Regi&oacute;n:</label></td>
                            <td><select style="width:195px;" name="region" id="region">  
                                    <option value="0">Seleccione Regi&oacute;n</option>
                                  <?php 
                                       $con = new Conexion();
                                       $sql = "SELECT * FROM Region";
                                       $result = $con->query($sql);
                                       while($datos = mysql_fetch_row($result)){
                                       echo "<option value='".$datos[0] ."'>" .$datos[1] ."</option>";
                                       }
                                       ?>
                                </select>
                            </td>
                            <td><label for="provincia">Provincia:</label></td>  
                            <td colspan="3">
                               <select id="provincia" disabled="disabled" name="provincia" style="width:170px;"> </select>
                               <img id="imgprovincia" style="display: none;" src="img/loader.gif" alt="Cargando" />                 
                            </td>
                        </tr>
                         <tr>
                            <td><label for="comuna">Comuna:</label></td>
                            <td><select style="width:195px;" name="comuna" id="comuna" disabled="disabled"></select>
                            <img id="imgcomuna" style="display: none;" src="img/loader.gif" alt="Cargando" />
                            </td>
                            <td><label for="CP">Codigo Postal:</label></td>
                            <td colspan="3"><input style="width:100px;" name="CP" id="CP" MAXLENGTH=15/></td>                          
                        </tr>
                        <tr>
                            <td rowspan="2">Tel&eacute;fonos</td>
                            <td rowspan="2"><input type="text" name="valor" id="valor"/> </td>  
                            <td><button type="button" name="addTel" id="addTel"><img src="img/add.png" /></button></td>
                            <td colspan="3" rowspan="2"><select size="4" name="lista" multiple id="lista"></select></td>
                        </tr>
                        <tr>
                            <td><button type="button" name="delTel" id="delTel" onClick="displayResult();"><img src="img/delete.png" /></button></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="button" id="enviar" onClick="agregarFila(document.getElementById('cant_campos'));" value="Agregar Direccion"/></td>
                            <td colspan="3"><input type="button" id="limpiar" onClick="limpiarCampos();" value="Limpiar Campos"/></td>
                        </tr>
                    </table>
                    </div>
                     <input type="hidden" id="num_campos" name="num_campos" value="0" />
                     <input type="hidden" id="cant_campos" name="cant_campos" value="0" />   
                   <div style="clear:both;height:180px;overflow:auto;">
                      
                <table width="100%" id="tblDetalle" class="listado">
		<thead>
			<tr>
				<th style="width:300px">Direcci&oacute;n</th>
                                <th style="width:150px;">Codigo Postal</th>
				<th style="width:150px;">Tel&eacute;fonos</th> 
                                <th style="width:50px;">Acci&oacute;n</th>
			</tr>
		</thead>
		<tbody id="tbDetalle">
		</tbody>
                </table>    
                   </div>
                     <div style="text-align:center;"><button type="button" id="enviarf">Guardar Cliente</button></div>
                      </form>
                </div>
		

            <div id="footer">
              <div id="contacto">Fono: 56-032-254325</div>
              <div id="contacto">email: drhouse@inacapmail.cl</div>
              <div id="direccion"> Av. España 2250</div>
            </div>


            
                                  
                 
    </div>

        </div>

</body>

<!-- InstanceEnd --></html>
