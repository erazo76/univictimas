<?php
require_once '../models/Madjunto.php';

$unid=$_GET["este"];
$result = array();
if($unid==null){
		$unid=0;
	}
session_start();
$id_sesion_usuario = $_SESSION['instante'];

if($id_sesion_usuario==null){
	$id_sesion_usuario=1;
}

	//echo($unid);exit();	
	$data = Madjunto::find_by_sql("select id,cid,imagen,mrequerimientos_id,status 
	                            from madjuntos WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
	$items = 0;
	
	if($data !=null){
		foreach ($data as &$rs) {

		
			array_push($result,array(			
									"id"=>$rs->id,
									"anexo"=>$rs->imagen
									 ));
	
			$items++;
	
		}
		
	   }else{
		
		$data_1 = Madjunto::find_by_sql("select id,cid,imagen
		                   from madjuntos WHERE status=1 
						   AND reg_temp=true
						   AND id_sesion_usuario=$id_sesion_usuario order by id desc;");

		
			foreach ($data_1 as &$rs_1) {
	
			
		      array_push($result,array(			
						"id"=>$rs_1->id,
						"anexo"=>$rs_1->imagen
								));
		
				$items++;
		
			}
			

		   }

	print_r(json_encode($result));
?>