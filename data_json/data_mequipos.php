<?php
require_once '../models/Madjunto.php';

$unid=$_GET["este"];
	$result = array();
	//echo($unid);exit();	
	$data = Madjunto::find_by_sql("select id,cid,imagen,mrequerimientos_id,status from madjuntos WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
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