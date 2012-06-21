<?php
class Conexion {
    var $host = '';
    var $user = '';
    var $pwd = '';
    var $data = '';
    var $cnx = NULL;
    function __construct(){
       $this->host = 'localhost';
       $this->user = 'root';
       $this->pwd = '';
       $this->data = 'house';   
    }//end construct   
    function MET_conectar(){   
       $this->cnx = mysql_connect($this->host,$this->user,$this->pwd);//conectar a la base
       if(!$this->cnx){//validacion de conexion
         echo "Error ".mysql_errno().": ".mysql_error();
         exit;
       }//endif
       if(!mysql_select_db($this->data,$this->cnx)){//seleccionar la base de datos activa
         echo "Error ".mysql_errno().": ".mysql_error();
         exit;
       }//endif
       //echo "Exito en la Conexion";
    }//end function
   }//end class 
?>
