<?php
//session_start();
session_start([
  'cache_limiter' => 'private',
  'read_and_close' => true,
]);
@$usuario_id = $_SESSION['idusuariox'];
require_once '../mail/class.phpmailer.php';
require_once '../mail/class.smtp.php';
require_once '../models/Msolicitude.php';
require_once '../models/Madjunto.php';
require_once '../models/Mdetalle.php';
require_once '../models/Mdepartamento.php';
require_once '../models/Mmunicol.php';
require_once '../models/Mcpoblado.php';
require_once '../models/Madjuntado.php';


@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$caso = ($_POST["caso"]);
@$record = ($_POST["record"]);
@$rolex = ($_SESSION['rolx']);
/***********************************/

@$nombre = ($_POST["nombre"]);
@$fecha1 = ($_POST["fecha1"]);
@$hsoli = ($_POST["hsoli"]);
@$departamento = ($_POST["departamento"]);
@$municipio = ($_POST["municipio"]);
@$cpoblado = ($_POST["cpoblado"]);
/***********************************/
@$a_primario = ($_POST["a_primario"]);
@$acceso1 = ($_POST["acceso1"]);
@$acceso2 = ($_POST["acceso2"]);
@$num_dir = ($_POST["num_dir"]);
@$a_referencia = ($_POST["a_referencia"]);
@$referencia = ($_POST["referencia"]);
/***********************************/
@$fecha2 = ($_POST["fecha2"]);
@$fecha4 = ($_POST["fecha2"]);

$fecha_actual = date("d-m-Y");
//sumo 10 día
$fecha5= date("d-m-Y",strtotime($fecha_actual."+ 10 days")); 

@$fecha3 = ($_POST["fecha3"]);
@$hora1 = ($_POST["hora1"]);
@$hora2 = ($_POST["hora2"]);
/***********************************/

@$rt_nombre1 = ($_POST["rt_nombre1"]);
@$rt_nombre2 = ($_POST["rt_nombre2"]);
@$rt_apellido1 = ($_POST["rt_apellido1"]);
@$rt_apellido2 = ($_POST["rt_apellido2"]);
@$rt_tdoc = ($_POST["rt_tdoc"]);
@$rt_num_doc = ($_POST["rt_num_doc"]);
@$tele1 = ($_POST["tele1"]);
@$correo1 = ($_POST["correo1"]);
@$grupo = ($_POST["grupo"]);
@$otro1 = ($_POST["otro1"]);
/***********************************/
@$rn_nombre1 = ($_POST["rn_nombre1"]);
@$rn_nombre2 = ($_POST["rn_nombre2"]);
@$rn_apellido1 = ($_POST["rn_apellido1"]);
@$rn_apellido2 = ($_POST["rn_apellido2"]);
@$rn_tdoc = ($_POST["rn_tdoc"]);
@$rn_num_doc = ($_POST["rn_num_doc"]);
@$tele2 = ($_POST["tele2"]);
@$correo2 = ($_POST["correo2"]);

/***********************************/
@$tipo1 = ($_POST["tipo1"]);
@$tipo2 = ($_POST["tipo2"]);
@$tipo3 = ($_POST["tipo3"]);
@$tipo4 = ($_POST["tipo4"]);
@$foca = ($_POST["foca"]);
/***********************************/
@$v_terr = ($_POST["v_terr"]);
@$v_naci = ($_POST["v_naci"]);
@$v_func = ($_POST["v_func"]);
@$v_supe = ($_POST["v_supe"]);
@$a_terro = ($_POST["a_terro"]);
@$a_nacio = ($_POST["a_nacio"]);
@$a_funco = ($_POST["a_funco"]);
@$a_supeo = ($_POST["a_supeo"]);

@$arutaval = ($_POST["arutaval"]);
@$apircval = ($_POST["apircval"]);

@$afase = ($_POST["afase"]);
@$amedida = ($_POST["amedida"]);
@$idaccion= ($_POST["idaccion"]);
@$entidad = ($_POST["entidad"]);
@$num_vic = ($_POST["num_vic"]);
@$descripcion = ($_POST["descripcion"]);
@$recomendaciones= ($_POST["recomendaciones"]);
@$aloja = ($_POST["aloja"]);
@$trans = ($_POST["trans"]);
@$t_trans = ($_POST["t_trans"]);
@$to_total = ($_POST["to_total"]);
@$presup = ($_POST["presup"]);
@$region = ($_POST["region"]);

@$regis4 = ($_POST["regis4"]);
@$idea4 = ($_POST["idea4"]);


/***********************************/


