<?php
require_once '../models/Mrequerimiento.php';
require_once '../models/Minventario.php';
require_once '../models/Musuario.php';
session_start();
//$toca=0;
	//muestra toda la data
		$data = Minventario::find_by_sql("SELECT id,nombre,marca,modelo,cantidad,res,env FROM minventarios WHERE status=1 order by id desc;");

	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {
	
		array_push($result,array(
						
		                           		"id"=>$rs->id,
										"equipo"=>$rs->nombre,
										"marca"=>$rs->marca,
										"modelo"=>$rs->modelo,
										"existencias"=>$rs->cantidad,
										"reservados"=>$rs->res,
										"despachados"=>$rs->env
		                      		 
		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>