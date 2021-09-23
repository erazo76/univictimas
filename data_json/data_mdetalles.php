<?php
require_once '../models/Mdetalle.php';
require_once '../models/Msolicitude.php';

$unid=$_GET["este"];
session_start();
$id_sesion_usuario = $_SESSION['instante'];
if(!$id_sesion_usuario){
	$id_sesion_usuario=1;
}
	$result = array();

	
	$data_delete = Mdetalle::find_by_sql("delete from mdetalles where reg_temp=true and id_sesion_usuario=1;");

 
	$data_search = Msolicitude::find_by_sql("SELECT id FROM Msolicitudes WHERE status=1 and id=$unid ");


	if($data_search !=null){
		$cadena='AND reg_temp=false and mrequerimientos_id='.$unid.' ';
	   }else{
		if ($id_sesion_usuario>1){
			$cadena='AND reg_temp=true and id_sesion_usuario='.$id_sesion_usuario.'';
		
		  }else {
			$cadena='AND reg_temp=false ';
		
		  }
	   }



	$data = Mdetalle::find_by_sql("select id,cid,d_tipo,d_concepto,d_cantidad,d_medida,
	                               d_costo,d_obs,mrequerimientos_id,status,dia from mdetalles
	                                    WHERE status=1 $cadena order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		switch ($rs->d_tipo) {
			case '0':	$tipo='SALONES';break;
			case '1':	$tipo='ALIMENTACIÓN';break;	
			case '2':	$tipo='MATERIALES';	break;
			case '3':	$tipo='COTIZABLES';	break;
			case '4':	$tipo='PERSONAL';	break;	
			case '5':	$tipo='TEQUETES AÉREOS';	break;	
			case '6':	$tipo='REEMBOLSO DE TRANSPORTE';	break;				
		}

		switch ($rs->d_medida) {
			case '0':	$tipo2='METROS';break;
			case '1':	$tipo2='UNIDADES';break;	
			case '2':	$tipo2='KILOGRAMOS';break;
			case '3':	$tipo2='GRAMOS';break;	
			case '4':	$tipo2='CENTIMETROS';break;
			case '5':	$tipo2='PULGADAS';break;	
			case '6':	$tipo2='LIBRAS';break;
			case '7':	$tipo2='LITROS';break;	
			case '8':	$tipo2='GALONES';break;		
		}

		array_push($result,array(
											 "id"=>$rs->id,
					    					 "tipo"=>$tipo,
					     					 "concepto"=>$rs->d_concepto,
		                            	     "cantidad"=>$rs->d_cantidad,
											 "medida"=>$tipo2,
											 "costo"=>$rs->d_costo,
		                            	     "observaciones"=>$rs->d_obs,
											 "dia"=>$rs->dia

		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>