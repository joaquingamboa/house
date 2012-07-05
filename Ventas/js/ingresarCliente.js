var validar=false;
$(document).ready(function(){
    if( $('#TP').val()==0){
        $('#NF').attr('disabled','disabled');
        $('#RZ').attr('disabled','disabled');
    } 
 /*   $('#Rut').click(
    function valrut(){
      v = $('#Rut').val();
     
               });  */
              
        $('#TP').click(
       function(){
        if( $('#TP').val()==1){
         $('#NF').attr('disabled',false);
         $('#RZ').attr('disabled',false);
         $('#AP').attr('disabled','disabled');
         $('#AP').val('');
         $('#AM').val('');
         $('#AM').attr('disabled','disabled');
         $('#Sexo').attr('disabled','disabled');
               }else{
             $('#NF').attr('disabled','disabled'); 
             $('#NF').val('');
             $('#RZ').attr('disabled','disabled'); 
             $('#RZ').val('');
             $('#Sexo').attr('disabled',false); 
             $('#AP').attr('disabled',false);
             $('#AM').attr('disabled',false);
               }
           });
           
     $('#TP').change(
       function(){
        if( $('#TP').val()==1){
         $('#NF').attr('disabled',false);
         $('#RZ').attr('disabled',false);
         $('#AP').attr('disabled','disabled');
         $('#AM').attr('disabled','disabled');
         $('#Sexo').attr('disabled','disabled');
               }else{
             $('#NF').attr('disabled','disabled'); 
             $('#NF').val('');
             $('#RZ').attr('disabled','disabled'); 
             $('#RZ').val('');
             $('#Sexo').attr('disabled',false); 
             $('#AP').attr('disabled',false);
             $('#AM').attr('disabled',false);
               }
           });
    
    $('#Rut').Rut({
      format_on: 'keyup',
      on_error: function(){ 
      alert('Rut incorrecto');
      $('#Rut').val('');
      validar=false;
                            },
      on_success: function(){
      validar=true;
                            }
                });
                
//  $("#FN").attr('disabled','disabled')  
  $( "#FN" ).datepicker({
      changeMonth: true,
      changeYear: true,     
      dateFormat: "yy'-'mm'-'dd"
                                });
                                
 // $( "#FN" ).datepicker('setDate','+0');
 
  $('#datepicker').click(function() {
      $('#FN').datepicker('show');
});
          
 // $( "#datepicker" ).focusout(function() {
   //  var s=$("#datepicker").val();
     // $("#datepicker").val(s.substring(0,2)+'/'+s.substring(2,4)+'/'+s.substring(4,8));
  // });
})