switch ($action){

  case 'contar_id':

    @$data = Msolicitude::find('last');

     if($data !=null){
      $contados= $data->id;        
      $contados=$contados+1;
     }else{
      $contados= 1;
     }
  

     
     echo json_encode($contados);
break;

#******************************************************************************
  case 'add_temp1':

            session_start();
            @$usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');
//echo($usuario_id);exit(); *******########### PENDIENTE DE CAMBIAR COMPLETADO POR "1"
             $consulta = Mtemporale::find('all',array('conditions' => array('user_create=? AND completado=?',$usuario_id,2)));
//print_r($consulta);exit();
          if($consulta==null ){  //(B) si no existe lo guarda...

            /*session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');*/
//echo($usuario_id);exit();:all(array('group' => 'price'));
            //$alia = Mtemporale::find('user_create=?',$usuario_id);
            
            $alia = new Mtemporale();
            $alia->cedula = $cedula;
            $alia->l_cedula = $l_cedula;
            $alia->sorbis = $sorbis;
            $alia->orbis = $orbis;
            $alia->nombre = $nombre;
            $alia->razon = $razon;
            $alia->mestado_id = $estado;
            $alia->msegmento_id= $segmento;
            $alia->visita1 = $fecha1;
            $alia->mmunicipio_id = $municipio;
            $alia->mparroquia_id = $parroquia;
            $alia->mciudad_id = $ciudad;
            $alia->msector_id = $sector;
            $alia->macceso1 = $a_principal;
            $alia->acc_nombre1 = $acceso1;
            $alia->macceso2 = $a_secundario;
            $alia->acc_nombre2 = $acceso2;
            $alia->referencia = $referencia;
            $alia->mzona_id = $zona;
            $alia->mterritorio = $territorio;
            $alia->mterritorio_g = $territorio_g;
            $alia->latitud = $latitud;
            $alia->longitud = $longitud;
            $alia->completado = 2;
            $alia->user_create = $usuario_id;
           
            
              if($alia->save()){

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    ¡Se ha guardado una copia parcial de este registro!.
                    </div>');
              }

         }else{

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    ¡Se ha guardado una copia parcial de este registro!.
                    </div>');
         }

       echo json_encode($respuesta);

  break;

  case 'add_temp2':

            session_start();
            @$usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');
//echo($usuario_id);exit();
             $consulta = Mtemporale::find('all',array('conditions' => array('user_create=? AND completado=?',$usuario_id,2)));
//print_r($consulta);exit();
          if($consulta){
            $tipos = implode(",", $estatus_aliado);
            $dias1 = implode(",", $dias);

            $alia = Mtemporale::find_by_user_create($usuario_id);
            $alia->cedula = $cedula;
            $alia->l_cedula = $l_cedula;
            $alia->sorbis = $sorbis;
            $alia->orbis = $orbis;
            $alia->nombre = $nombre;
            $alia->razon = $razon;
            $alia->mestado_id = $estado;
            $alia->msegmento_id= $segmento;
            $alia->visita1 = $fecha1;
            $alia->mmunicipio_id = $municipio;
            $alia->mparroquia_id = $parroquia;
            $alia->mciudad_id = $ciudad;
            $alia->msector_id = $sector;
            $alia->macceso1 = $a_principal;
            $alia->acc_nombre1 = $acceso1;
            $alia->macceso2 = $a_secundario;
            $alia->acc_nombre2 = $acceso2;
            $alia->referencia = $referencia;
            $alia->mzona_id = $zona;
            $alia->mterritorio = $territorio;
            $alia->mterritorio_g = $territorio_g;
            $alia->latitud = $latitud;
            $alia->longitud = $longitud;
            $alia->propietario = $propietario;
            $alia->telefono1 = $tele1;
            $alia->telefono2 = $tele2;
            $alia->email = $correo1;
            $alia->tipos = $tipos;
            $alia->dias = $dias1;
            $alia->cajas_t = $caja_t;
            $alia->cajas_p = $caja_p;
            $alia->cajas_o = $caja_o;
            $alia->despacho = $despacho;
            $alia->descuento = $descuento;
            $alia->linea_seca = $seca;
            $alia->refrigerado_c = $rf_competencia;
            $alia->linea_seca_c = $ls_competencia;
            $alia->completado = 3;
           // $alia->user_create = 2;
            
              if($alia->save()){

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    ¡Se ha guardado una copia parcial de este registro!.
                    </div>');
              }

            //echo json_encode($respuesta);

         }else{

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    ¡Se ha guardado una copia parcial de este registro!.
                    </div>');          
         }
       echo json_encode($respuesta);

  break;
/***************************************** CREAR ****************************************** */
case 'crear':
  //session_start();
  // @$usuario_id = $_SESSION['idusuariox'];
  // $hoy = date('d-m-Y');
  // $alia = new Msolicitude();  
  // $alia->created = $hoy;
  // //$alia->completado = 3;
  // $alia->mdepartamentos_id = 5;
  // $alia->mmunicipios_id = 5045;
  // $alia->fecha2=  $hoy;
  // $alia->rt_nombre1 = 1;
  // $alia->rt_nombre2 = 1;
  // $alia->rn_nombre1 = 1;
  // $alia->user_create = $usuario_id;
  // $alia->status = 0; 
 // $alia->save();    
break;

/******************************************** ADD *************************************** */

  case 'add':

      if($nombre ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el nombre del evento.
            </div>');

      }else if($departamento ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione una dirección territorial.
            </div>');

      }else if($municipio ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione un municipio.
            </div>');

      }/*else if($acceso1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el acceso principal.
            </div>');

      }else if($acceso2 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el acceso secundario.
            </div>');

      }else if($num_dir ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el numero de dirección.
            </div>');

      }else if($a_referencia ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique un lugar de referencia.
            </div>');

      }*/else if($fecha2 =="" ){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique fecha de inicio del evento.
            </div>');

      }/*else if($fecha4 >= $fecha5){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Fecha Fuera de Rango selecciones una fecha de inicio menor.
            </div>');

      }*/else if($fecha3 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique fecha final del evento.
            </div>');

      }else if($hora1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique hora de inicio del evento.
            </div>');

      }else if($hora2 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique hora final del evento.
            </div>');

      }else if($rt_nombre1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el nombre del responsable del evento.
            </div>');

      }else if($rt_apellido1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el apellido del responsable del evento.
            </div>');

      }/*else if($rt_num_doc ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el número del documento de identidad.
            </div>');

      }*/else if($tele1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique un teléfono de contacto.
            </div>');

      }else if($correo1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique un correo electrónico.
            </div>');

      }else if($grupo ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
           Seleccione el grupo, área, equipo o dependencia.
            </div>');

      }else if($tipo1 ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el tipo de evento.
            </div>');

      }else if($entidad ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique número de funcionarios participantes.
            </div>');

      }else if($num_vic ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique el número de victimas participantes.
            </div>');

      }else if($descripcion ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Redacte una descripción breve del evento.
            </div>');

      }else if($recomendaciones ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            RIndique las observaciones y/o recomendaciones  del evento.
            </div>');

      }else{  //(A)

       

            session_start();
            @$usuario_id = $_SESSION['idusuariox'];
          $id_sesion_usuario = $_SESSION['instante'];
            $hoy = date('d-m-Y');

            if($t_trans != null){
              $t_trans1 = implode(",", $t_trans);
            }else{
              $t_trans1 = null;
            }
            
            
            $alia = new Msolicitude();
            $alia->nombre = $nombre;
            $alia->fecha1 = $hoy;
            $alia->hsoli = $hsoli;
            $alia->mdepartamentos_id = $departamento;
            $alia->mmunicipios_id = $municipio;
            $alia->mcpoblado_id = $cpoblado;
            $alia->a_primario = $a_primario;
            $alia->acceso1 = $acceso1;
            $alia->acceso2= $acceso2;
            $alia->num_dir = $num_dir;
            $alia->a_referencia = $a_referencia;
            $alia->referencia = $referencia;
            $alia->fecha2 = $fecha2;
            $alia->fecha3 = $fecha3;
            $alia->hora1 = $hora1;
            $alia->hora2 = $hora2;

            $alia->rt_nombre1 = $rt_nombre1;
            $alia->rt_nombre2 = $rt_nombre2;
            $alia->rt_apellido1 = $rt_apellido1;
            $alia->rt_apellido2 = $rt_apellido2;
            $alia->rt_tdoc = $rt_tdoc;
            $alia->rt_num_doc = $rt_num_doc;
            $alia->tele1 = $tele1;
            $alia->correo1 = $correo1;

            $alia->rn_nombre1 = $rn_nombre1;
            $alia->rn_nombre2 = $rn_nombre2;
            $alia->rn_apellido1 = $rn_apellido1;
            $alia->rn_apellido2 = $rn_apellido2;
            $alia->rn_tdoc = $rn_tdoc;
            $alia->rn_num_doc = $rn_num_doc;
            $alia->tele2 = $tele2;
            $alia->correo2 = $correo2;

            $alia->grupos_id = $grupo;
            $alia->otro1 = $otro1;
            $alia->tipo1 = $tipo1;
            $alia->tipo2 = $tipo2;
            $alia->tipo3 = $tipo3;
            $alia->tipo4 = $tipo4;
            $alia->foca = $foca;
            $alia->v_terri = $v_terr;
            $alia->v_naci = $v_naci;
            $alia->v_func = $v_func;
            $alia->v_supe = $v_supe; 
            $alia->a_terro = $a_terro;
            $alia->a_nacio = $a_nacio;
            $alia->a_funco = $a_funco;
            $alia->a_supeo = $a_supeo;  
            $alia->arutaval = $arutaval;
            $alia->apircval = $apircval;
            $alia->afase = $afase;
            $alia->amedida = $amedida;
            $alia->idaccion = $idaccion;
            $alia->entidad = $entidad;
            $alia->num_vic = $num_vic;
            $alia->descripcion = $descripcion;
            $alia->recomendaciones = $recomendaciones;
            $alia->aloja = $aloja;
            $alia->trans = $trans;
            $alia->t_trans = $t_trans1;
            $alia->costo_total = $to_total;
            $alia->presup = $presup;
            $alia->mregiones_id = $region;
            $alia->user_create = $usuario_id;
            $alia->created = $hoy;
            $alia->completado = 1;
            $alia->status = 1;
            $alia->reg_temp='false';


             if($alia->save()){
 
                $data_search = Msolicitude::find_by_sql("SELECT max(id) as num_solicitud 
                FROM Msolicitudes 
                                  WHERE status=1 and id_sesion_usuario=id_sesion_usuario 
                                                 and reg_temp=false and user_create=$alia->user_create; ");
                
                $data_search_detalle = Mdetalle::find_by_sql("SELECT id as id_detalles
                                FROM Mdetalles 
                                                  WHERE status=1  
                                                                 and reg_temp=true and mrequerimientos_id is null
                                                                 and user_create=$alia->user_create; ");
                  
                          
                foreach ($data_search as $acti) {
                  $num_solicitud=$acti->num_solicitud;
                   }

                   if($data_search_detalle !=null){
                    foreach ($data_search_detalle as $detalles_solicitud) {
                      $reg = Mdetalle::find($detalles_solicitud->id_detalles);
            
                        $reg->mrequerimientos_id = $num_solicitud;
                        $reg ->reg_temp = 'false';
                        //$reg ->id=$detalles_solicitud->id;
      
                        $reg ->save();
              
                       }

                     }
                      
              
              
              // da el mensaje de guardado...

              // $mail = new PHPMailer();
              // $mail->IsSMTP(); // telling the class to use SMTP
              // $mail->Host          = "ssl://smtp.mi.com.co";
              // $mail->SMTPAuth      = true;                  // enable SMTP authentication
              // $mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
              // //$mail->Host          = "ssl://smtp.mi.com.co"; // sets the SMTP server
              // $mail->Port          = 465;                    // set the SMTP port for the GMAIL server
              // $mail->Username      = "servicio@univictimas.com.co"; // SMTP account username
              // $mail->Password      = "Servicio1";        // SMTP account password
              // $mail->SetFrom('servicio@univictimas.com.co', 'UNIVICTIMAS');
              // $mail->AddReplyTo('servicio@univictimas.com.co', 'UNIVICTIMAS');
              // $mail->Subject       = "Nueva solicitud registrada";
              // $body                = '<div class="container-fluid">
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>SOLICITUD REGISTRADA</center></div>  
              //                         </div> 
              //                         <hr>
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>NOMBRE SOLICITUD</center></div> 
              //                         <div class="col-sm-8"><center>'.$nombre.'</center></div> 
              //                         </div> 
              //                         <hr>
                                      
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>FECHA DEL EVENTO</center></div>
              //                         <div class="col-sm-8"><center>FECHA INICIO: '.$fecha2.'  FECHA FIN: '.$fecha3.'</center></div>  
              //                         </div> 
              //                         <hr>
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>RESPONSABLE DEL EVENTO</center></div>
              //                         <div class="col-sm-8"><center> '.$rn_nombre1.' '.$rn_nombre2.' '.$rn_apellido1.'</center></div>  
              //                         </div> 
              //                         <hr>
                                      
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>SUBDIRECCION RESPONSABLE</center></div>
              //                         <div class="col-sm-8"><center>'.$rt_nombre1.' '.$rt_nombre2.' '.$rt_apellido1.'</center></div>  
              //                         </div>
              //                         <hr>
                                      
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>NUMERO DE PARTICIPANTES</center></div>
              //                         <div class="col-sm-8"><center>FUNCIONARIOS: '.$entidad.'  VICTIMAS: '.$num_vic.'</center></div>  
              //                         </div>
              //                         <hr>
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>DESCRIPCION</center></div>
              //                         <div class="col-sm-8"><center>'.$descripcion.'</center></div>  
              //                         </div>
              //                         <hr>
              //                         <div class="row">
              //                         <div class="col-sm-8"><center>RECOMENDACION</center></div>
              //                         <div class="col-sm-8"><center>'.$recomendaciones.'</center></div>  
              //                         </div>
              //                         <div class="row">
              //                         <div class="col-sm-8"><center><strong>UNIVICTIMAS</strong></center></div>
              //                         </div>
              //                         </div>';
              //   $body             = preg_replace("~/~",'',$body);
              //   $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
              //   $mail->MsgHTML($body);
              //   $mail->AddAddress($correo2);
              //   if(!$mail->Send()) {
              //     echo "Mailer Error ".$mail->ErrorInfo .'<br />';
              //   }  else {
              //     echo "Message sent to :" ;
              //   }
              //   // Clear all addresses and attachments for next loop
              //   $mail->ClearAddresses();
              //   $mail->ClearAttachments(); 
              
              // echo $body;

              
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
        }
            echo json_encode($respuesta);

  break;
  #*******************************************************************************
  case 'del_temp':

    @$usuario_id = $_SESSION['idusuariox'];
    
    $data = Msolicitude::find('all',array('conditions' => array('id=? AND user_create=?',$regis4,$usuario_id)));

    foreach($data as $rs){
                        
        $rs->delete();          
      
    }      
             
        @$data2 = Madjunto::find('all',array('conditions' => array('mrequerimientos_id=?',$regis4)));

        foreach($data2 as $rt){
            
            unlink('../dist/img/adjuntos/'.$rt->imagen);            
            $rt->delete();           
          
        }
        
        
  break;
 


  case 'del_temp_delete':


     $dataA = Madjuntado::find('all',array('conditions' => array('id=? and reg_temp=true and user_create=?',$regis4,$usuario_id)));
     foreach($dataA as $rs){
                        
      $rs->delete();          
    
  }
     $dataB = Mdetalle::find('all',array('conditions' => array(' reg_temp=true and user_create=?',$regis4,$usuario_id)));
     foreach($dataB as $rs){
                        
      $rs->delete();          
    
  }

      
             
        @$data2 = Madjunto::find('all',array('conditions' => array('mrequerimientos_id=?',$regis4)));

        foreach($data2 as $rt){
            
            unlink('../dist/img/adjuntos/'.$rt->imagen);            
            $rt->delete();           
          
        }
        
        
  break;

   #*******************************************************************************
  
   case 'del_temp_null':

    //session_start();
    @$usuario_id = $_SESSION['idusuariox'];
    
    $data = Msolicitude::find('all',array('conditions' => array('status=? AND user_create=?',0,$usuario_id)));

    foreach($data as $rs){
        
                 
        $rs->delete();           
      
    }

    
break;

    #*******************************************************************************
   
    case 'del_temp_null_detalles':

      //session_start();
      @$usuario_id = $_SESSION['idusuariox'];
      
      $data = Msolicitude::find('all',array('conditions' => array('status=? AND user_create=?',0,$usuario_id)));
  
      foreach($data as $rs){
          
                   
          $rs->delete();           
        
      }
  
      
  break;
  
      #*******************************************************************************
  case 'get_recuperados':

       // session_start();
        $usuario_id = $_SESSION['idusuariox'];
         $rolex = $_SESSION['rolx'];
         $resp = '';
     if($rolex==3){

        @$data = Mtemporale::find('all',array('conditions' => array('completado>? AND user_create=?',1,$usuario_id)));

 
      //print_r($data);exit();
      //exit();
      if($data !=null){

   
              $resp = count($data);

       }else{

               $resp = '0';

       }

    echo $resp;   

}else if($rolex==4 ){

        @$data = Mtemporale::find('all',array('conditions' => array('completado>?',1)));

 
      //print_r($data);exit();
      //exit();
      if($data !=null){

   
              $resp = count($data);

       }else{

               $resp = '0';

       }
    echo $resp;   

}else{
    echo $resp; 
}
         

  break;

    #*******************************************************************************
  case 'search_rec':

        //session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rolex = $_SESSION['rolx'];
        $hoy = date("d-m-Y");
    
      @$data = Mtemporale::find('all');
      
      if($data !=null){

        foreach($data as $rs){
//echo($rs->id);exit();
          $resp =$rs->id;

        }

        
       }
  
        echo $resp;

  break;

    #*******************************************************************************
  
  case 'get_incompletos':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rolex = $_SESSION['rolx'];
     if($rolex==3){
        @$data = Maliado::find('all',array('conditions' => array('completado=? AND user_create=?',0,$usuario_id)));
           
      //print_r($data);
      //exit();
      if($data !=null){


              $resp = count($data);

       }else{

               $resp = '0';

       }
     echo $resp; 

}else if($rolex==2  || $rolex==4 ){

        @$data = Maliado::find('all',array('conditions' => array('completado=?',0)));
           
      //print_r($data);
      //exit();
      if($data !=null){


              $resp = count($data);

       }else{

               $resp = '0';

       }
     echo $resp;  

}

  break;
#*******************************************************************************  
  case 'edit':

    if($nombre ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el nombre del evento.
          </div>');

    }else if($departamento ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Seleccione una dirección territorial.
          </div>');

    }/*else if($municipio ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Seleccione un municipio.
          </div>');

    }else if($acceso1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el acceso principal.
          </div>');

    }else if($acceso2 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el acceso secundario.
          </div>');

    }else if($num_dir ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el numero de dirección.
          </div>');

    }else if($a_referencia ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
           Indique un lugar de referencia.
          </div>');

    }*/else if($fecha2 =="" ){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
           Indique fecha de inicio del evento.
          </div>');

    }else if($fecha4 >= $fecha5){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
           Fecha Fuera de Rango selecciones una fecha de inicio menor.
          </div>');

    }else if($fecha3 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique fecha final del evento.
          </div>');

    }else if($hora1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique hora de inicio del evento.
          </div>');

    }else if($hora2 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique hora final del evento.
          </div>');

    }else if($rt_nombre1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el nombre del responsable del evento.
          </div>');

    }else if($rt_apellido1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el apellido del responsable del evento.
          </div>');

    }/*else if($rt_num_doc ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el número del documento de identidad.
          </div>');

    }*/else if($tele1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique un teléfono de contacto.
          </div>');

    }else if($correo1 ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique un correo electrónico.
          </div>');

    }else if($grupo ==""){

      $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
         Seleccione el grupo, área, equipo o dependencia.
          </div>');

    }else if($tipo1 ==""){

      $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el tipo de evento.
          </div>');

    }else if($entidad ==""){

      $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique número de funcionarios participantes.
          </div>');

    }else if($num_vic ==""){

      $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Indique el número de victimas participantes.
          </div>');

    }else if($descripcion ==""){

      $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Redacte una descripción breve del evento.
          </div>');

    }else if($recomendaciones ==""){

      $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          RIndique las observaciones y/o recomendaciones  del evento.
          </div>');

    }else{  //(A)

     

         /* session_start();
          @$usuario_id = $_SESSION['idusuariox'];*/
          $hoy = date('d-m-Y');

          if($t_trans != null){
            $t_trans1 = implode(",", $t_trans);
          }else{
            $t_trans1 = null;
          }
          

          $alia = Msolicitude::find($id);     
          $alia->nombre = $nombre;
          $alia->fecha1 = $hoy;
          $alia->hsoli = $hsoli;
          $alia->mdepartamentos_id = $departamento;
          $alia->mmunicipios_id = $municipio;
          $alia->mcpoblado_id = $cpoblado;
          $alia->a_primario = $a_primario;
          $alia->acceso1 = $acceso1;
          $alia->acceso2= $acceso2;
          $alia->num_dir = $num_dir;
          $alia->a_referencia = $a_referencia;
          $alia->referencia = $referencia;
          $alia->fecha2 = $fecha2;
          $alia->fecha3 = $fecha3;
          $alia->hora1 = $hora1;
          $alia->hora2 = $hora2;

          $alia->rt_nombre1 = $rt_nombre1;
          $alia->rt_nombre2 = $rt_nombre2;
          $alia->rt_apellido1 = $rt_apellido1;
          $alia->rt_apellido2 = $rt_apellido2;
          $alia->rt_tdoc = $rt_tdoc;
          $alia->rt_num_doc = $rt_num_doc;
          $alia->tele1 = $tele1;
          $alia->correo1 = $correo1;

          $alia->rn_nombre1 = $rn_nombre1;
          $alia->rn_nombre2 = $rn_nombre2;
          $alia->rn_apellido1 = $rn_apellido1;
          $alia->rn_apellido2 = $rn_apellido2;
          $alia->rn_tdoc = $rn_tdoc;
          $alia->rn_num_doc = $rn_num_doc;
          $alia->tele2 = $tele2;
          $alia->correo2 = $correo2;

          $alia->grupos_id = $grupo;
          $alia->otro1 = $otro1;
          $alia->tipo1 = $tipo1;
          $alia->tipo2 = $tipo2;
          $alia->tipo3 = $tipo3;
          $alia->tipo4 = $tipo4;
          $alia->foca = $foca;
          $alia->v_terri = $v_terr;
          $alia->v_naci = $v_naci;
          $alia->v_func = $v_func;
          $alia->v_supe = $v_supe; 
          $alia->a_terro = $a_terro;
          $alia->a_nacio = $a_nacio;
          $alia->a_funco = $a_funco;
          $alia->a_supeo = $a_supeo;  
          $alia->arutaval = $arutaval;
          $alia->apircval = $apircval;
          $alia->afase = $afase;
          $alia->amedida = $amedida;
          $alia->idaccion = $idaccion;
          $alia->entidad = $entidad;
          $alia->num_vic = $num_vic;
          $alia->descripcion = $descripcion;
          $alia->recomendaciones = $recomendaciones;
          $alia->aloja = $aloja;
          $alia->trans = $trans;
          $alia->t_trans = $t_trans1;
          $alia->costo_total = $to_total;
          $alia->presup = $presup;
          $alia->mregiones_id = $region;
          $alia->user_create = $usuario_id;
          $alia->created = $hoy;
          $alia->completado = 1;
          $alia->status = 1;


          if($alia->save()){ // da el mensaje de guardado...

            // $mail = new PHPMailer();
            // $mail->IsSMTP(); // telling the class to use SMTP
            // $mail->Host          = "ssl://smtp.mi.com.co";
            // $mail->SMTPAuth      = true;                  // enable SMTP authentication
            // $mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
            // //$mail->Host          = "ssl://smtp.mi.com.co"; // sets the SMTP server
            // $mail->Port          = 465;                    // set the SMTP port for the GMAIL server
            // $mail->Username      = "servicio@univictimas.com.co"; // SMTP account username
            // $mail->Password      = "Servicio1";        // SMTP account password
            // $mail->SetFrom('servicio@univictimas.com.co', 'UNIVICTIMAS');
            // $mail->AddReplyTo('servicio@univictimas.com.co', 'UNIVICTIMAS');
            // $mail->Subject       = "Nueva solicitud registrada";
            // $body                = '<div class="container-fluid">
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>SOLICITUD REGISTRADA</center></div>  
            //                         </div> 
            //                         <hr>
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>NOMBRE SOLICITUD</center></div> 
            //                         <div class="col-sm-8"><center>'.$nombre.'</center></div> 
            //                         </div> 
            //                         <hr>
                                    
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>FECHA DEL EVENTO</center></div>
            //                         <div class="col-sm-8"><center>FECHA INICIO: '.$fecha2.'  FECHA FIN: '.$fecha3.'</center></div>  
            //                         </div> 
            //                         <hr>
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>RESPONSABLE DEL EVENTO</center></div>
            //                         <div class="col-sm-8"><center> '.$rn_nombre1.' '.$rn_nombre2.' '.$rn_apellido1.'</center></div>  
            //                         </div> 
            //                         <hr>
                                    
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>SUBDIRECCION RESPONSABLE</center></div>
            //                         <div class="col-sm-8"><center>'.$rt_nombre1.' '.$rt_nombre2.' '.$rt_apellido1.'</center></div>  
            //                         </div>
            //                         <hr>
                                    
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>NUMERO DE PARTICIPANTES</center></div>
            //                         <div class="col-sm-8"><center>FUNCIONARIOS: '.$entidad.'  VICTIMAS: '.$num_vic.'</center></div>  
            //                         </div>
            //                         <hr>
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>DESCRIPCION</center></div>
            //                         <div class="col-sm-8"><center>'.$descripcion.'</center></div>  
            //                         </div>
            //                         <hr>
            //                         <div class="row">
            //                         <div class="col-sm-8"><center>RECOMENDACION</center></div>
            //                         <div class="col-sm-8"><center>'.$recomendaciones.'</center></div>  
            //                         </div>
            //                         <div class="row">
            //                         <div class="col-sm-8"><center><strong>UNIVICTIMAS</strong></center></div>
            //                         </div>
            //                         </div>';
            //   $body             = preg_replace("~/~",'',$body);
            //   $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            //   $mail->MsgHTML($body);
            //   $mail->AddAddress($correo2);
            //   if(!$mail->Send()) {
            //     echo "Mailer Error ".$mail->ErrorInfo .'<br />';
            //   }  else {
            //     echo "Message sent to :" ;
            //   }
            //   // Clear all addresses and attachments for next loop
            //   $mail->ClearAddresses();
            //   $mail->ClearAttachments(); 
           
            // echo $body;

            
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
          //echo json_encode($respuesta);
      }
          echo json_encode($respuesta);

  break;

#*******************************************************************************


#*******************************************************************************  
case 'aprobar':
  
        if($rn_nombre1 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el primer nombre del responsable territorial.
              </div>');
  
        }else if($rn_apellido1 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el primer apellido del responsable territorial.
              </div>');
  
        }/*else if($rn_num_doc ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el numero de documento del responsable territorial.
              </div>');
  
        }*//*else if($tele2 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el número telefónico/celualar del responsable territorial.
              </div>');
  
        }*/else if($correo2 == ""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
             Ingrese el correo electrónico del responsable territorial.
              </div>');
  
        }else{  
  
          $consulta = Msolicitude::find('all',array('conditions' => array('id!=?',$id)));
  
            if($consulta==!null){  //(B) si existe actualiza el responsable territorial que aprueba...
  
              session_start();
              $usuario_id = $_SESSION['idusuariox'];
              $hoy = date('d-m-Y');
  
              $alia = Msolicitude::find($id);
  
              $alia->user_modify = $usuario_id;
              $alia->updated = $hoy;

              $alia->rn_nombre1 = $rn_nombre1;
              $alia->rn_nombre2 = $rn_nombre2;
              $alia->rn_apellido1 = $rn_apellido1;
              $alia->rn_apellido2 = $rn_apellido2;

              $alia->rn_tdoc = $rn_tdoc;
              $alia->rn_num_doc = $rn_num_doc;
              $alia->tele2 = $tele2;
              $alia->correo2 = $correo2;

              $alia->completado = 2;
              
  
  
               if($alia->save()){ // da el mensaje de guardado...
  
                  $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4>
                      <i class="icon fa fa-check"></i>
                      Alerta!
                      </h4>
                      Se ha aprobado el requerimiento.
                      </div>');
  
              }else{
  
  
                $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-ban"></i>
                    Alerta!
                    </h4>
                    Error al aprobar el requerimiento.
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
                    Este requerimiento no existe.
                    </div>');
    
          }
  
               echo json_encode($respuesta);
        }

    break;


  case 'delete':

      if($record !=null){

       /* session_start();
        @$usuario_id = $_SESSION['idusuariox'];*/
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" /*&& ($rol ==1 || $rol==4)*/){

                  $alia= Msolicitude::find($record);
                  $alia->user_modify = $usuario_id;
                  $alia->updated = $hoy;
                  $alia->status = 0;

                  if($alia->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Registro eliminado exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al eliminar el registro.
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


#*******************************************************************************

  case 'delete_rec':

      if($record !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && ($rol ==3 || $rol==4)){

                  $alia= Mtemporale::find($record);

                  if($alia->delete()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Registro descartado !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al descartar el registro.
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
#*******************************************************************************

  case 'search':

    if($record !=null){

       /* session_start();
        @$usuario_id = $_SESSION['idusuariox'];*/
        
//echo($usuario_id);exit();
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

      @$data = Msolicitude::find('all',array('conditions' => array('id=?',$record)));

      if($data !=null){

        foreach($data as $rs){
//echo($rs->tipos);exit();
                

          $resp = array(
                  "id"=>$rs->id,
                  "cid"=>$rs->cid,
                  "nombre"=>$rs->nombre,
                  "fecha1"=>(string)$rs->fecha1->format("d-m-Y"),
                  "hsoli"=>$rs->hsoli,
                  "departamento"=>$rs->mdepartamentos_id,
                  "municipio"=>$rs->mmunicipios_id,
                  "cpoblado"=>$rs->mcpoblado_id,

                  "a_primario"=>$rs->a_primario,
                  "acceso1"=>$rs->acceso1,
                  "acceso2"=>$rs->acceso2,
                  "num_dir"=>$rs->num_dir,
                  "a_referencia"=>$rs->a_referencia,
                  "referencia"=>$rs->referencia,

                  "fecha2"=>(string)$rs->fecha2->format("d-m-Y"),
                  "fecha3"=>(string)$rs->fecha3->format("d-m-Y"),
                  "hora1"=>$rs->hora1,
                  "hora2"=>$rs->hora2,

                  "rt_nombre1"=>$rs->rt_nombre1,
                  "rt_nombre2"=>$rs->rt_nombre2,
                  "rt_apellido1"=>$rs->rt_apellido1,
                  "rt_apellido2"=>$rs->rt_apellido2,
                  "rt_tdoc"=>$rs->rt_tdoc,
                  "rt_num_doc"=>$rs->rt_num_doc,
                  "tele1"=>$rs->tele1,
                  "correo1"=>$rs->correo1,

                  "rn_nombre1"=>$rs->rn_nombre1,
                  "rn_nombre2"=>$rs->rn_nombre2,
                  "rn_apellido1"=>$rs->rn_apellido1,
                  "rn_apellido2"=>$rs->rn_apellido2,
                  "rn_tdoc"=>$rs->rt_tdoc,
                  "rn_num_doc"=>$rs->rt_num_doc,
                  "tele2"=>$rs->tele2,
                  "correo2"=>$rs->correo2,

                  "grupo"=>$rs->grupos_id,
                  "otro1"=>$rs->otro1,

                  "tipo1"=>$rs->tipo1,
                  "tipo2"=>$rs->tipo2,
                  "tipo3"=>$rs->tipo3,
                  "tipo4"=>$rs->tipo4,
                  
                  "foca"=>$rs->foca,
                  "v_terr"=>$rs->v_terri,
                  "v_naci"=>$rs->v_naci,
                  "v_func"=>$rs->v_func,
                  "v_supe"=>$rs->v_supe,
                  "a_terro"=>$rs->a_terro,
                  "a_nacio"=>$rs->a_nacio,
                  "a_funco"=>$rs->a_funco,
                  "a_supeo"=>$rs->a_supeo,

                  "arutaval"=>$rs->arutaval,
                  "apircval"=>$rs->apircval,
                  "afase"=>$rs->afase,
                  "amedida"=>$rs->amedida,
                  "idaccion"=>$rs->idaccion,
                  "entidad"=>$rs->entidad,
                  "num_vic"=>$rs->num_vic,
                  "descripcion"=>$rs->descripcion,
                  "recomendaciones"=>$rs->recomendaciones,
                  "aloja"=>$rs->aloja,
                  "trans"=>$rs->trans,
                  "t_trans"=>$rs->t_trans,
                  "costo_total"=>$rs->costo_total,
                  "presup"=>$rs->presup,
                  "region"=>$rs->mregiones_id,
                  "completado"=>$rs->completado
                 );
        }

        echo json_encode($resp);
       }

    }
    break;

 //########################################################################################################################
 case 'search_a':

  if($record !=null){

      //session_start();
      //@$usuario_id = $_SESSION['idusuariox'];
      
//echo($usuario_id);exit();
      $rol = $_SESSION['rolx'];
      $hoy = date("d-m-Y");

    @$data = Msolicitude::find('all',array('conditions' => array('id=?',$record)));

    if($data !=null){

      foreach($data as $rs){
//echo($rs->tipos);exit();
              

        $resp = array(
                "id"=>$rs->id,                    
                "fecha1"=>(string)$rs->fecha1->format("d-m-Y"),
                "fecha2"=>(string)$rs->fecha2->format("d-m-Y"),
                "departamento"=>$rs->mdepartamentos_id,
                "municipio"=>$rs->mmunicipios_id,
                "cpoblado"=>$rs->mcpoblado_id,

                "a_primario"=>$rs->a_primario,
                "acceso1"=>$rs->acceso1,
                "acceso2"=>$rs->acceso2,
                "num_dir"=>$rs->num_dir,
                "a_referencia"=>$rs->a_referencia,
                "referencia"=>$rs->referencia,


                "rt_nombre1"=>$rs->rt_nombre1,
                "rt_nombre2"=>$rs->rt_nombre2,

                "rt_tdoc"=>$rs->rt_tdoc,
                "rt_num_doc"=>$rs->rt_num_doc,
                "tele1"=>$rs->tele1,
                "correo1"=>$rs->correo1,

                "region"=>$rs->mregiones_id,
                "completado"=>$rs->completado
               );
      }

      echo json_encode($resp);
     }

  }
  break;   


}//end switch

?>
