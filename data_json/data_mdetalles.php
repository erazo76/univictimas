<?php
require_once '../models/Mdetalle.php';


	$result = array();
	$data = Mdetalle::find_by_sql("select id,cid,d_tipo,d_concepto,d_cantidad,d_medida,d_obs,mrequerimientos_id,status from mdetalles WHERE status=1 AND mrequerimientos_id=1 order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		switch ($rs->d_tipo) {
			case '1':	$tipo='SALONES';break;
			case '2':	$tipo='ALIMENTACIÓN';break;	
			case '3':	$tipo='MATERIALES';	break;
			case '4':	$tipo='COTIZABLES';	break;				
		}

		switch ($rs->d_medida) {
			case '1':	$tipo2='METROS';break;
			case '2':	$tipo2='UNIDADES';break;	
			case '3':	$tipo2='KILOGRAMOS';break;
			case '4':	$tipo2='GRAMOS';break;	
			case '5':	$tipo2='CENTIMETROS';break;
			case '6':	$tipo2='PULGADAS';break;	
			case '7':	$tipo2='LIBRAS';break;
			case '8':	$tipo2='LITROS';break;	
			case '9':	$tipo2='GALONES';break;		
		}

		array_push($result,array(
											 
					    					 "tipo"=>$tipo,
					     					 "concepto"=>$rs->d_concepto,
		                            	     "cantidad"=>$rs->d_cantidad,
		                            	     "medida"=>$tipo2,
		                            	     "observaciones"=>$rs->d_obs

		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>