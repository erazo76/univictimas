<?php
require_once '../models/Madjuntaexcel.php';

$unid=$_GET["este"];
	$result = array();
	//echo($unid);exit();	
	$data = Madjuntaexcel::find_by_sql("select id,adjunto,no_soli from madjuntaexcels WHERE no_soli = ".$unid." order by id desc;");
	$items = 0;

	foreach ($data as &$rs) {

		
		array_push($result,array(			
											 "id"=>$rs->id,
											 "adjunto"=>$rs->adjunto
		                         ));

		$items++;

	}

//echo($data);exit();
	print_r(json_encode($result));
?>