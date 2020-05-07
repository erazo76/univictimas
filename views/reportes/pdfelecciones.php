
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once("../lib/general/fpdf/fpdf.php");
//include('../../funcion_.php');

        $region = $_GET["region"]; 
        $centro = $_GET["centro"]; 
        $cargo = $_GET["cargo"]; 
        $vota = $_GET["vota"]; 

        if($vota==0){
              define('VOTA','nok');
        }else if($vota==1){
              define('VOTA','ok'); 
        }else{
              define('VOTA','nini'); 
        }

        if($region==''){
              define('REGION','');
        }else{
              define('REGION',$region); 
        }

        if($centro==''){
              define('CENTRO','');
        }else{
              define('CENTRO',$centro); 
        }

        if($cargo==''){
            define('CARGO','');
        }else{
            define('CARGO',$cargo); 
        }
       
class pdfreporte extends fpdf {

   //var $total=0;
    var $reg;
     var $p=0;
     var $grupo=0;
     var $consulta="";
     var $arrp=0;

    function pdfreporte() {
        include('../../funcion_.php');
        $this->fpdf("l", "mm", "letter");
        $this->region=REGION;
        $this->centro=CENTRO;
        $this->cargo=CARGO;
        

        	$sqlreg="SELECT id, region FROM region where id=$this->region and region!='NACIONAL' ; ";
            @$resultreg = pg_query($link, $sqlreg); 
			
				if($resultreg !=null){
		   	
					while ($linea = pg_fetch_assoc($resultreg)) {
		                $nomregion = $linea['region'];
		 			}

		 		}


		    $sqlcentro="SELECT id, descripcion FROM centrotrabajo where id=$this->centro ; ";
		    @$resultcentro = pg_query($link, $sqlcentro); 

				if($resultcentro !=null){	

					while ($linea2 = pg_fetch_assoc($resultcentro)) {
		                $nomcentro = $linea2['descripcion'];
		 			}

		 		}
			

        $this->titulo='REPORTE ELECCIONES GOBERNADOR 15/10/2017';

		if($this->region == ''){

			$regional= 'TODAS';
			$central= 'TODOS';
			$cargar= 'TODOS';

		}else if($this->centro == ''){

			$regional= $nomregion;
			$central= 'TODOS';
			$cargar= 'TODOS';

		}else if($this->cargo == ''){

			$regional= $nomregion;
			$central= $nomcentro;
			$cargar= 'TODOS';

		}else{

			$regional= $nomregion;
			$central= $nomcentro;
			$cargar= $this->cargo;

		}
		$this->subtitulo1=utf8_decode($regional);
		$this->subtitulo2=utf8_decode($central);
		$this->subtitulo3=utf8_decode($cargar);
		//$this->subtitulado='';
		//echo($this->subtitulado);exit();

     $this->vota=VOTA;   

     $cadena="";
     if ($this->vota=='ok'){
        $cadena="WHERE voto=TRUE";
        $this->labelv='Votaron: ';
     }else if($this->vota=='nok'){
        $cadena="WHERE voto=FALSE";
        $this->labelv='No votaron: ';
     }else{

        $this->labelv='No reportaron: ';
     }

     $condi="";  
     if($cadena==""){
       $condi="Not";  
     }

      if($this->region=='' && $this->centro=='' && $this->cargo==''){//muestra todos los datos

        $sql2 = "SELECT  COUNT(cedula) as total from get_personal";

        $sql = "SELECT  region,
						centrotrabajo, 
						cedula, 
						nombre,
            cargo, 
						telefono, 
						(case 	when voto=TRUE then 'SI'
								when voto=FALSE then 'NO'
								else 'N/R' END) as votoa, 
						observacion 
				from 	get_personal 
				where 	cedula $condi IN (select cedula from votacion $cadena)";
				
       }else if($this->region!='' && $this->centro=='' && $this->cargo==''){ //muestra todos los datos de la region seleccionada
    
        $sql2 = "SELECT  COUNT(cedula) as total from get_personal where id_region=$this->region;";

        $sql = "SELECT  region,
                        centrotrabajo, 
                        cedula, 
                        nombre,
                        cargo, 
                        telefono, 
                        (case   when voto=TRUE then 'SI'
                                when voto=FALSE then 'NO'
                                else 'N/R' END) as votoa, 
                        observacion 
                from    get_personal
                where   id_region=$this->region AND cedula $condi IN (select cedula from votacion $cadena);";
        
       }else if($this->region!='' && $this->centro!='' && $this->cargo==''){
    
        $sql2 = "SELECT  COUNT(cedula) as total from get_personal where id_region=$this->region AND id_centrotrabajo=$this->centro;";

        $sql = "SELECT  region,
						centrotrabajo, 
						cedula, 
						nombre,
            cargo, 
						telefono, 
						(case 	when voto=TRUE then 'SI'
								when voto=FALSE then 'NO'
								else 'N/R' END) as votoa, 
						observacion 
				from 	get_personal
				where 	id_region=$this->region  AND id_centrotrabajo=$this->centro AND cedula $condi IN (select cedula from votacion $cadena);";
		
       }else{ 

        $sql2 = "SELECT  COUNT(cedula) as total from get_personal where id_region=$this->region  AND id_centrotrabajo=$this->centro AND cargo='".$this->cargo."';";

        $sql = "SELECT  region,
						centrotrabajo, 
						cedula, 
						nombre,
            cargo, 
						telefono, 
						(case 	when voto=TRUE then 'SI'
								when voto=FALSE then 'NO'
								else 'N/R' END) as votoa, 
						observacion 
				from 	get_personal
				where 	id_region=$this->region AND id_centrotrabajo= $this->centro AND cargo='".$this->cargo."' AND cedula $condi IN (select cedula from votacion  $cadena);";
      
       }
  
$this->consulta=pg_query($link,$sql);  
$this->consulta2=pg_query($link,$sql2); 
$this->total=pg_fetch_array($this->consulta2);


$this->arrp = pg_numrows($this->consulta); 
//print_r($sql);exit();
$this->arrp_p[]=array();

$this->p=0;
while($row = pg_fetch_assoc($this->consulta)){
 $this->arrp_p[$this->p] = $row;//pg_fetch_assoc($this->consulta); 
$this->p++;
}


    }//end function

    
    function Header() {

    	   $total=$this->total['total'];
           $votaron=$this->arrp;
           $porcentaje = round((($votaron/$total)*100),2);
           $this->Image('../../estadisticas/img/cabecera.jpg',10,8,258,18);		
		$fecha=date("d/m/Y");
		$this->SetFont("ARIAL", "B", 8);
		$this->SetXY(235,23);
               	$this->Cell(30,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'L');
        $this->SetXY(235,20);       	
                $this->Cell(30,10,'Fecha: '.$fecha,0,0,'L');
                $this->Ln(6);
 
 		$this->SetFont("ARIAL", "B", 14);
                $this->SetWidths(array(238));
                $this->SetAligns(array('C'));
                $this->RowM(array($this->titulo));
                $this->Ln(2);



		$this->Image('../../estadisticas/img/LOGO_SASLLA.jpg',80,245,60,15);

		if($this->region == ''){

		$this->SetFont("ARIAL", "B", 9);

		$this->SetXY(10,32);

		$this->SetTextColor('');
		$this->Cell(35,5,$this->labelv,0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$votaron.' de '.$total.' electores ('.$porcentaje.'%)'));
                $this->Ln(1);

                $this->SetXY(10,40);
                $this->SetFont("ARIAL", "B", 9);
                $this->SetTextColor('');
                $this->SetWidths(array(33,44,35,16,70,20,11,28));
                $this->SetAligns(array('C','C','C','C','C','C','C','C'));
                $this->SetBorder(true);
                $this->RowM(array('REGION','CENTRO ','CARGO ','CEDULA','NOMBRE','TELEFONO','VOTO','OBSERVACION'));
                $this->SetAligns(array('L','L','L','L','L','L','L','L'));

		}else if($this->centro == ''){

		$this->SetFont("ARIAL", "B", 9);

		$this->SetXY(10,32);

		$this->SetTextColor('');	
		$this->Cell(35,5,utf8_decode('Región:'),0,'R');  	
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo1));
                $this->Ln(1); 

		$this->SetTextColor('');
		$this->Cell(35,5,$this->labelv,0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$votaron.' de '.$total.' electores ('.$porcentaje.'%)'));
                $this->Ln(1);

                $this->SetXY(10,45);
                $this->SetFont("ARIAL", "B", 9);
                $this->SetTextColor('');
                $this->SetWidths(array(58,51,16,73,20,11,28));
                $this->SetAligns(array('C','C','C','C','C','C','C'));
                $this->SetBorder(true);
                $this->RowM(array('CENTRO ','CARGO ','CEDULA','NOMBRE','TELEFONO','VOTO','OBSERVACION'));
                $this->SetAligns(array('L','L','L','L','L','L','L'));

		}else if($this->cargo == ''){

		$this->SetFont("ARIAL", "B", 9);

		$this->SetXY(10,32);

		$this->SetTextColor('');	
		$this->Cell(35,5,utf8_decode('Región:'),0,'R');  	
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo1));
                $this->Ln(1); 

		$this->SetTextColor('');
		$this->Cell(35,5,'Centro de trabajo:',0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo2));
                $this->Ln(1); 

		$this->SetTextColor('');
		$this->Cell(35,5,$this->labelv,0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$votaron.' de '.$total.' electores ('.$porcentaje.'%)'));
                $this->Ln(1);

                $this->SetXY(10,50);
                $this->SetFont("ARIAL", "B", 9);
                $this->SetTextColor('');
                $this->SetWidths(array(65,21,93,25,11,42));
                $this->SetAligns(array('C','C','C','C','C','C'));
                $this->SetBorder(true);
                $this->RowM(array('CARGO ','CEDULA','NOMBRE','TELEFONO','VOTO','OBSERVACION'));
                $this->SetAligns(array('L','L','L','L','L','L'));

		}else{

		$this->SetFont("ARIAL", "B", 9);

		$this->SetXY(10,32);

		$this->SetTextColor('');	
		$this->Cell(35,5,utf8_decode('Región:'),0,'R');  	
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo1));
                $this->Ln(1); 

		$this->SetTextColor('');
		$this->Cell(35,5,'Centro de trabajo:',0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo2));
                $this->Ln(1); 

		$this->SetTextColor('');
		$this->Cell(35,5,'Cargo:',0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$this->subtitulo3));
                $this->Ln(1);

		$this->SetTextColor('');
		$this->Cell(35,5,'Votaron:',0,'R');
			    $this->SetWidths(array(100));
                $this->SetAligns(array('L'));                
                $this->RowM(array($this->SetTextColor(0,51,153).$votaron.' de '.$total.' electores ('.$porcentaje.'%)'));
                $this->Ln(1);

                $this->SetXY(10,55);
                $this->SetFont("ARIAL", "B", 9);
                $this->SetTextColor('');
                $this->SetWidths(array(21,113,28,11,84));
                $this->SetAligns(array('C','C','C','C','C'));
                $this->SetBorder(true);
                $this->RowM(array('CEDULA','NOMBRE','TELEFONO','VOTO','OBSERVACION'));
                $this->SetAligns(array('L','L','L','L','L','L','L','L'));			

		}



    }//end header

    function Cuerpo() {

            foreach ($this->arrp_p as $data) { 

				if($this->region == ''){

	                $this->SetFont("ARIAL", "", 8);
	                $this->SetWidths(array(33,44,35,16,70,20,11,28));
	                $this->SetAligns(array('L','L','L','L','L','L','L','L'));
	                $this->SetBorder(true);
	                $this->RowM(array($data['region'],$data['centrotrabajo'],$data['cargo'],$data['cedula'],utf8_decode($data['nombre']),$data['telefono'],$data['votoa'],$data['observacion']));
	            
				}else if($this->centro == ''){

	                $this->SetFont("ARIAL", "", 8);
                	$this->SetWidths(array(58,51,16,73,20,11,28));
	                $this->SetAligns(array('L','L','L','L','L','L','L'));
	                $this->SetBorder(true);
	                $this->RowM(array($data['centrotrabajo'],$data['cargo'],$data['cedula'],utf8_decode($data['nombre']),$data['telefono'],$data['votoa'],$data['observacion']));

				}else if($this->cargo == ''){

	                $this->SetFont("ARIAL", "", 8);
	                $this->SetWidths(array(65,21,93,25,11,42));
	                $this->SetAligns(array('L','L','L','L','L','L'));
	                $this->SetBorder(true);
	                $this->RowM(array($data['cargo'],$data['cedula'],utf8_decode($data['nombre']),$data['telefono'],$data['votoa'],$data['observacion']));
	            
				}else{

	                $this->SetFont("ARIAL", "", 8);
	                $this->SetWidths(array(21,113,28,11,84));
	                $this->SetAligns(array('L','L','L','L','L'));
	                $this->SetBorder(true);
	                $this->RowM(array($data['cedula'],utf8_decode($data['nombre']),$data['telefono'],$data['votoa'],$data['observacion']));
	            
				}                      

            }        
                   
   }


   function Footer()
    {

           $total=$this->total['total'];
           $votaron=$this->arrp;
           $porcentaje = round((($votaron/$total)*100),2);
           $this->SetFont("ARIAL", "B", 12);
           $this->SetX(173);
           $this->SetTextColor(0,51,153);

           //$this->MultiCell(87,6,'Votaron: '.$votaron.' de '.$total.' electores ('.$porcentaje.'%)',1,'C');
          // $this->Ln(1); 
           $this->Cell(94,6,$this->labelv.$votaron.' de '.$total.' electores ('.$porcentaje.'%)',1,'L'); 
           
    }

}

?>