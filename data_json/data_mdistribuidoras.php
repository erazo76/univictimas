<?php
require_once '../models/Mdistribuidora.php';
require_once '../models/Mregione.php';
	$result = array();
	$data = Mdistribuidora::find_by_sql("select id,cid,nombre,mregiones_id,status from mdistribuidoras WHERE status=1 order by id desc;");
	$items = 0;
	foreach ($data as &$rs) {

			$data2 = Mregione::find_by_sql("select id,nombre,status from mregiones WHERE status=1 AND id=".$rs->mregiones_id." order by id desc;");

			foreach ($data2 as &$rt) {

				$regio=$rt->nombre;

			}

		array_push($result,array(
						 "cid"=>$rs->cid,
		                           		 "nombre"=>$rs->nombre,
		                           		 "region"=>$regio

		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>