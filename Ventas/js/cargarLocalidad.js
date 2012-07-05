var nav4 = window.Event ? true : false;
function acceptNum(evt){	
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
var key = nav4 ? evt.which : evt.keyCode;	
return (key <= 13 || (key >= 48 && key <= 57));
}
var region=false;
var provincia=false;
var comuna=false;
var rut=false;
var nombre=false;
var giro=false;
var rz=false;
var am=false;
var ap=false;


function valNum(){
      if($("#num").val()==null || $("#num").val()==""){
      $("#num").val("0");
   }
    } 

 function valProvincia(){
   if($("#provincia").val()==null || $("#provincia").val()==0){
    return false;
  }else{
   return true;
  }
    }
    
function valCalle(){
      if($("#calle").val()!=null && $("#calle").val()!=""){
       return true;
   } else{
       return false;
   }
    }

function valRegion(){
   if($("#region").val()==null || $("#region").val()==0){
    return false;
  }else{
   return true;
  }
    } 
    
 function valComuna(){
   if($("#comuna").val()==null || $("#comuna").val()==0){
    return false;
  }else{
   return true;
  }
    } 

function displayResult(){
                var x=document.getElementById("lista");
                var i;
                var txt = new Array();
                for (i=0;i<x.length;i++)
                {
                txt[i] = x.options[i].text;    
                }
                return txt;        
}

function agregarFila(obj){
                  valNum();
                  region=valRegion();
                  comuna=valComuna();
                  provincia=valProvincia();
                  calle=valCalle();
                  if(region==true && comuna && provincia && calle){
                $("#cant_campos").val(parseInt($("#cant_campos").val()) + 1);
		var oId = $("#cant_campos").val();
        	var calle = $("#calle").val();
                var numero = $("#num").val();
                var depto = $("#depto").val();
                var sector = $("#sector").val();
		var poblacion = $("#poblacion").val();
                var region = $("#region").val();
                var provincia = $("#provincia").val();
                var comuna = $("#comuna").val();
                var txtcomuna = $("#comuna option:selected").html();
                var txtregion = $("#region option:selected").html();
                var txtprovincia = $("#provincia option:selected").html();
                var txt = displayResult();
                var tel = "";
                var x=document.getElementById("lista");
                var codigoPostal = $("#CP").val();
                
                // jQuery.trim(codigoPostal);
                if (codigoPostal == "")
                    codigoPostal = "-";
		var direccion = ""+calle+";"+numero+";"+depto+";"+poblacion+";"+sector+";"+comuna+"";
                var direccion2 = ""+calle+";"+numero+";"+depto+";"+poblacion+";"+sector+";"+txtcomuna+";"+txtprovincia+";"+txtregion+"";
		var strHtml1 = "<td>" + direccion2 + '<input type="hidden" id="hdnRPC_' + oId + '" name="hdnRPC_' + oId + '" value="' + direccion + '"/></td>' ;
		var strHtml2 = "<td>" + codigoPostal + '<input type="hidden" id="hdnCP_' + oId + '" name="hdnCP_' + oId + '" value="' + codigoPostal + '"/></td>' ;
                for(i=0;i<x.length;i++){
                    if(i+1==x.length){
                        tel+=txt[i]+"";
                    }else{
                         tel+=txt[i]+";";
                    }
                       
                    }
            	var  strHtml3 = "<td style='overflow:scroll;width:150px'>" + tel + '<input type="hidden" id="hdnTel_' + oId + '" name="hdnTel_' + oId + '" value="' + x.length + ";"+ tel + '"/></td>' ;   
    		var strHtml4 = '<td><img src="img/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este detalle?\')){eliminarFila(' + oId + ');}"/>';
           	strHtml4 += '<input type="hidden" id="hdnIdCampos_' + oId +'" name="hdnIdCampos[]" value="' + oId + '" /></td>';
                var strHtmlTr = "<tr id='rowDetalle_" + oId + "'></tr>";
        	var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4;
		$("#tbDetalle").append(strHtmlTr);
		$("#rowDetalle_" + oId).html(strHtmlFinal);
                  }    
                        }
function limpiarCampos(){
  $("#comuna").empty().attr("disabled","disabled");
  $("#provincia").empty().attr("disabled","disabled");
  $("#calle").val("");
  $("#num").val("");
  $("#depto").val("");
  $("#poblacion").val("");
  $("#sector").val("");
  $("#CP").val("");
  $("#region").val("0");
  $("#tel").val("");
  var lista=document.getElementById("lista");
  lista.options.length=0;
}

