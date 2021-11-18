<?php

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdoIbase.php");
require_once("../../lib/general/cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
include_once("../../lib/utiles.php");
include_once("../../lib/funciones.php");

class pdfreporte extends fpdf {

    var $reg;
    function pdfreporte() {
        $this->fpdf("p", "mm", "legal");
        $this->bd = new baseClases();
        $this->cab = new Cabecera();
        $this->reg_sol=getvalue('n_solicitud');


        $sql = "SELECT  * from msolicitudes where id= ".$this->reg_sol." and status=1 ;  ";
        $this->arrp = $this->bd->select($sql);

        $this->a_supe=$this->arrp[0]['a_supe'];
            
        $this->a_supe_dir=$this->arrp[0]['a_supe_dir'];
          
       
        $id_dep=$this->arrp[0]['mdepartamentos_id'];
        $sql_dep = "SELECT  nombre as departamento from mdepartamentos where cdd= ".$id_dep." and status=1 ;  ";
       
        $this->arrp_dep = $this->bd->select($sql_dep);
        $id_mun=$this->arrp[0]['mmunicipios_id'];
        $sql_muni = "SELECT  nombre as mmunicipio from mmunicols where cdd= ".$id_mun." and status=1 ;  ";
        $this->arrp_muni = $this->bd->select($sql_muni);
        $grupos_id=$this->arrp[0]['grupos_id'];
        $sql_grupo = "SELECT  nombre as grupo from grupos where id= ".$grupos_id." and status=1 ;  ";
       
        $this->arrp_grupo = $this->bd->select($sql_grupo);


        $monto_reembolso = "select sum (d_costo) as monto_reembolso   from mdetalles 
                                   where mrequerimientos_id= ".$this->reg_sol." and d_tipo=8 and status=1 ;";                                                   
       
        $this->arrp_reembolso = $this->bd->select($monto_reembolso);
        $this->monto_reembolso=$this->arrp_reembolso[0]['monto_reembolso'];
        $this->monto_reembolso= number_format($this->monto_reembolso, 0, ",", ".");

        $this->rn_nombre1=strtolower($this->arrp[0]['rn_nombre1']);
        $this->rn_apellido1=strtolower($this->arrp[0]['rn_apellido1']);
        $this->rn_nombre2=strtolower($this->arrp[0]['rn_nombre2']);
        $this->rn_apellido2=strtolower($this->arrp[0]['rn_apellido2']);

        $this->rn_nombre1=ucfirst($this->rn_nombre1);
        $this->rn_apellido1=ucfirst($this->rn_apellido1);

        $this->rn_nombre2=ucfirst($this->rn_nombre2);
        $this->rn_apellido2=ucfirst($this->rn_apellido2);
        $this->nombre_apellido_responsable=$this->rn_nombre1.' '.$this->rn_nombre2.' '.$this->rn_apellido1.' '.$this->rn_apellido2;
 
        $this->correo_responsable=$this->arrp[0]['correo2'];
        $this->telefono_responsable=$this->arrp[0]['tele2'];


 
        $this->rt_nombre1=strtolower($this->arrp[0]['rt_nombre1']);
        $this->rt_apellido1=strtolower($this->arrp[0]['rt_apellido1']);
        $this->rt_nombre2=strtolower($this->arrp[0]['rt_nombre2']);
        $this->rt_apellido2=strtolower($this->arrp[0]['rt_apellido2']);

        $this->rt_nombre1=ucfirst($this->rt_nombre1);
        $this->rn_apellido1=ucfirst($this->rn_apellido1);

        $this->rt_nombre2=ucfirst($this->rt_nombre2);
        $this->rt_apellido2=ucfirst($this->rt_apellido2);

        $this->nombre_apellido_subdirector=$this->rt_nombre1.' '.$this->rt_nombre2.' '.$this->rt_apellido1.' '.$this->rt_apellido2;

        $this->correo_subdirector=$this->arrp[0]['correo1'];
        $this->telefono_subdirector=$this->arrp[0]['tele1'];

        $this->nun_funcionarios=$this->arrp[0]['entidad'];
        $this->nun_victimas=$this->arrp[0]['num_vic'];
        $this->nun_total_asistentes=$this->nun_funcionarios+ $this->nun_victimas;
        $this->descripcion=$this->arrp[0]['descripcion'];
        $this->recomendaciones=$this->arrp[0]['recomendaciones'];

         $modalidad_evento=$this->arrp[0]['modalidad_evento'];

  


  if ($modalidad_evento<2){
    $this->modalidad='Presencial';
  
  }else{
    $this->modalidad='Virtual';  
  }
  $modalidad_evento=$this->arrp[0]['modalidad_evento'];

  if ($modalidad_evento<2){
    $this->modalidad='Presencial';
  
  }else{
    $this->modalidad='Virtual';  
  }

  $plan_accion=$this->arrp[0]['plan_accion'];



  if ($plan_accion==1){
    $this->modalidad_plan_accion='Plan de acción 2021';
  
  }else if ($plan_accion==2){
    $this->modalidad_plan_accion='Plan de trabajo DGI 2021';
  }else if ($plan_accion==3){
    $this->modalidad_plan_accion='Plan de Trabajo Mesa Nacional';
  
  }
        $this->reg=0;
       
    }
    
    function RotatedText($x, $y, $txt, $angle){
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
    }
    function getEncabezado($x,$y){
        $this->SetFillColor(230,230,230);
        $this->SetFont("ARIAL", "B", 6);
        $this->SetXY($x+0, $y-20);
        $this->SetWidths(array(190));
        $this->SetAligns(array('C'));
        $this->SetBorder(1);
        $this->SetJump(12);
        $this->RowM(array(''));
        $this->SetXY($x+0, $y-20);
        $this->SetWidths(array(160));
        $this->SetAligns(array('C'));
    
        
        $this->SetXY($x+60, $y-20);
         $this->SetWidths(array(90));
        $this->SetAligns(array('C'));
        $this->SetJump(6);
        $this->RowM(array('FORMATO DE SOLICITUD PARA LA REALIZACION DE EVENTOS TALLERES O  REUNIONES'));
        $this->SetX($x+30);
        $this->SetWidths(array(130));
        $this->SetAligns(array('C'));
        $this->SetX($x+30);
        $this->SetWidths(array(130));
        $this->SetAligns(array('C'));
        $this->SetBorder(0);
        $this->SetJump(6);
        $this->RowM(array(''));

        $this->SetFillColor(230,230,230);
        $this->SetFont("ARIAL", "", 6);
        $this->SetXY($x+150, $y-20);
        $this->SetWidths(array(40));
        $this->SetAligns(array('L'));
        $this->SetBorder(true);
        $this->RowM(array(utf8_decode('Anexo 1')));
        $this->SetX($x+150);
        $this->SetWidths(array(40));
        $this->SetAligns(array('L'));
        $this->SetBorder(true);
        $this->RowM(array(utf8_decode('Version 01')));
        $this->SetX($x+150);
        $fecha=  substr($this->arrp[0]['fecha1'], 0, 10);
        $partes = explode("-", $fecha);
        $aa= $partes[0];
        $mes= $partes[1];
        $dd=$partes[2];
        $fec=$dd.'-'.$mes.'-'.$aa;

        $this->RowM(array(utf8_decode('Fecha Elaboración : '.$fec)));
      
        $this->SetXY($x+170,$y-13);
        $this->SetWidths(array(5,5,8));
        $this->SetAligns(array('L','L','L'));
        $this->SetBorder(0);
        $this->SetJump(6);
    
        $this->SetY($y-8);
        $this->SetFont("ARIAL", "", "6");

        $this->SetWidths(array(100,20,20,20,30));
        $this->SetAligns(array('C','C','C','C','C'));
        $this->SetBorder(true);
        $this->SetFillTable(0);
        $this->RowM(array('CONTRATO DE PRESTACION DE SERVICIOS No 1401 - 2021 UNIDAD PARA LAS VICTIMAS','Modalidad',$this->modalidad,utf8_decode('Plan de Acción'),utf8_decode($this->modalidad_plan_accion)));
        $this->SetY($y-4);
        $this->SetFont("ARIAL", "", "6");

        $this->SetWidths(array(20,20,40,50,60));
        $this->SetAligns(array('C','C','C','C','L'));
        $this->SetJump(5);
     
        $this->SetBorder(true);
        $this->SetFillTable(0);
        $fecha=date("d/m/Y");
        $this->RowM(array('No. De solicitud',$this->arrp[0]['cid'],'Fecha : '.$fec,'SUBDIRECCION O AREA SOLICITANTE',utf8_decode($this->arrp_grupo[0]['grupo'])));
   

        $this->SetWidths(array(190));
        $this->SetAligns(array('C'));
        $this->SetBorder(true);
        $this->SetFillTable(1);
        $this->SetFont("ARIAL", "B", "8");
        $this->RowM(array('1) INFORMACION GENERAL.'));
        

        $this->SetY($y+5);
        $this->SetFont("ARIAL", "", "6");

        $this->SetWidths(array(40,150));
        $this->SetAligns(array('C','L'));
        $this->SetJump(5);

        $this->SetBorder(true);
        $this->SetFillTable(0);
        $this->SetJump(4);

        $this->RowM(array('OBJETO DEL CONTRATO',utf8_decode('Prestar servicios técnicos, operativos y logísticos, para contribuir al fortalecimiento de las entidades que conforman  al SNARIV, la aplicación de la estrategia de corresponsabilidad, la participación efectiva de las victimas y la articulación de acciones y oferta entre entidades nacionales y territoriales ')));
        $this->SetBorder(true);
        $this->SetFillTable(0);
        $this->RowM(array('NOMBRE LA ACTIVIDAD',utf8_decode($this->arrp[0]['nombre'])));
   

        $this->SetWidths(array(20,40,16,35,12,15,18,15,19));
        $this->SetAligns(array('L','L','L','L','L','L','L','L','L'));
        $this->SetJump(4);
        $this->SetFont("ARIAL", "B", "7");

        // $this->arrp[0]['fecha2'];
        // $id_mun=$this->arrp[0]['fecha3'];


        $fecha1=  substr($this->arrp[0]['fecha2'], 0, 10);
        $fecha2=  substr($this->arrp[0]['fecha3'], 0, 10);
        $partes = explode("-", $fecha1);
        $aa= $partes[0];
        $mes= $partes[1];
        $dd=$partes[2];
        $fec1=$dd.'-'.$mes.'-'.$aa;

        $partes_2 = explode("-", $fecha2);
        $aa2= $partes_2[0];
        $mes2= $partes_2[1];
        $dd2=$partes_2[2];
        $fec2=$dd2.'-'.$mes2.'-'.$aa2;
       

        $startTimeStamp = strtotime($this->arrp[0]['fecha2']);
        $endTimeStamp = strtotime($this->arrp[0]['fecha3']);

         $timeDiff = abs($endTimeStamp - $startTimeStamp);
         $numberDays = $timeDiff/86400;  // 86400 seconds in one day

        $numberDays = intval($numberDays+1);
        
      
        $this->SetBorder(true);
        $this->SetFillTable(0);
        $fecha=date("d/m/Y");
        $this->RowM(array('Departamento','','Ciudad o Municipio : ','','Fecha Inicio :','','Fecha Finalizacion','','Nro de dias '.$numberDays));
        $this->SetY($this->GetY()-7);
        $this->SetBorder(0);
        $this->arrp_dep[0]['departamento'];
        $this->arrp_muni[0]['mmunicipio'];

        $this->SetFont("ARIAL", "", "6");
        $this->RowM(array('',$this->arrp_dep[0]['departamento'],' ',$this->arrp_muni[0]['mmunicipio'],'', $fec1,'', $fec2,''));

        $this->cantidad=strlen($this->descripcion);
        if ($this->cantidad>220){
            $descripcion = substr($this->descripcion, 0, 220) . '...';

        }else{
            $descripcion =$this->descripcion;

        }
        
        $this->Rect(10,$this->GetY()+3,190,10);
        $this->Rect(10,$this->GetY()+3,40,10);


       
        $this->SetFont("ARIAL", "", "6");

        $this->SetWidths(array(40,98,52));
        $this->SetAligns(array('C','L','C'));
        //$this->SetJump(12);

        $this->SetBorder(0);
        $this->SetFillTable(0);
        $this->SetJump(3);
        $this->SetY($this->GetY()+3);
        $this->y_fija=$this->GetY()+3;
        
        $this->RowM(array('                                                         DESCRIPCION BREVE DEL EVENTO',utf8_decode($descripcion),''));
       
         if ($this->cantidad<150){
            $this->Ln(6);
         }        
         $this->SetWidths(array(52));
         $this->SetAligns(array('L'));
         $this->SetBorder(1);   $this->SetFont("ARIAL", "", 6);
     
            $this->SetXY(148, $this->y_fija-3);;
     

        $this->RowM(array(utf8_decode('Nro de Personas Esperadas : '.$this->nun_total_asistentes)));


        $this->SetFont("ARIAL", "", 6);
        $this->SetXY(148, $this->GetY());
        $this->SetWidths(array(26,26));
        $this->SetAligns(array('L','L'));
         $this->SetJump(5);

        $this->SetBorder(true);
        $this->RowM(array('VICTIMAS : '.$this->nun_victimas,'FUNCIONARIOS : '.$this->nun_funcionarios));
        $this->SetXY(10, $this->GetY()+1);

        $this->SetWidths(array(50,50,20,70));
        $this->SetAligns(array('C','C','C','C'));
        $this->SetBorder(1);
        $this->SetFont("ARIAL", "B", "5");
        $this->SetJump();
        $this->RowM(array('SUPERVISOR DEL CONTRATO','Aura Helena Acevedo','EMAIL : ','aura.acevedo@unidadvictimas.gov.co'));
        $this->SetWidths(array(50,50,50,40));
        $this->SetAligns(array('C','C','L','L'));
        $this->SetBorder(true);
        $this->RowM(array('SUBDIRECTOR (A) SOLICITANTE',utf8_decode($this->nombre_apellido_subdirector),'EMAIL : '.$this->correo_subdirector,utf8_decode('TELÉFONO: '.$this->telefono_subdirector)));
        $this->RowM(array('RESPONSABLE DEL EVENTO',utf8_decode($this->nombre_apellido_responsable),'EMAIL : '.$this->correo_responsable,utf8_decode('TELÉFONO: '.$this->telefono_responsable)));







        $this->SetWidths(array(190));

        $this->SetAligns(array('C'));

        

        $this->SetBorder(true);
        $this->SetFillTable(1);
        $this->SetFont("ARIAL", "B", "8");
        $this->RowM(array(utf8_decode('2) REQUERIMIENTOS LOGÍSTICOS')));
        $this->SetWidths(array(48,142));
        $this->SetFont("ARIAL", "B", "6");
        $this->SetAligns(array('C','C'));
        $this->SetBorder(true);
        $this->SetJump(8);        
        $this->RowM(array('Concepto',''));
        
        $this->SetXY(90, $this->GetY()-8);
        $this->SetJump(3);  
        $this->SetWidths(array(70));   
        $this->SetAligns(array('C'));   
        $this->RowM(array('Servicios y Cantidades Aproximadas Solicitadas'));
        $this->SetXY(58, $this->GetY());
        $this->SetJump(3);  
        $this->SetFont("ARIAL", "B", "4");

        $this->SetWidths(array(11,11,11,11,11,11,11));
        $this->SetAligns(array('C','C','C','C','C','C','C')); 
        $this->SetBorder(true);

        $this->RowM(array(utf8_decode('Día Previo3'),utf8_decode('Día Previo2'),utf8_decode('Día Previo'),utf8_decode('Día 1'),utf8_decode('Día 2'),utf8_decode('Día 3'),utf8_decode('Día.Posterior')));
        $this->SetWidths(array(48,11,11,11,11,11,11,11,11,54));
        $this->SetAligns(array('C','L','L','L','L','L','L','L','C','C')); 
        $this->SetBorder(true);
        $this->SetFont("ARIAL", "B", "5");

        // Habilitar cuando se pueda hacer el arreglo de fechas

         $this->RowM(array('FECHAS DEL EVENTO','','','','','','','','TOTAL','OBSERVACIONES'));


        $var_y=$this->GetY()+20;
        $var_y1=$this->GetY()+50;
        $var_y2=$this->GetY()+80;
        $var_y3=$this->GetY()+110;
        $ycuadro=$this->GetY();


        $this->SetBorder(true);
        $this->SetFillTable(1);
        $this->SetFont("ARIAL", "", "9");
        $this->SetFillTable(1);

         $this->SetFillColor(230,230,230);
         $this->Rect(13,$var_y-20, 187,$var_y-75);
         $this->Rect(13,$var_y1-11, 187,$var_y1-95);
         $this->Rect(13,$var_y2+8, 187,$var_y2-135);
         $this->Rect(13,$var_y3+17, 187,$var_y3-168);
                
         $this->Rect(10,$var_y-20, 3,163);


           

        $this->RotatedText(12.5,$var_y+13,'ALOJAMIENTO',90);

         $this->RotatedText(12.5,$var_y1+25,'LOGISTICA',90);

         $this->RotatedText(12.5,$var_y2+39,'ADICIONALES',90);

         $this->RotatedText(12.5,$var_y3+45,'MATERIALES',90);



/////##################################################################
        
    }

    
    function  Footer() {
        $this->y2=257;
        $this->SetFillColor(230,230,230);
        $this->SetFont("ARIAL", "B", "8");
        
		if(strlen($this->arrp[0]['observacion'])>90){
			$this->SetFont("ARIAL", "B",7);
			$direccion=utf8_decode($this->arrp[0]['observacion']);
                         $estirar_y=15;
			
		}else{
			$direccion=utf8_decode($this->arrp[0]['observacion']);
                       
		}     
    
 
        $this->SetY($this->y2+$estirar_y);
        // $this->SetWidths(array(190));
        // $this->SetAligns(array('L'));
       

        $this->SetWidths(array(48,11,11,11,11,11,11,11,11,54));
        $this->SetAligns(array('C','C','C','C','C','C','C','C','C','C')); 
        $this->SetBorder(true);  
        $this->SetFillTable(0);

        $this->RowM(array('TIQUETES AEREOS: ','','','','','','','','',''));    
        $this->SetFillTable(0);

        
        $this->SetY($this->GetY());
        $this->SetWidths(array(190));
        $this->SetAligns(array('L'));
        $this->SetBorder(true);
     
        $this->SetY($this->GetY());
        $this->SetWidths(array(190));
        $this->SetFont("ARIAL", "B", "6");

        $this->SetAligns(array('C'));
        $this->SetBorder(true);
        $this->SetFillTable(1);
        $this->RowM(array('3. PAGO A TERCEROS'));
        $this->SetFillTable(1);

        $this->SetWidths(array(60,130));
        $this->SetAligns(array('L','C'));
        $this->SetFillColor(230,230,230);
        $this->SetFont("ARIAL", "B", "6");
        $this->SetFillTable(1);
        $this->SetBorder(1);
        $this->RowM(array('VALOR A DESEMBOLSAR:  $ '.$this->monto_reembolso,utf8_decode('OBSERVACIONES / JUSTIFICACIÓN')));
        $this->SetFillTable(1);

        $this->SetWidths(array(60));
        $this->SetAligns(array('C'));
        $this->SetJump(5);

        $this->SetBorder(true);
        $this->SetFillTable(1);
        $this->SetJump(15);
        $this->RowM(array('Sugerencias y recomendaciones:'));
        $this->SetXY(10,$this->GetY()-15);

        
        $this->SetWidths(array(60,130));
        $this->SetAligns(array('C','C'));
        $this->SetJump(5);

        $this->SetBorder(true);
        $this->SetFillTable(0);
        $this->SetJump(15);
        $this->RowM(array('',''));

        $this->SetXY(50,$this->GetY()-14);

        $this->SetWidths(array(140));
        $this->SetAligns(array('L',));
        $this->SetJump(2);
        $this->SetFont("times", "", "4.5");

        $this->SetBorder(1);
         $this->SetFillTable(0);
        $this->SetTextColor(255,0,0);
        $this->SetX(70);
        $this->SetBorder(0);

        $this->RowM(array(utf8_decode( $this->recomendaciones)));
        $this->SetX(70);
 
        $this->SetY(284);
        $this->SetWidths(array(190));
        $this->SetAligns(array('L',));
        $this->SetTextColor(0,0,0);
        $this->SetBorder(true);
        $this->SetFillTable(0);
        $this->SetJump(29);
        $this->SetY($this->GetY());
         $this->RowM(array(''));
         $this->SetBorder(0);
         $this->SetAligns(array('L'));

         $this->SetY($this->GetY()-42);
         $this->RowM(array('OBSERVACIONES GENERALES'));
         $this->SetY($this->GetY()-13);
         $this->SetJump(2);
         $this->SetFont("courier", "", "5");
         $this->RowM(array(utf8_decode('1. Debe confirmarse sitio del evento con 3 días como mínimo de anticipación y la confirmación de la convocatoria.')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('2. Se debe enviar los menús por lo menos con dos días de anticipación al responsable del evento para su aprobación')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('3. Solamente se deben alojar las personas que aparecen en el listado anexo, no se admiten acompañantes, escoltas entre otros; y en los hoteles no debe haber consumo libre, minibares, lavandería, llamadas telefónicas, puntos de internet, cajas fuertes y/o servicios adicionales.')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('4. Solamente se deben entregar alimentos a las personas que aparecen en el listado anexo, en ningún caso a acompañantes, escoltas entre otros.')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('5. Para el apoyo a gastos de transporte se requiere disponer de la suma en efectivo presupuestada para la actividad de acuerdo al protocolo de participación de víctimas.')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('6. El sitio del evento debe contar permanentemente con la presencia de la Defensa Civil y/o Cruz Roja, un paramédico, enfermería, puesto de salud (camilla, botiquín, servicio de primeros auxilios) y servicio de seguridad en los alrededores del sitio, por lo tanto se debe coordinar con las respectivas autoridades locales, cuando se trate de eventos masivos,(mayores de 100 personas). Se debe conocer y manejar la ruta de evacuación definida por el sitio donde se desarrollará el evento, esta debe ser presentada al inicio de cada evento. Para eventos masivos (mayores de 100 personas) debe tenerse en cuenta la Guía de Aplicación que recoge el articulo 6 del Decreto 3888 de 2007, sin perjuicio de las disposiciones locales que rijan sobre ese tema y la magnitud del evento.')));
         $this->SetY($this->GetY());

         $this->RowM(array(utf8_decode('7. Cualquier solicitud adicional se deberá tramitar directamente a los responsables de la DGI a través de correo electrónico.')));
        
         $aprobado='';
         $autorizado='';
         if($this->a_supe==1){
             $aprobado='APROBADO POR :';
             $autorizado='AUTORIZADO POR :';
         }
         if($this->a_supe_dir==1){
            $autorizado='AUTORIZADO POR :';
        }

        if($this->a_supe==2){
            $aprobado='RECHAZADO POR :';
        }
        if($this->a_supe_dir==2){
           $autorizado='RECHAZADO POR :';
       }


        $this->SetY($this->GetY()+5);
        $this->SetWidths(array(60,70,60));
        $this->SetFont("courier", "B", "6");
        $this->SetAligns(array('C','C','C'));
        $this->RowM(array('SOLICITADO POR',$autorizado,$aprobado));
        $this->Ln(1);
        $this->RowM(array(utf8_decode($this->nombre_apellido_responsable),utf8_decode($this->nombre_apellido_subdirector),'Aura Helena Acevedo Vargas'));
        $this->RowM(array('Responsable del Evento','Sub-director(a) Solicitante',utf8_decode('Supervisión del Contrato')));
        $this->SetFont("courier", "B", "5");     
        $this->Ln(2);
        $this->SetAligns(array('C','C','C'));
        $this->RowM(array('Vo B0: Claudia Aristizabal Gil',utf8_decode('Revisado: Isaias Lozano Vera'),utf8_decode('Verificado: Javier Diaz Rojas')));

        $this->SetBorder(true);
        
    }

    function Header() {
        $this->cab->poner_cabecera($this, $this->titulo, "p","","n");
        $y=$this->GetY();
        $x=$this->GetX();

        $this->getEncabezado($x, $y);
        $this->SetWidths(array(60));
        $this->SetAligns(array('L'));

       // $this->getEncabezado($x, $this->y1+5);
    }//end header

        function Cuerpo() {
        $puntero = 0;
        $contador = 0;
        $id_solicitud=$this->arrp[0]['id'];

      
        $sql_tipo = " select  distinct d_tipo from mdetalles
                        WHERE mrequerimientos_id=".$id_solicitud." and status=1 ";
        $this->arrp_tipo = $this->bd->select($sql_tipo);
        $k=0;
        $y_1=1;
        $y_2=1;
        $y_3=1;
        $y_4=1;
        $y_5=1;
        $y_6=1;
        $conta_1=0;
        $conta_2=0;
        $conta_3=0;
        $conta_4=0;
        $conta_5=0;
        $conta_6=0;
  
        foreach($this->arrp_tipo as $data_arrp_tipo) {

            

            $tipo=$data_arrp_tipo['d_tipo'];


            $sql_concepto = "   select  distinct d_concepto from mdetalles
                             WHERE mrequerimientos_id=".$id_solicitud." and status=1 and d_tipo=$tipo ";

            $this->arrp_concepto = $this->bd->select($sql_concepto);
                 

            foreach($this->arrp_concepto as $data_arrp_concepto) {
                $concepto_x=$data_arrp_concepto['d_concepto'];

             
            $sql_detalle_concepto = " select d_cantidad,d_concepto,d_obs,id_categoria,d_tipo,
                                                    case WHEN dia='previo 3' then  'p3'
                                                    WHEN dia='previo 2' then      'p2'
                                                    WHEN dia='previo 1' then      'p1'
                                                    WHEN dia='Dia 1' then         'D1' 
                                                    WHEN dia='Dia 2' then         'D2' 
                                                    WHEN dia='Dia 3' then         'D3' 
                                                    WHEN dia='Dia posterior' then 'DP' end  AS DIA
                                                    from mdetalles
                                                        WHERE 
                                                        mrequerimientos_id=".$id_solicitud." 
                                                        and d_tipo=$tipo
                                                        and d_concepto='$concepto_x'                                        
                                                        and status=1 
                                                        order by id_categoria,d_concepto ; ";

             $this->arrp_detalle_concepto = $this->bd->select($sql_detalle_concepto);

              
                //   H::PrintR($str2);exit; 
                $concepto= $this->arrp_detalle_concepto[0]['d_concepto'];

                $total= $monto_p3=$monto_p2=$monto_p1=$monto_d1=$monto_d2=$monto_d3=$monto_dp='';

                 foreach($this->arrp_detalle_concepto as $data_arrp_concepto) {

                    $r_tipo=$data_arrp_concepto['d_tipo']; 
                  
                  //  if (($concepto==$data_arrp_concepto['d_concepto'])){


                 if($data_arrp_concepto['dia']=='p3'){
                    $monto_p3+=$data_arrp_concepto['d_cantidad'];
                } else  if($data_arrp_concepto['dia']=='p2'){
                    $monto_p2+=$data_arrp_concepto['d_cantidad'];

                }else  if($data_arrp_concepto['dia']=='p1'){
                    $monto_p1+=$data_arrp_concepto['d_cantidad'];

                }else  if($data_arrp_concepto['dia']=='D1'){
                    $monto_d1+=$data_arrp_concepto['d_cantidad'];

                }else  if($data_arrp_concepto['dia']=='D2'){
                    $monto_d2+=$data_arrp_concepto['d_cantidad'];

                }else  if($data_arrp_concepto['dia']=='D3'){
                    $monto_d3+=$data_arrp_concepto['d_cantidad'];

                }else  if($data_arrp_concepto['dia']=='DP'){
                    $monto_dp+=$data_arrp_concepto['d_cantidad'];

                }

                $this->long=strlen($data_arrp_concepto['d_obs']);
                if ($this->long>60){
                    $observacion = substr($data_arrp_concepto['d_obs'], 0, 59) . '_';
        
                }else{
                    $observacion = $data_arrp_concepto['d_obs'];        
                }


                $observacion=utf8_decode($observacion);
               
                $total= $monto_p3+ $monto_p2+ $monto_p1+$monto_d1+$monto_d2+$monto_d3+$monto_dp;
      //// *****************************
            }
                                  
                                    $categoria=0;
                                    if($r_tipo==3){
                                        $categoria=1; // Alojamiento
                                        $y_1=$y_1+4;
                                        $conta_1++;
                                    }else if (($r_tipo==4)||($r_tipo==6)||($r_tipo==1)){

                                        $categoria=2; //Logistica
                                        $y_2=$y_2+4;
                                        $conta_2++;
                                    } else if (($r_tipo==5)||($r_tipo==7)){
                                        $categoria=3; //Materiales
                                        $y_3=$y_3+4;
                                        $conta_3++;
                                    }else if (($r_tipo==2)||($r_tipo==10)){
                                        $categoria=4; //Adicionales
                                        $y_4=$y_4+4;
                                        $conta_4++;
                                    }else if($r_tipo==9){
                                        $categoria=5; //Tiquetes Aereos
                                        $y_5=$y_5+4;
                                        $conta_5++;
                                    }
                            
                                if($categoria==1){    // Alojamiento
                                        $this->SetXY(13, 89+$y_1);
                                        $this->SetJump(1);  
                                        $this->SetFont("ARIAL", "B", "4"); 
                                        $this->SetWidths(array(45,11,11,11,11,11,11,11,11,54));
                                        $this->SetAligns(array('L','C','C','C','C','C','C','C','C','C'));   
                                        $this->SetBorder(1);  
                                        $this->RowM(array(utf8_decode($concepto),$monto_p3,$monto_p2,$monto_p1,$monto_d1,$monto_d2,$monto_d3,$monto_dp,$total,$observacion));
                                       if($conta_1>=9){
                                        $this->AddPage();
                                        $conta_1=0;
                                       }

                                    }else  if($categoria==2){ //LOGISTICA
                                        $this->SetXY(13, 128+$y_2);
                                        $this->SetJump(1);  
                                        $this->SetFont("ARIAL", "B", "4"); 
                                        $this->SetWidths(array(45,11,11,11,11,11,11,11,11,54));
                                        $this->SetAligns(array('L','C','C','C','C','C','C','C','C','C'));   
                                        $this->SetBorder(1);  
                                         $this->RowM(array(utf8_decode($concepto),$monto_p3,$monto_p2,$monto_p1,$monto_d1,$monto_d2,$monto_d3,$monto_dp,$total,$observacion));
                                        if($conta_2>11){
                                            $this->AddPage();
                                            $conta_2=0;
                                           }

                                 }else  if($categoria==3){   //Materiales
                                        $this->SetXY(13, 216+$y_3);
                                        $this->SetJump(1);  
                                        $this->SetFont("ARIAL", "B", "4"); 
                                        $this->SetWidths(array(45,11,11,11,11,11,11,11,11,54));
                                        $this->SetAligns(array('L','C','C','C','C','C','C','C','C','C'));   
                                        $this->SetBorder(1);  
                                        $this->RowM(array(utf8_decode($concepto),$monto_p3,$monto_p2,$monto_p1,$monto_d1,$monto_d2,$monto_d3,$monto_dp,$total,$observacion));
                                        if($conta_3>=9){
                                            $this->AddPage();
                                            $conta_3=0;
                                           }
                                    }else  if($categoria==4){  //Adicionales
                                        $this->SetXY(13, 177+$y_4);

                                        $this->SetJump(1);  
                                        $this->SetFont("ARIAL", "B", "4"); 
                                        $this->SetWidths(array(45,11,11,11,11,11,11,11,11,54));
                                        $this->SetAligns(array('L','C','C','C','C','C','C','C','C','C'));   
                                        $this->SetBorder(1);  

                                         $this->RowM(array(utf8_decode($concepto),$monto_p3,$monto_p2,$monto_p1,$monto_d1,$monto_d2,$monto_d3,$monto_dp,$total,$observacion));
                                        if($conta_4>10){
                                            $this->AddPage();
                                            $conta_4=0;
                                           }
                                    }
                                    else  if($categoria==5){ //Tiquetes Aereos
                                        $this->SetXY(10, 252+$y_5);
                                        $this->SetJump(1);

                                        $this->SetFont("ARIAL", "B", "4"); 

                                        $this->SetWidths(array(48,11,11,11,11,11,11,11,11,54));
                                        $this->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));   
                                        // $this->SetBorder(1);  
                                        // $this->SetFillTable(1);
                                         $this->SetFillColor(250,250,250);

                                         $this->RowM(array('',$monto_p3,$monto_p2,$monto_p1,$monto_d1,$monto_d2,$monto_d3,$monto_dp,$total,$observacion));
                                        $this->SetFillTable(0);
                                        if($conta_5>=9){
                                            $this->AddPage();
                                            $conta_5=0;
                                           }
                                    }
       

        ///************************** */


                $concepto=$data_arrp_concepto[$k]['d_concepto'];
                $d_tipo=$data_arrp_concepto[$k]['d_tipo'];
                $k++;


        
 }   /////////         foreach($this->arrp_tipo as $data_arrp_tipo) {

                   
                           
        }  // FIN data_arrp_detalle
           
                          
       
    }//end cuerpo

    
 }


?>
