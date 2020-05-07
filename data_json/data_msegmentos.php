<?php
require_once '../models/Msegmento.php';
	$result = array();
	$data = Msegmento::find_by_sql("select id,cid,nombre,status from msegmentos WHERE status=1 order by id desc;");
	$items = 0;
	foreach ($data as &$rs) {




		array_push($result,array(   "cid"=>$rs->cid,
		                            "nombre"=>$rs->nombre

		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>