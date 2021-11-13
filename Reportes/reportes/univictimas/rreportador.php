<?php
	require_once("pdfreportador.php");
	$obj= new pdfreporte();
	$reporte='';
        if ($obj->arrp){
            $obj->AliasNbPages();
            $obj->AddPage();
            $obj->Cuerpo();
            $obj->Output();

	}else{
            ?><script language="JavaScript" type="text/javascript">
            alert('No Existen Datos Para este Reporte');
            //location="<?php echo $reporte?>";
            </script><?php
	}
?>
