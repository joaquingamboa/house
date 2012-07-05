<?php
class Conexion{
 private $servidor="localhost";
 private $username="root";	
 private $password="";
 private $dbname="house";
 private $con=null;
 
 
 public function abrir(){
 $this->con=mysql_connect($this->servidor,$this->username,$this->password);
 mysql_select_db($this->dbname);
 }
 
  
 public function cerrar(){
  if($this->con){
	  mysql_close($this->con);
	  $this->con=null;
 }
}
 
 public function query($sql){
	$this->abrir();
	$datos=null;
	$datos=mysql_query($sql);
	$this->cerrar();
	return $datos; 
 }

 public function num_rows($sql){
     $this->abrir();
     $datos=null;
     $datos=mysql_num_rows($sql);
     $this->cerrar();
     return $datos;
 }
}

?>