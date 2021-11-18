<?php

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdoIbase.php");
require_once("../../lib/general/cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
include_once("../../lib/utiles.php");
include_once("../../lib/funciones.php");

class pdfreporte extends fpdf {

    var $reg;
    var $p=0;
    function pdfreporte() {
        $this->fpdf("p", "mm", "legal");
        $this->bd = new baseClases();
        $this->cab = new Cabecera();
        $this->fecha_desde=getvalue('fecha_inicio');
        $this->fecha_hasta=getvalue('fecha_final');

        $this->solicitud_desde=getvalue('num_sol_ini');
        $this->solicitud_hasta=getvalue('num_sol_fin');

if (($this->fecha_desde!='') && ($this->fecha_hasta!='')){

    $cadena_fecha="fecha1  BETWEEN '$this->fecha_desde' and  '$this->fecha_hasta' and";
}else{
    $cadena_fecha="";
}

if (($this->solicitud_desde!='') && ($this->solicitud_hasta!='')){

    $cadena_sol="id >= '.$this->solicitud_desde.' and id < '.$this->solicitud_hasta.' and";
}else{
    $cadena_sol="";
}


       $this->reg_sol=1;

        // $sql = "SELECT  * from msolicitudes where id= ".$this->reg_sol." and status=1 ;  ";

        $sql = "SELECT  * from msolicitudes where   $cadena_fecha $cadena_sol status=1 order by id asc ;  ";

        $this->arrp = $this->bd->select($sql);
       
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
        $this->RowM(array('REPORTE DE SOLICITUDES REALIZADAS'));
        

   
     
        

    }
    function  Footer() {
        $this->y2=257;
        $this->SetFillColor(230,230,230);
        $this->SetFont("ARIAL", "B", "8");
    }

    function Header() {
        $this->cab->poner_cabecera($this, $this->titulo, "p","","n");
        $y=$this->GetY();
        $x=$this->GetX();

        $this->getEncabezado($x, $y);
        $this->SetWidths(array(60));
        $this->SetAligns(array('L'));
        $this->SetXY(10, 23);

       // $this->getEncabezado($x, $this->y1+5);
    }//end header

        function Cuerpo() {
        $puntero = 0;
        $contador = 0;
        $id_solicitud=$this->arrp[0]['id'];

      
     
        $this->SetXY(10, 23);
        foreach($this->arrp as $data) {

            $id_dep=$data['mdepartamentos_id'];
            $sql_dep = "SELECT  nombre as departamento from mdepartamentos where cdd= ".$id_dep." and status=1 ;  ";
           
            $this->arrp_dep = $this->bd->select($sql_dep);
            $departamento=$this->arrp_dep[0]['departamento'];


            $id_mun=$data['mmunicipios_id'];
            $sql_muni = "SELECT  nombre as municipio from mmunicols where cdd= ".$id_mun." and status=1 ;  ";
            $this->arrp_muni = $this->bd->select($sql_muni);
            $municipio=$this->arrp_muni[0]['municipio'];

            
            $id_sol=$data['id'];
            $sql_total = "SELECT  sum(d_costo_t) as costo_total  from mdetalles where mrequerimientos_id= ".$id_sol." and status=1 ;  ";

            $this->arrp_total = $this->bd->select($sql_total);
            $costo_total=$this->arrp_total[0]['costo_total'];

            $costo_total= number_format($costo_total, 0, ",", ".");

            $grupos_id=$data['grupos_id'];
            $sql_grupo = "SELECT  nombre as grupo from grupos where id= ".$grupos_id." and status=1 ;  ";
            // H::PrintR($sql_grupo);exit; 

            $this->arrp_grupo = $this->bd->select($sql_grupo);

            $grupos=$this->arrp_grupo[0]['grupo'];



          
            $this->SetWidths(array(40,20,60,70));
            $this->SetAligns(array('C','C','C','C'));
            $this->SetJump(5);

            $this->SetBorder(true);
            $this->SetFillTable(0);
            $fecha=date("d/m/Y");
            $this->RowM(array('No. De solicitud',$data['cid'],'SUBDIRECCION O AREA SOLICITANTE',utf8_decode($grupos)));
       
            $this->SetWidths(array(40,150));
            $this->SetAligns(array('C','L'));
            $this->SetJump(5);
    
            $this->SetBorder(true);
            $this->SetFillTable(0);
            $this->RowM(array('NOMBRE LA ACTIVIDAD',utf8_decode($data['nombre'])));
            $this->SetBorder(true);
            $this->SetFillTable(1);
            $fecha=date("d/m/Y");
            $this->SetWidths(array(95,95));
            $this->SetAligns(array('L','L'));
            $this->SetBorder(true);
    
            $this->RowM(array('Departamento '.utf8_decode($departamento) ,'Ciudad o Municipio : '.utf8_decode($municipio)));
            $this->SetBorder(true);
            $this->SetFillTable(0);
            $this->RowM(array('MONTO DEL EVENTO: $ '.$costo_total,''));
            $this->Ln(5);
            if($this->GetY()>290){
                $this->AddPage();
            }             
          
           $this->p++;
        }                       

           
                          
       
    }//end cuerpo

    
 }


?>
