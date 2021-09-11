<?php
require_once '../models/Mdetalle.php';
@$requerimientos = intval($_GET["al"]);

	$result = array();
	$data = Mdetalle::find_by_sql("select id,cid,d_tipo,d_concepto,d_cantidad,d_medida,d_obs,mrequerimientos_id,status from mdetalles WHERE status=1 AND mrequerimientos_id=1 order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {


		array_push($result,array(

										"tipo"=>$rs->d_tipo,
										"concepto"=>$rs->d_concepto,
										"cantidad"=>$rs->d_cantidad,
										"medida"=>$rs->d_medida,
										"observaciones"=>$rs->d_obs

		                         ));

		$items++;

	}


	print_r(json_encode($result));
?>