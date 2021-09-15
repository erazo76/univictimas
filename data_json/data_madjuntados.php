<?php
require_once '../models/Madjuntado.php';

$unid=$_GET["este"];
$result = array();

session_start();
$id_sesion_usuario = $_SESSION['instante'];

if($id_sesion_usuario==null){
	$id_sesion_usuario=1;
}

	$data = Madjuntado::find_by_sql("select id,cid,imagen,mrequerimientos_id,status 
	                            from madjuntados WHERE status=1 AND mrequerimientos_id=".$unid." order by id desc;");
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
		
		$data_1 = Madjuntado::find_by_sql("select id,cid,imagen
		                   from madjuntados WHERE status=1 
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