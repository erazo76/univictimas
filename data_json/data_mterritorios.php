<?php
require_once '../models/Mterritorio.php';
require_once '../models/Mdistribuidora.php';
	$result = array();
	$data = Mterritorio::find_by_sql("select id,cid,orbis,nombre,mdistribuidoras_id,status,modulo,l_rif,c_rif from mterritorios WHERE status=1 order by id desc;");
	$items = 0;
	foreach ($data as &$rs) {
		$rif=$rs->l_rif.$rs->c_rif;
		$data2 = Mdistribuidora::find_by_sql("select id,cid,nombre,status from mdistribuidoras WHERE status=1 and id=".$rs->mdistribuidoras_id." order by id desc;");

		foreach ($data2 as &$rt) {
		
			$nomdist=$rt->nombre;
	
		}



		array_push($result,array(

					     "cid"=>$rs->cid,
					     "orbis"=>strtoupper($rs->orbis),
		                 "nombre"=>$rs->nombre,
		                 "distribuidora"=>$nomdist,
		                 "modulo"=>$rs->modulo,
		                 "rif"=>$rif

		                         ));
		$items++;
	}


	print_r(json_encode($result));
?>