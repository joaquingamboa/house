<html>
<meta http-equiv="Pragma"content="no-cache">
<meta http-equiv="expires"content="0">
<head>
<link href="CSS/style.css" rel="stylesheet" type="text/css">

<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
   
});

function agregarFila(obj){
        $("#cant_campos").val(parseInt($("#cant_campos").val()) + 1);
		var oId = $("#cant_campos").val();
        var nombre = $("#txtNombre").val();
		var edad = $("#txtEdad").val();
		var direccion = $("#txtDireccion").val();
		var sexo = $("#selSexo").val();
		var estCivil = $("#selEstCivil").val();

        var strHtml1 = "<td>" + nombre + '<input type="hidden" id="hdnNombre_' + oId + '" name="hdnNombre_' + oId + '" value="' + nombre + '"/></td>';
		var strHtml2 = "<td>" + edad + '<input type="hidden" id="hdnEdad_' + oId + '" name="hdnEdad_' + oId + '" value="' + edad + '"/></td>' ;
		var strHtml3 = "<td>" + direccion + '<input type="hidden" id="hdnDireccion_' + oId + '" name="hdnDireccion_' + oId + '" value="' + direccion + '"/></td>' ;
		var strHtml4 = "<td>" + sexo + '<input type="hidden" id="hdnSexo_' + oId + '" name="hdnSexo_' + oId + '" value="' + sexo + '"/></td>' ;
		var strHtml5 = "<td>" + estCivil + '<input type="hidden" id="hdnEstCivil_' + oId + '" name="hdnEstCivil_' + oId + '" value="' + estCivil + '"/></td>' ;
    	var strHtml6 = '<td><img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este detalle?\')){eliminarFila(' + oId + ');}"/>';
        strHtml6 += '<input type="hidden" id="hdnIdCampos_' + oId +'" name="hdnIdCampos[]" value="' + oId + '" /></td>';
        var strHtmlTr = "<tr id='rowDetalle_" + oId + "'></tr>";
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6;
        //tambien se puede agregar todo el HTML de una sola vez.
        //var strHtmlTr = "<tr id='rowDetalle_" + oId + "'>" + strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 +"</tr>";
        $("#tbDetalle").append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#rowDetalle_" + oId).html(strHtmlFinal);
        return false;
	}
	function eliminarFila(oId){
	    $("#rowDetalle_" + oId).remove();	
		return false;
	}

	function cancelar(){
	    $("#tbDetalle").html("");	
		return false;
	}
</script>
</head>
<body>
<div id="cont" class="container">
<form name="proyecto" id="proyecto" action="" method="post">
    <input type="hidden" id="num_campos" name="num_campos" value="0" />
    <input type="hidden" id="cant_campos" name="cant_campos" value="0" />
<fieldset>
	<legend>El formulario</legend>
	<div class="top">
	<label class="label" for="txtNombre">Nombre:</label>
        <div class="div_texbox"><input type="text" id="txtNombre" name="txtNombre" value="" class="textbox" /></div>
        <label class="label" for="txtEdad">Edad:</label>
        <div class="div_texbox"><input type="text" id="txtEdad" name="txtEdad" value="" class="textbox txtUser" /></div>
        <label class="label" for="txtDireccion">Direccion:</label>
        <div class="div_texbox"><input type="text" id="txtDireccion" name="txtDireccion" value="" class="textbox txtCmt" /></div>
        <label class="label" for="selSexo">Sexo:</label>
        <div class="div_texbox">
            <select id="selSexo" name="selSexo" class="textbox txtFec">
                <option value="-">Seleccione</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
        </div>
        <label class="label" for="selEstCivil">Estado Civil:</label>
        <div class="div_texbox">
            <select id="selEstCivil" name="selEstCivil" class="textbox txtFec">
                <option value="-">Seleccione</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Viudo">Viudo</option>
            </select>
        </div>
	</div>
</fieldset>
<div class="button_div">    
    <input type="reset" id="btnCancel" name="btnCancel" value="Cancelar" class="buttons_CANCEL" onclick="cancelar();" />
    <input type="button" id="btnAgregar" name="btnAgregar" value="Agregar Persona" class="buttons_aplicar" onclick="agregarFila(document.getElementById('cant_campos'));" />
    <input type="button" id="btnAgregar" name="btnAgregar" value="Guardar" class="buttons_OK" onclick="alert('Aqui debes implementar el guardado de datos!');" />
</div>
<fieldset class="fieldset">
    <legend class="legend">
        Detalle de Personas
    </legend>
    <div class="clear"></div>
    <div id="form3" class="form-horiz">
	<table width="100%" id="tblDetalle" class="listado">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Edad</th>
				<th>Direccion</th>
				<th>Sexo</th>
				<th>Est. Civil</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody id="tbDetalle">
		</tbody>
	</table>
    </div>
</fieldset>
</div>
</form>
</body>
</html>
