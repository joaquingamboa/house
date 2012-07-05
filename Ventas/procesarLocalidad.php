<?php    
include("../clases/Conexion.php");    

 function getProvincias(){ 
     $con = new Conexion();   
     $sql="select * from provincia where idRegion=".$_POST["idRegion"];     
     $result = $con->query($sql);        
     $resp="";      
     if($result){          
         if(mysql_num_rows($result)>0){
             $resp.="<option value='0'>Seleccione Provincia</option>";
                while($r=mysql_fetch_object($result)){
                    $resp.="<option value='$r->idProvincia'>".$r->provincia."</option>";
                              }
                                 }else 
                                          $resp="No hay resultados";
                                       
        }else{
            $resp="ERROR";
        }
        echo $resp;
    }
    
    function getComunas(){
        $con = new Conexion(); 
        $sql="select * from comuna where idProvincia=".$_POST["idProvincia"];
        $result= $con->query($sql);
        $resp="";
        if($result){
            if(mysql_num_rows($result)>0){
                $resp.="<option value='0'>Seleccione Comuna</option>";
                while($r=mysql_fetch_object($result)){
                    $resp.="<option value='$r->idComuna'>".$r->comuna."</option>";
                }
                 }else $resp="No hay resultados";
                 
        }else{
            $resp="ERROR";
        }
        echo $resp;
    }
 
    if($_POST){
        switch($_POST["tarea"]){
        case "listProvincia":getProvincias();
                break;
        case "listComuna":getComunas();
                break;
        }
    }
?>