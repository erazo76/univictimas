<?php

require_once("pdfelecciones.php");

	    $obj= new pdfreporte();
      $reporte='relecciones.php';
      if ($obj->arrp>0){

    		$obj->AliasNbPages();
    		$obj->AddPage();
    		$obj->Cuerpo();
        $obj->Footer();
    		$obj->Output();
    	}else{

            ?><script language="JavaScript" type="text/javascript">
          		alert('No Existen Datos Para este Reporte');
          		window.close();
          		//location="<?php echo "../../../vistas/maestros/reportes.php"?>";
        		  </script>
<?php } ?>
