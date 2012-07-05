<?php
include('../clases/Conexion.php');
$TP = $_POST['TP'];
$RUT = $_POST['Rut'];
$NB = $_POST['NB'];
$FN = $_POST['FN'];
$GR = $_POST['GR'];
$USER = "TAPALIN"; 
$con = new Conexion();

/* VALIDACION CLIENTE EXISTE */
$sqlc= "SELECT * from persona where Rut='".$RUT."' and personaJuridica=".$TP;
$idCliente = $con->query($sqlc) or die(mysql_error());

if(mysql_num_rows($idCliente)<1 || mysql_num_rows($idCliente)==null){
/* VALIDACION CLIENTE EXISTE */
if($TP==0){
//$cliente->idRol; 
   $AP = $_POST['AP'];
   $AM = $_POST['AM'];
   $SEXO = $_POST['Sexo'];
   $sql = "INSERT INTO persona(rut,nombre,apellidoPaterno,apellidoMaterno,fechaNac,sexo,giro,personaJuridica,regUser,regFecha,regEstado) values('".$RUT."','".$NB."','".$AP."','".$AM."','".$FN."','".$SEXO."','".$GR."',".$TP.",'".$USER."','".$FN."','GASD')";
   $result = $con->query($sql);  
}else{
   $RZ = $_POST['RZ'];
   $NF = $_POST['NF'];
   $sql = "INSERT INTO persona(rut,nombre,nombre_fanta,fechaNac,giro,personaJuridica,razon_social,regUser,regFecha,regEstado) values('".$RUT."','".$NB."','".$NF."','".$FN."','".$GR."',".$TP.",'".$RZ."','".$USER."','".$FN."','GASD')";
   $result = $con->query($sql); 
}
 if($result==null){
echo "<script>alert(\"No se ha ingresado el Cliente a los Registro || Error de Conexion.\");</script>";
$url="ingresarcliente.php";
$comando = "<script>window.setTimeout('window.location=".chr(34).$url.chr(34).";',".'1000'.");</script>";
echo ($comando);
echo "REDIRECCIONANDO A ".$url;
                  }else{
   $sqlc= "SELECT idPersona from persona where Rut='".$RUT."' and personaJuridica=".$TP; //OBTENER ID PERSONA RECIEN INSERTADA
   $idCliente = $con->query($sqlc);
   $idCliente = mysql_fetch_object($idCliente);
   $sql= "SELECT idRol from rol where nombreRol='cliente';"; //OBTENER EL ID ROL DEL TIPO CLIENTE
   $cliente = $con->query($sql);
   $cliente = mysql_fetch_object($cliente);  
   $sql2 = "INSERT INTO persona_rol(idPersona,idRol,status) values(".$idCliente->idPersona.",".$cliente->idRol.",1);";
   $querys = $con->query($sql2);
   /* OBTENER idPersonaRol cliente ingresado */
   $idPersonaRol = "SELECT idPersonaRol from persona_rol where idPersona=".$idCliente->idPersona." and idRol=".$cliente->idRol." and status=1";
   $idPersonaRol = $con->query($idPersonaRol);
   $idPersonaRol = mysql_fetch_object($idPersonaRol);
   $idPersonaRol = $idPersonaRol->idPersonaRol;
   /* OBTENER idPersonaRol cliente ingresado */
   
   //INSERTAR DIRECCION
   foreach($_POST['hdnIdCampos'] as $id){  
  // var direccion = ""+calle+";"+numero+";"+depto+";"+poblacion+";"+sector+";"+comuna+"";
       $a = $_POST['hdnRPC_'.$id];
  // echo "<script>alert('$a');</script>";
  // exit;
   $dir = explode(";",$_POST['hdnRPC_'.$id]); //El split fue dejado de usar , ahora se usa explode.
   $direccion = "INSERT INTO direccion(idPersonaRol,numCasa,numDpto,calle,poblacion,sector,codPostal,idComuna)values(".$idPersonaRol.",'".$dir[1]."','".$dir[2]."','".$dir[0]."','".$dir[3]."','".$dir[4]."','".$_POST['hdnCP_'.$id]."',".$dir[5].");";   
   $resultDir = $con->query($direccion);
// echo $_POST['hdnRPC_'.$id] ."<br/>";

                                        }
echo "<script>alert(\"CLIENTE INGRESADO CORRECTAMENTE!!!.\");</script>";
$url="ingresarcliente.php";
$comando = "<script>window.setTimeout('window.location=".chr(34).$url.chr(34).";',".'1000'.");</script>";
echo ($comando);
echo "REDIRECCIONANDO A ".$url;
   
}


//echo $_POST['hdnTel_'.$id];
   
}else{
echo "<script>alert(\"El cliente ya Existe en los Registros.\");</script>";
$url="ingresarcliente.php";
$comando = "<script>window.setTimeout('window.location=".chr(34).$url.chr(34).";',".'1000'.");</script>";
echo ($comando);
echo "REDIRECCIONANDO A ".$url;
}

?>
