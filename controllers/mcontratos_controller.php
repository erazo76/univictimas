<?php
require_once '../models/Mcontrato.php';
require_once '../models/Mrequerimiento.php';
require_once '../models/Msolicitude.php';
date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$cos_contrato = ($_POST["cos_contrato"]);
@$num_contrato = ($_POST["num_contrato"]);
@$id = 2;


@$sub_participacion=($_POST["sub_participacion"]);
@$dir_inter=($_POST["dir_inter"]);
@$cos_contrato=($_POST["cos_contrato"]);
@$subdir_snariv=($_POST["subdir_snariv"]);
@$subdir_nac=($_POST["subdir_nac"]);
@$grup_proy=($_POST["grup_proy"]);
@$vic_ext=($_POST["vic_ext"]);

/**********************************/

switch ($action){
  
    case 'sumar_costo':

      @$data = Mdetalle::find_by_sql('SELECT sum(d_costo_t) as tot_cos from mdetalles where mrequerimientos_id = 1 and status = 1');

    if($data !=null){
      foreach($data as $rs){
        if($rs->tot_cos==null){
          $contados=0;
        }else{
        $contados = $rs->tot_cos;      
        }
      }        
    }

      
      echo json_encode($contados);
  break;


  case 'add_asignar':

    if($sub_participacion==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el número de contrato.
          </div>');
    }else if($cos_contrato==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese la asignación del contrato.
          </div>'); 

    }else{  

      $consulta = Mcontrato::find('all',array('conditions' => array('num_contrato=?',$num_contrato)));

        if($consulta==null){  //(B) si no existe lo guarda...

          session_start();
          $usuario_id = $_SESSION['idusuariox'];
          $hoy = date('d-m-Y');

          $segme = new Mcontrato();
          $segme->num_contrato = $num_contrato;
          $segme->cos_contrato = $cos_contrato;
          $segme->user_create = $usuario_id;
          $segme->created = $hoy;
          
          $segme->sub_participacion = $sub_participacion;
          $segme->dir_inter = $dir_inter;
          $segme->cos_contrato = $cos_contrato;
          $segme->subdir_snariv = $subdir_snariv;
          $segme->subdir_nac = $subdir_nac;
          $segme->grup_proy = $grup_proy;
          $segme->vic_ext = $vic_ext;


          if($segme->save()){ // da el mensaje de guardado...

              $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-check"></i>
                  Alerta!
                  </h4>
                  Los datos han sido registrados exitosamente !.
                  </div>');

          }else{


            $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                 <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                 <h4>
                 <i class="icon fa fa-ban"></i>
                 Alerta!
                 </h4>
                 Error al registrar los datos.
                 </div>');
          }

          //echo json_encode($respuesta);

        }else{ 

            $respuesta = array('resultado'=>'alert','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <h4>
                <i class="icon fa fa-ban"></i>
                Alerta!
                </h4>
                El contrato ['.$num_contrato.'] ya se encuentra registrado.
                </div>');

         }
               // echo json_encode($respuesta);
      }
           echo json_encode($respuesta);

break;
#*******************************************************************************




  case 'add':

      if($num_contrato==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el número de contrato.
            </div>');
      }else if($cos_contrato==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la asignación del contrato.
            </div>'); 

      }else{  

        $consulta = Mcontrato::find('all',array('conditions' => array('num_contrato=?',$num_contrato)));

          if($consulta==null){  //(B) si no existe lo guarda...

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $segme = new Mcontrato();
            $segme->num_contrato = $num_contrato;
            $segme->cos_contrato = $cos_contrato;
            $segme->user_create = $usuario_id;
            $segme->created = $hoy;


            if($segme->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido registrados exitosamente !.
                    </div>');

            }else{


              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
         					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
         					<h4>
         					<i class="icon fa fa-ban"></i>
         					Alerta!
         					</h4>
         					Error al registrar los datos.
         					</div>');
            }

            //echo json_encode($respuesta);

          }else{ 

              $respuesta = array('resultado'=>'alert','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El contrato ['.$num_contrato.'] ya se encuentra registrado.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }
             echo json_encode($respuesta);

  break;
#*******************************************************************************
  case 'edit':

    if($num_contrato==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el número de contrato.
          </div>');
    }else if($cos_contrato==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese la asignación del contrato.
          </div>'); 

    }else{

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            if($sub_participacion==""){
              $sub_participacion=0;
            }
            if($dir_inter==""){
              $dir_inter=0;
            }
            if($subdir_snariv==""){
              $subdir_snariv=0;
            }
            if($subdir_nac==""){
              $subdir_nac=0;
            }
            if($grup_proy==""){
              $grup_proy=0;
            }
            if($vic_ext==""){
              $vic_ext=0;
            }

            $depa= Mcontrato::find($id);
            $depa->cos_contrato = $cos_contrato;
            $depa->num_contrato = $num_contrato;
            $depa->user_modify = $usuario_id;
            $depa->updated = $hoy;
            
            $depa->sub_participacion = $sub_participacion;
            $depa->dir_inter = $dir_inter;            
            $depa->subdir_snariv = $subdir_snariv;
            $depa->subdir_nac = $subdir_nac;
            $depa->grup_proy = $grup_proy;
            $depa->vic_ext = $vic_ext;

            if($depa->save()){

                $respuesta = array('resultado'=>'ok','message'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido actualizados exitosamente !.
                    </div>');

            }else{


              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Error al actualizar los datos.
                  </div>');


            }
            echo json_encode($respuesta);

     }
 
  break;
#*******************************************************************************
  case 'delete':

  if($record !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" /*&& ($rol ==1 || $rol==4)*/){

                  $acti= Mdetalle::find($record);
                  $acti->user_modify = $usuario_id;
                  $acti->updated = $hoy;
                  $acti->status = 0;

                  if($acti->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se desincorporo el item al Requerimiento.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al desincorporar el item.
                        </div>');

                  }
                 // echo json_encode($respuesta);
        }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Transacción denegada !
                  </div>');

        }


          echo json_encode($respuesta);

  }
  
  break;
#*******************************************************************************
  case 'search':
        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $hoy = date("d-m-Y");

      @$data = Mcontrato::find('all');

      if($data !=null){

        foreach($data as $rs){

            $resp = array(
                  "num_contrato"=>$rs->num_contrato,
                  "cos_contrato"=>$rs->cos_contrato,
                  "estado"=>"si"
            );

        }
       // print_r($resp);exit();
        echo json_encode($resp);
      }else{
        $resp = array(
          "num_contrato"=>0,
          "cos_contrato"=>0,
          "estado"=>"no"   
        );
        echo json_encode($resp);
      }
  break;

#*******************************************************************************
case 'search_asig_presupuesto':
  session_start();
  $usuario_id = $_SESSION['idusuariox'];
  $hoy = date("d-m-Y");

@$data = Mcontrato::find('all');
// $data = Mcontrato::find('all',array('conditions' => array('num_contrato=?',$num_contrato)));


if($data !=null){

  foreach($data as $rs){

      $resp = array(

            "sub_participacion"=>$rs->sub_participacion,
            "dir_inter"=>$rs->dir_inter,
            "subdir_snariv"=>$rs->subdir_snariv,
            "subdir_nac"=>$rs->subdir_nac,
            "grup_proy"=>$rs->grup_proy,
            "vic_ext"=>$rs->vic_ext
      );

  }
 // print_r($resp);exit();
  echo json_encode($resp);
}else{
  $resp = array(
    "num_contrato"=>0,
    "cos_contrato"=>0,
    "estado"=>"no"   
  );
  echo json_encode($resp);
}
break;



  #*******************************************************************************
  case 'search_presupuesto':
    session_start();
    $usuario_id = $_SESSION['idusuariox'];
    $hoy = date("d-m-Y");

    @$data = Mcontrato::find('all');
    if($data !=null){
      foreach($data as $rs){
          @$subdi_participacion = Msolicitude::find_by_sql("SELECT sum(costo_total) as sub_part_cos from msolicitudes WHERE status=1 AND grup_financ_id=1 ;");  
          @$direc_gest_inter = Msolicitude::find_by_sql("SELECT sum(costo_total) as dir_ges_cos from msolicitudes WHERE status=1 AND grup_financ_id=2;"); 
          @$direc_cord_snariv = Msolicitude::find_by_sql("SELECT sum(costo_total) as dir_cord_cos from msolicitudes WHERE status=1 AND grup_financ_id=3;"); 
          @$direc_cord_nac = Msolicitude::find_by_sql("SELECT sum(costo_total) as dir_cord_nac_cos from msolicitudes WHERE status=1 AND grup_financ_id=4;"); 
          @$grupo_gestion_proy = Msolicitude::find_by_sql("SELECT sum(costo_total) as grup_gest_cos from msolicitudes WHERE status=1 AND grup_financ_id=5;"); 
          @$victimas_ext = Msolicitude::find_by_sql("SELECT sum(costo_total) as vict_ext_cos from msolicitudes WHERE status=1 AND grup_financ_id=6;"); 

          if($subdi_participacion !=null){
            foreach($subdi_participacion as $r1){
              if($r1->sub_part_cos==null){
              $reg1=0;
              }else{
              $reg1 = $r1->sub_part_cos;      
              }
            }        
          }
          
          if($direc_gest_inter !=null){
            foreach($direc_gest_inter as $r2){
              if($r2->dir_ges_cos==null){
              $reg2=0;
              }else{
              $reg2 = $r2->dir_ges_cos;      
              }
            }        
          }

          if($direc_cord_snariv !=null){
            foreach($direc_cord_snariv as $r3){
              if($r3->dir_cord_cos==null){
              $reg3=0;
              }else{
              $reg3 = $r3->dir_cord_cos;      
              }
            }        
          }


          if($direc_cord_nac !=null){
            foreach($direc_cord_nac as $r4){
              if($r4->dir_cord_nac_cos==null){
              $reg4=0;
              }else{
              $reg4 = $r4->dir_cord_nac_cos;      
              }
            }        
          }

          if($grupo_gestion_proy !=null){
            foreach($grupo_gestion_proy as $r5){
              if($r5->grup_gest_cos==null){
              $reg5=0;
              }else{
              $reg5 = $r5->grup_gest_cos;      
              }
            }        
          }
          if($victimas_ext !=null){
            foreach($victimas_ext as $r6){
              if($r6->vict_ext_cos==null){
              $reg6=0;
              }else{
              $reg6 = $r6->vict_ext_cos;      
              }
            }        
          }

          $reg_t=$rs->cos_contrato-($reg1+$reg2+$reg3+$reg4+$reg5+$reg6);
          @$resp = array(
                    "num_contrato"=>$rs->num_contrato,
                    "cos_contrato"=>$rs->cos_contrato,
                    "estado"=>"si",
                    "sub_part_cos"=>number_format($reg1,1,',', ' '),
                    "dir_ges_cos"=>number_format($reg2,1,',', ' '),
                    "dir_cord_cos"=>number_format($reg3,1,',', ' '),
                    "dir_cord_nac_cos"=>number_format($reg4,1,',', ' '),
                    "grup_proy"=>number_format($reg5,1,',', ' '),
                    "vict_ext_cos"=>number_format($reg6,1,',', ' '),
                    "restan"=>number_format($reg_t,1,',', ' ')
                    // ,
                    // "sub_part_cos1"=>floatval($reg1),
                    // "dir_ges_cos"=>floatval($reg2),
                    // "dir_cord_cos"=>floatval($reg3),
                    // "dir_cord_nac_cos"=>floatval($reg4),
                    // "grup_gest_cos"=>floatval($reg5),
                    // "vict_ext_cos"=>floatval($reg6)

                    // $("#sub_part_cos").html( sub_part_cos +'<sup style="font-size: 20px">$</sup>' );  
                    // $("#dir_ges_cos").html( dir_ges_cos +'<sup style="font-size: 20px">$</sup>' );
                    // $("#dir_cord_cos").html( dir_cord_cos +'<sup style="font-size: 20px">$</sup>' );
                    // $("#dir_cord_nac_cos").html( dir_cord_nac_cos +'<sup style="font-size: 20px">$</sup>' );
                    // $("#vict_ext_cos").html( vict_ext_cos +'<sup style="font-size: 20px">$</sup>' );
                    // $("#grup_proy").html( grup_proy +'<sup style="font-size: 20px">$</sup>' );

          );
        
          echo json_encode($resp);
        } 
    
    }else{
          @$resp = array(
            "num_contrato"=>0,
            "cos_contrato"=>0,
            "estado"=>"no", 
            "sub_part_cos"=>floatval(0),
            "dir_ges_cos"=>floatval(0),
            "dir_cord_cos"=>floatval(0),
            "restan"=>floatval(0)   
          );
          echo json_encode($resp);
    }   
     

  break;

#*******************************************************************************
  case 'search_act':
    session_start();
    $usuario_id = $_SESSION['idusuariox'];
    $hoy = date("d-m-Y");

    @$data = Mcontrato::find('all');
    if($data !=null){
      foreach($data as $rs){
          @$individual = Msolicitude::find_by_sql("SELECT sum(costo_total) as indi_cos from msolicitudes WHERE status=1 AND tipo1 <>9 AND tipo2=6 AND tipo3=5;");  
          @$reubicacion = Msolicitude::find_by_sql("SELECT sum(costo_total) as reub_cos from msolicitudes WHERE status=1 AND tipo2 <>6 AND tipo1=9 AND tipo3=5;"); 
          @$colectiva = Msolicitude::find_by_sql("SELECT sum(costo_total) as cole_cos from msolicitudes WHERE status=1 AND tipo3 <>5 AND tipo1=9 AND tipo2=6;");
          
          if($individual !=null){
            foreach($individual as $r1){
              if($r1->indi_cos==null){
              $reg1=0;
              }else{
              $reg1 = $r1->indi_cos;      
              }
            }        
          }
          
          if($reubicacion !=null){
            foreach($reubicacion as $r2){
              if($r2->reub_cos==null){
              $reg2=0;
              }else{
              $reg2 = $r2->reub_cos;      
              }
            }        
          }

          if($colectiva !=null){
            foreach($colectiva as $r3){
              if($r3->cole_cos==null){
              $reg3=0;
              }else{
              $reg3 = $r3->cole_cos;      
              }
            }        
          }
          $reg4=$rs->cos_contrato-($reg1+$reg2+$reg3);
          @$resp = array(
                    "num_contrato"=>$rs->num_contrato,
                    "cos_contrato"=>$rs->cos_contrato,
                    "estado"=>"si",
                    "cos_indi"=>number_format($reg1,1,',', ' '),
                    "cos_reub"=>number_format($reg2,1,',', ' '),
                    "cos_cole"=>number_format($reg3,1,',', ' '),
                    "restan"=>number_format($reg4,1,',', ' '),
                    "cos_indi1"=>floatval($reg1),
                    "cos_reub1"=>floatval($reg2),
                    "cos_cole1"=>floatval($reg3)
          );
        
          echo json_encode($resp);
        } 
    
    }else{
          @$resp = array(
            "num_contrato"=>0,
            "cos_contrato"=>0,
            "estado"=>"no", 
            "cos_indi"=>floatval(0),
            "cos_reub"=>floatval(0),
            "cos_cole"=>floatval(0),
            "restan"=>floatval(0)   
          );
          echo json_encode($resp);
    }   
     

  break;

#*******************************************************************************
  case 'search_act_edit':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',$busco,1)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;

#*******************************************************************************
  case 'search_act2':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',1,0)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;


#*******************************************************************************
  case 'search_act_delete':
    
      @$data = Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

      if($data !=null){//si consigue al menos un registro de activo

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            foreach ($data as $acti) {
             
            
                  $acti->user_modify = $usuario_id;
                  $acti->updated = $hoy;
                  $acti->status = 0;

                  $acti->save();
            }
                  
      }else{

       

      }


  break;

#*******************************************************************************
  case 'search_act3':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',$recordatorio,1)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;

#******************************************************************************

    case 'get_marcas':

        @$data = Mmarca::find('all',array('conditions' => array('status=?',1),'order' => 'id desc'));

      if($data !=null){
               $resp = '<option value="" selected disabled>Indique la marca</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->nombre.'</option>';
              $resp .= '<hidden>';
            }

       }

         echo $resp;
    break;

 #******************************************************************************

    case 'temporal':

      if($tipo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el tipo de item.
            </div>');

      }else if($concepto ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese concepto del item.
            </div>');

      }else if($cantidad ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la cantidad de items.
            </div>');

      }else  if($medida ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la unidad de medida del item.
            </div>');

      }else  if($costo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el costo del item.
            </div>');

      }else  if($observaciones ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el las observaciones.
            </div>');

      }else{

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $tempo = new Mdetalle();
            $tempo->d_tipo = $tipo;
            $tempo->d_concepto = $concepto;
            $tempo->d_cantidad = $cantidad;
            $tempo->d_medida = $medida;
            $tempo->d_costo = $costo;
            $tempo->d_costo_t = $costo*$cantidad;
            $tempo->d_obs = $observaciones;
            $tempo->mrequerimientos_id = 1;
            $tempo->user_create = $usuario_id;
            $tempo->created = $hoy;
                  if($tempo->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se registro el item exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al registrar el item.
                        </div>');

                  }
      }
        echo json_encode($respuesta);
      break;

#******************************************************************************

    case 'temporal2':

      if($marca ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la marca del activo.
            </div>');

      }else if($modelo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el modelo del activo.
            </div>');

      }else  if($serial ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
           Ingrese el serial del activo.
            </div>');

      }else  if($activo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el rotulo del activo.
            </div>');

      }else  if($comodato ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el número de comodato.
            </div>');

      }else{
              @$consultata = Mactivo::find('all',array('conditions' => array('comodato=? AND status=?',$comodato,1)));
 
            if($consultata == null){

                session_start();
                $usuario_id = $_SESSION['idusuariox'];
                $hoy = date('d-m-Y');

                $tempo = new Mactivo();
                $tempo->mmarcas_id = $marca;
                $tempo->modelo = $modelo;
                $tempo->serial = $serial;
                $tempo->activo = $activo;
                $tempo->comodato = $comodato;
                $tempo->maliados_id = $id;
                $tempo->mdistribuidoras_id = $distribuidora;
                $tempo->user_create = $usuario_id;
                $tempo->created = $hoy;
                      if($tempo->save()){

                        $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-check"></i>
                            Alerta!
                            </h4>
                            Se registro el activo exitosamente !.
                            </div>');

                      }else{


                        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-ban"></i>
                            Alerta!
                            </h4>
                            Error al registrar el activo.
                            </div>');

                      }
              //echo json_encode($respuesta);
            }else{

                        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-ban"></i>
                            Alerta!
                            </h4>
                            Este activo ya esta registrado.
                            </div>');

            }  

        }
        echo json_encode($respuesta);
      break;

#******************************************************************************/
    case 'activa':

      if($id !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && ($rol ==1 || $rol ==4)){

                  $bien= Mmarca::find($id);
                  $bien->user_modify = $usuario_id;
                  $bien->updated = $hoy;
                  $bien->status = 1;

                  if($bien->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Marca activada exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al activar el registro.
                        </div>');

                  }

        }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Transacción denegada !
                  </div>');

        }


          echo json_encode($respuesta);

  }
  break;

#******************************************************************************

    case 'definitivo':

      if($recordado !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && $rol ==3 ){

                  $activoro = Maliado::find('all',array('conditions' => array('cedula=? AND l_cedula=? AND orbis=?',$recordado,$l_recordado,$l_orbis)));
                
                    foreach ($activoro as $rs) {
                                         
                      $ideado=$rs->id;


//print_r($ideado);exit();
                      $consultada=Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',intval($l_record),1)));

                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->maliados_id = $ideado;
                          $activoros->save();

                        }    
                    }            

        }


          //echo json_encode($respuesta);

  }
  break;

#******************************************************************************

    case 'definitivo2':

      if($recordado !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !=""){

                  $activoro = Mrequerimiento::find('all',array('conditions' => array('id=?',intval($recordado))));
                
                    foreach ($activoro as $rs) {
                                         
                      $ideado=$rs->id;

                    } 

                    $consultada=Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->mrequerimientos_id = $ideado;
                          $activoros->save();

                        }    
                      

        }


          //echo json_encode($respuesta);

  }
  break;  

}//end switch
?>
