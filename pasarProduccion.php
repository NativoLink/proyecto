<?php 
 
  include("conectar.php");
  $db = conectar();
 
 
 
$id_lote =$_GET['id_lote'];
$fecha   =$_GET['fecha'];
$estado  =$_GET['estado'];
 
 if($estado=="p"){
        $sql="UPDATE `lote` SET estado='$estado' ,
        `fecha_finalC` = '$fecha 00:00:00' , 
         `fecha_inicioP` = '$fecha 00:00:00'
         WHERE `lote`.`id_lote` = $id_lote";
        }else
        if($estado=="f"){
        $sql="UPDATE `lote` SET estado='$estado' ,
        `fecha_finalP` = '$fecha 00:00:00'
          WHERE `lote`.`id_lote` = $id_lote";
        }
 
 
        
 
        $db->query($sql);
 
 
        echo $sql;
 
 
 
 
?>