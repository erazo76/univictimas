<?php
require_once '../models/Mactivo.php';
require_once '../models/Mmarca.php';

	$result = array();
	$data = Mactivo::find_by_sql("select id,cid,mmarcas_id,modelo,serial,activo,maliados_id,status,comodato from mactivos WHERE status=1 AND maliados_id=1 order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		$data2 = Mmarca::find_by_sql("select id,cid,nombre,status from mmarcas WHERE id=".$rs->mmarcas_id." AND status=1 order by id desc;");

		foreach ($data2 as &$rt) {
			$marcado=$rt->nombre;
		}

		array_push($result,array(

					     "cid"=>$rs->cid,
					     "marca"=>$marcado,
		                            	     "modelo"=>$rs->modelo,
		                            	     "serial"=>$rs->serial,
		                            	     "activo"=>$rs->activo,
		                            	     "comodato"=>$rs->comodato

		                         ));

		$items++;

	}


	print_r(json_encode($result));
?>