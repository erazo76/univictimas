<?php
require_once '../models/Mequipo.php';
require_once '../models/Minventario.php';
if(intval($_GET["al"]) > 1){
	@$unid = intval($_GET["al"]);
}else{
	@$unid = 1;
}


	$result = array();
	$data = Mequipo::find_by_sql("select id,cid,equipo,marca,modelo,serial,observaciones,mrequerimientos_id,status from mequipos WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		$data2=Minventario::find_by_sql("SELECT nombre FROM minventarios WHERE id =".$rs->equipo." AND status=1 order by id desc;");
		foreach ($data2 as &$rt) {

			$unidad=$rt->nombre;

		}

		array_push($result,array(			
											 "id"=>$rs->id,
											 "unidad"=>$unidad,
					    					 "marca"=>$rs->marca,
					     					 "modelo"=>$rs->modelo,
		                            	     "serial"=>$rs->serial,	
		                            	     "observaciones"=>$rs->observaciones

		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>