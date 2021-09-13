<?php 

include("../../lib/validar_session.php");
ValidaSession("../login");
session_start();
$_SESSION['instante']   = time();

//VerificarAdmin($_SESSION['rolx']);

?>


<?php include("../layouts/constantes.php") ?>
<?php include_once("../layouts/cabezera.php") ?>  
<?php include_once("blank.php") ?>
<?php include_once("../layouts/pie.php") ?>  
   
