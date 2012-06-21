<?php

require_once('classConexion.php');
    class Query extends Conexion{
       var $sql       = NULL;
       var $msj_query    = NULL;
       var $result    = NULL;
       function __construct(){
         parent::__construct();
         parent::MET_conectar();
       }//end function
       
       
       function __get($atributo){//metodo GET de la clase
         $cad = "\$aux = \$this->$atributo;";
         eval ($cad);      
         return $aux;
       }//end function
       
       
       function __set($atributo,$valor){//metodo SET de la clase
         $cad = '$this->'.$atributo." = '$valor';";
         //$this->nombre = 'Juan Perez';
         eval ($cad);      
       }//end fucntion
       
       
       function MET_select(){
         $this->result = mysql_query($this->sql, $this->cnx);
         if(!$this->result){//Evaluar Sintaxis Sql
            $this->msj_query = "Error ".mysql_errno().": ".mysql_error();
            return false;
         }//end if
         if ( mysql_num_rows($this->result) <= 0 ){
            $this->msj_query = "No existen datos a consultar";
            return false;
         }//end if
         while ( $reg = mysql_fetch_assoc($this->result) ){
            $registros[] = $reg;//generar arreglo multidimensional            
         }//end while
         return $registros;               
       }//end function
       
       
       function MET_selectOne(){
         $this->result = mysql_query($this->sql, $this->cnx);
         if(!$this->result){//Evaluar Sintaxis Sql
            $this->msj_query = "Error ".mysql_errno().": ".mysql_error();
            return false;
         }//end if
         if ( mysql_num_rows($this->result) <= 0 ){
            $this->msj_query = "No existen datos a consultar";
            return false;
         }//end if
         $reg = mysql_fetch_assoc($this->result);
         return $reg;
       }//end function
       
       
       function MET_insert(){
         $this->result = mysql_query($this->sql, $this->cnx);
         if(!$this->result){//Evaluar Sintaxis Sql
            $this->msj_query = "Error ".mysql_errno().": ".mysql_error();
            return false;
         }//end if
         if ( mysql_affected_rows($this->cnx) <= 0 ){
            $this->msj_query = "No se insertaron los datos";
            return false;
         }//end if
         return true;
       }//end function
       
       
       function MET_update(){
         $this->result = mysql_query($this->sql, $this->cnx);
         if(!$this->result){//Evaluar Sintaxis Sql
            $this->msj_query = "Error ".mysql_errno().": ".mysql_error();
            return false;
         }//end if
         if ( mysql_affected_rows($this->cnx) <= 0 ){
            $this->msj_query = "No se actualizaron los datos";
            return false;
         }//end if
         return true;
       }//end function
       
       
       function MET_delete(){
         $this->result = mysql_query($this->sql, $this->cnx);
         if(!$this->result){//Evaluar Sintaxis Sql
            $this->msj_query = "Error ".mysql_errno().": ".mysql_error();
            return false;
         }//end if
         if ( mysql_affected_rows($this->cnx) <= 0 ){
            $this->msj_query = "No se eliminaron los datos";
            return false;
         }//end if
         return true;
       }//end function
   }//end class         
?>
