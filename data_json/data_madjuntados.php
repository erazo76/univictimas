<?php
require_once '../models/Madjuntado.php';

$unid=$_GET["este"];
$result = array();

session_start();
$id_sesion_usuario = $_SESSION['instante'];

if($id_sesion_usuario==null){
	$id_sesion_usuario=1;
}

$data_delete = Madjuntado::find_by_sql("delete from madjuntados where reg_temp=true and id_sesion_usuario=1;");

 
$data_search = Mrequerimiento::find_by_sql("SELECT id FROM Mrequerimientos WHERE status=1 and id=$unid ");


if($data_search !=null){
	$cadena='AND reg_temp=false and mrequerimientos_id='.$unid.' ';
   }else{
	if ($id_sesion_usuario>1){
		$cadena='AND reg_temp=true and id_sesion_usuario='.$id_sesion_usuario.'';
	
	  }else {
		$cadena='AND reg_temp=false ';
	
	  }
   }


	$data = Madjuntado::find_by_sql("select id,cid,imagen,mrequerimientos_id,status 
	                            from madjuntados WHERE status=1 $cadena order by id desc;");
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