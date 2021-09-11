<?php
require_once '../models/Mdetalle.php';
$unid=$_GET["este"];

	$result = array();
	$data = Mdetalle::find_by_sql("select id,cid,d_tipo,d_concepto,d_cantidad,d_medida,d_costo,d_obs,mrequerimientos_id,status,dia from mdetalles WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
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