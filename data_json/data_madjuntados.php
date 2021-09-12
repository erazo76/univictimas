<?php
require_once '../models/Madjuntado.php';
require_once '../models/Msolicitude.php';

$unid=$_GET["este"];
session_start();
$id_sesion_usuario = $_SESSION['instante'];

	$result = array();



	$data_search = Msolicitude::find_by_sql("SELECT id FROM Msolicitudes WHERE status=1 and id=$unid ");
  
	$cadena='AND reg_temp=true and id_sesion_usuario='.$id_sesion_usuario.'';

	if($data_search !=null){
		$cadena='AND reg_temp=false and mrequerimientos_id='.$unid.' ';
	   }

	$result = array();
	//echo($unid);exit();	
	$data = Madjuntado::find_by_sql("select id,cid,imagen,mrequerimientos_id,status from madjuntados WHERE status=1 $cadena order by id desc;");
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