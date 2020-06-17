<?php
require_once '../models/Mrequerimiento.php';


	$result = array();

	$ejecafe = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=1;");
	$centro_o = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=2;");
	$caribe = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=3;");
	$llano = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=4;");
	$centro_s = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=5;");
	$pacifico = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as tot_cos from mrequerimientos WHERE status=1 AND mregiones_id=6;");
	
	$items = 0;

    if($ejecafe !=null){
		foreach($ejecafe as $r1){
		  if($r1->tot_cos==null){
			$reg1=0;
		  }else{
		  $reg1 = $r1->tot_cos;      
		  }
		}        
	}
	
	if($centro_o !=null){
		foreach($centro_o as $r2){
		  if($r2->tot_cos==null){
			$reg2=0;
		  }else{
		  $reg2 = $r2->tot_cos;      
		  }
		}        
	}

	if($caribe !=null){
		foreach($caribe as $r3){
		  if($r3->tot_cos==null){
			$reg3=0;
		  }else{
		  $reg3 = $r3->tot_cos;      
		  }
		}        
	}

	if($llano !=null){
		foreach($llano as $r4){
		  if($r4->tot_cos==null){
			$reg4=0;
		  }else{
		  $reg4 = $r4->tot_cos;      
		  }
		}        
	}

	if($centro_s !=null){
		foreach($centro_s as $r5){
		  if($r5->tot_cos==null){
			$reg5=0;
		  }else{
		  $reg5 = $r5->tot_cos;      
		  }
		}        
	}

	if($pacifico !=null){
		foreach($pacifico as $r6){
		  if($r6->tot_cos==null){
			$reg6=0;
		  }else{
		  $reg6 = $r6->tot_cos;      
		  }
		}        
	}
		

		array_push($result,
											 $reg1,
					    					 $reg2,
					     					 $reg3,
		                            	     $reg4,
											 $reg5,
											 $reg6

		                         );

		$items++;

	

//echo($data);exit();
	print_r(json_encode($result));
?>