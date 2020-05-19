<?php
require_once '../models/Mvictima.php';


	$result = array();
	$data = Mvictima::find_by_sql("select id,cid,nombre,t_doc,num_doc,tele,correo,mrequerimientos_id,status from mvictimas WHERE status=1 AND mrequerimientos_id=1 order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		switch ($rs->t_doc) {
			case '0':	$tipo='CC';break;
			case '1':	$tipo='CE';break;	
			case '2':	$tipo='PA';	break;
			
		}
		$doc= $tipo.'-'.$rs->num_doc;

		array_push($result,array(
											"id"=>$rs->id,
											"nombre"=>$rs->nombre,
					    					 "documento"=>$doc,				     					 
		                            	     "correo"=>$rs->correo,
		                            	     "telefono"=>$rs->tele

		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>