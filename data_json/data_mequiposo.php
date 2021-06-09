<?php
require_once '../models/Madjuntado.php';

$unid=$_GET["este"];
	$result = array();
	//echo($unid);exit();	
	$data = Madjuntado::find_by_sql("select id,cid,imagen,mrequerimientos_id,status from madjuntados WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		
		array_push($result,array(			
											 "id"=>$rs->id,
											 "anexo"=>$rs->imagen
		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>