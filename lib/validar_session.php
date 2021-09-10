<?php
function ValidaSession($ruta){

session_start();
$session = $_SESSION['idusuariox'];

if(!$session){
	header("Location: ".$ruta);
	die();
}elseif($session==""){
	if(!$ruta){
		header("Location:".$ruta);
		die();
	}
}
return true;

}


// function VerificarAdmin($rol){//
// 	if($rol > 1 && $rol < 4){
// 		header("Location:../inicio/denegado");
// 		die();
// 	}
// }

function VerificarAdmin($rol){//
	if($rol !=2  && $rol !=4 && $rol !=7){
		header("Location:../inicio/denegado");
		die();
	}
}

function VerificarAdminNavegador($rol){
	if($rol !=2  && $rol !=4 && $rol !=7){
		header("Location:../views/inicio/denegado");
		die();
	}
}



function VerificarAdminDigitalizacion($rol){
	if($rol <> 2 && $rol !=7){
		header("Location:../views/inicio/denegado");
		die();
	}
}


?>
