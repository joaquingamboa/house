<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/venta.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Ventas</title>
<!-- InstanceEndEditable -->
<script src="js/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.ui.core.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.ui.datepicker.js"></script>
<script>
$(function(){
//  $("#FN").attr('disabled','disabled')  
  $( "#FN" ).datepicker({
      changeMonth: true,
      changeYear: true,     
      dateFormat: "dd'/'mm'/'yy"
                                });
                                
  $('#datepicker').click(function() {
      $('#FN').datepicker('show');
});
                            
 // $( "#datepicker" ).focusout(function() {
   //  var s=$("#datepicker").val();
     // $("#datepicker").val(s.substring(0,2)+'/'+s.substring(2,4)+'/'+s.substring(4,8));
  // });
})
</script>

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
                    <div style="height:50px;background-color:#999;">
                    <p style="text-align:center;font-weight:bold;">TITULO</p>
                    </div>    
                    
              
                     
                </div><!-- Div Final Right_Container -->
		

		    <div id="footer">
              <div id="contacto">Fono: 56-032-254325</div>
              <div id="contacto">email: drhouse@inacapmail.cl</div>
              <div id="direccion"> Av. España 2250</div>
            </div>


            
                                  
                 
    </div>

        </div>

</body>

<!-- InstanceEnd --></html>