function eliminarFila(oId){
  //  alert($("#rowDetalle_"+oId+" input[name=hdnTel_"+oId+"]").val());
	    $("#rowDetalle_" + oId).remove();	
		return false;
	}

$(document).ready(function(){
function valRut(){
   if($("#Rut").val()!=null && $("#Rut").val()!=""){
       return true;
   } else{
       return false;
   }
}  

function valNB(){
      if($("#NB").val()!=null && $("#NB").val()!=""){
       return true;
   } else{
       return false;
   }
    }

function valNF(){
      if($("#NF").val()!=null && $("#NF").val()!=""){
       return true;
   } else{
       return false;
   }
    }
    
function valGR(){
      if($("#GR").val()!=null && $("#GR").val()!=""){
       return true;
   } else{
       return false;
   }
    }

function valRZ(){
      if($("#RZ").val()!=null && $("#RZ").val()!=""){
       return true;
   } else{
       return false;
   }
    }
    
 function valAP(){
      if($("#AP").val()!=null && $("#AP").val()!=""){
       return true;
   } else{
       return false;
   }
    }   

function valAM(){
      if($("#AM").val()!=null && $("#AM").val()!=""){
       return true;
   } else{
       return false;
   }
    }
 
 
$("#enviarf").click(function(){
        var inp=$('input[id^="hdn"]').val()
        rut=valRut();
        nombre=valNB();
        giro=valGR();
    if(inp==undefined){
        alert("Usted no ha Ingresado Direccion");
    }else{      
    if($("#TP").val()==0){ //Si el tipo persona es Natural
       ap=valAP();
       am=valAM();
       if(rut==true && nombre && giro && ap && am){
        $("form").submit(); //HACER LINEAS PARA INGRESAR PERSONA.
       }
                            }else{
                              rz=valRZ();
                              nf=valNF();
                                if(rut==true && giro && nombre && rz && nf){
                                    $("form").submit();
                                }   
    }
      }
});


/* DESHABILITAR COPIAR PEGAR */
$("input").bind("copy", function(){
return false;
});

$("input").bind("paste", function(){
return false;
});   
/* DESHABILITAR COPIAR PEGAR */
  
/* Validar */
$("#valor").keyup(function(){
if ($("#valor").val() != "")
$(this).val($(this).val().replace(/[^0-9]/g, ""));
}); 

$("#num").keyup(function(){
if ($("#num").val() != "")
$(this).val($(this).val().replace(/[^0-9]/g, ""));
});    

$("#depto").keyup(function(){
if ($("#depto").val() != "")
$(this).val($(this).val().replace(/[^0-9]/g, ""));
});  

$("#CP").keyup(function(){
if ($("#CP").val() != "")
$(this).val($(this).val().replace(/[^0-9]/g, ""));
});    
/* Validar */

/* TELEFONOS  */
    $('#addTel').click(function(){
	var valor = $("input[name='valor']").val();
		if(valor != ""){
		$("#lista").append('<option value=\"'+valor+'\">'+valor+'</option>');
               
		}
  });
  
  $('#delTel').click(function(){
      $("#lista option:selected").remove();
    });
/* -- TELEFONOS -- */
    
  $("#region").change(function(){
            if($(this).val()!=""){
                var dato=$(this).val();
                $("#imgprovincia").show();
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url:"procesarLocalidad.php",
                    data:"idRegion="+dato+"&tarea=listProvincia",
                    success:function(msg){
                        if(msg.toString()=='No hay resultados' || msg.toString()=='ERROR'){ 
                          alert(msg); 
                      }
                        $("#provincia").empty().removeAttr("disabled").append(msg);
                        $("#comuna").empty();
                        $("#comuna").attr('disabled','disabled');
                        $("#imgprovincia").hide();
                    }
                });
            }else{
                $("#provincia").empty().attr("disabled","disabled");
                $("#comuna").empty().attr("disabled","disabled");
            }
        });

  $("#provincia").change(function(){
            if($(this).val()!=""){
                var dato=$(this).val();
                $("#imgcomuna").show();
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url:"procesarLocalidad.php",
                    data:"idProvincia="+dato+"&tarea=listComuna",
                    success:function(msg){
                        if(msg.toString()=='No hay resultados' || msg.toString()=='ERROR'){ 
                        alert(msg); 
                        $("#comuna").empty();
                      }
                        $("#comuna").empty().removeAttr("disabled").append(msg);
                        $("#imgcomuna").hide();
                    }
                });
            }else{  
                $("#comuna").empty().attr("disabled","disabled");
            }
        });
   
});

