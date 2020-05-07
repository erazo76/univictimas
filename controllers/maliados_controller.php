<?php
require_once '../models/Maliado.php';
require_once '../models/Mactivo.php';
require_once '../models/Mtemporale.php';
require_once '../models/Mestado.php';
require_once '../models/Mmunicipio.php';
require_once '../models/Mparroquia.php';

date_default_timezone_set('America/Caracas');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$caso = ($_POST["caso"]);
@$record = ($_POST["record"]);
//@$rolex = ($_SESSION['rolx']);
/***********************************/
@$orbis = ($_POST["orbis"]);
@$sorbis = ($_POST["sorbis"]);
@$orb_tem = $orbis;
@$nombre = ($_POST["nombre"]);
@$razon = ($_POST["razon"]);
@$segmento = ($_POST["segmento"]);
@$cedula = ($_POST["cedula"]);
@$l_cedula = ($_POST["l_cedula"]);
//@$fecha1 = date_format(($_POST["fecha1"]),'d-m-Y');
@$fecha1 = ($_POST["fecha1"]);
@$fecha2 = ($_POST["fecha2"]);
@$estado = ($_POST["estado"]);
@$municipio = ($_POST["municipio"]);
@$ciudad = ($_POST["ciudad"]);
@$sector = ($_POST["sector"]);
@$parroquia = ($_POST["parroquia"]);
@$a_principal = ($_POST["a_principal"]);
@$acceso1 = ($_POST["acceso1"]);
@$a_secundario = ($_POST["a_secundario"]);
@$acceso2 = ($_POST["acceso2"]);
@$referencia = ($_POST["referencia"]);
@$zona = ($_POST["zona"]);
@$territorio = ($_POST["territorio"]);
@$territorio_g = ($_POST["territorio_g"]);
@$latitud = ($_POST["latitud"]);
@$longitud = ($_POST["longitud"]);
/***********************************/
@$propietario = ($_POST["propietario"]);
@$tele1 = ($_POST["tele1"]);
@$tele2 = ($_POST["tele2"]);
@$correo1 = ($_POST["correo1"]);
@$estatus_aliado = ($_POST["estatus_aliado"]);
@$dias = ($_POST["dias"]);
@$caja_t = ($_POST["caja_t"]);
@$caja_p= ($_POST["caja_p"]);
@$caja_o = ($_POST["caja_o"]);
@$despacho = ($_POST["despacho"]);
@$descuento = ($_POST["descuento"]);
@$seca = ($_POST["seca"]);
@$rf_competencia = ($_POST["rf_competencia"]);
@$ls_competencia = ($_POST["ls_competencia"]);
/***********************************/
@$toldo = ($_POST["toldo"]);
@$aviso = ($_POST["aviso"]);
@$fachada = ($_POST["fachada"]);
@$activo = ($_POST["activo"]);
@$observacion = ($_POST["observacion"]);
@$distribuidora = ($_POST["distribuidora"]);
@$region = ($_POST["region"]);
@$recuperado = ($_POST["recuperado"]);
/**********************************/
//echo $fecha1;exit();
//$fecha1 = date_format($fecha1,'d-m-Y');



switch ($action){





  case 'add_temp1':

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
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
            $usuario_id = $_SESSION['idusuariox'];
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

  case 'add':

      if($nombre ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el nombre del aliado.
            </div>');

      }else if($razon ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la razón social del aliado.
            </div>');

      }else if($segmento ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el segmento de mercado del aliado.
            </div>');

      }else if($cedula ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese RIF/cedula del aliado.
            </div>');

      }else if($fecha1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique fecha de la primera visita al aliado.
            </div>');

      }else if($estado ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique estado donde se ubica el aliado.
            </div>');

      }else if($municipio ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique municipio donde se ubica el aliado.
            </div>');

      }else if($ciudad ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique ciudad o poblado donde se ubica el aliado.
            </div>');

      }else if($sector ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique sector donde se ubica el aliado.
            </div>');

      }else if($parroquia ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique parroquia donde se ubica el aliado.
            </div>');

      }else if($a_principal ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el tipo acceso principal.
            </div>');

      }else if($acceso1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique acceso principal al  establecimiento del aliado.
            </div>');

      }else if($a_secundario ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el tipo acceso secundario.
            </div>');

      }else if($acceso2 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
              Indique acceso secundario al establecimiento del aliado.
            </div>');

      }else if($zona ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione zona de venta.
            </div>');

      }else if($territorio ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione territorio de venta provedor.
            </div>');

      }else if($territorio_g ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione territorio de venta geográfico.
            </div>');

      }else if($latitud ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique latitud geográfica del aliado.
            </div>');

      }else if($longitud ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique longitud geográfica del aliado.
            </div>');

      }else if($propietario ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique nombre del propietario/encargado.
            </div>');

      }else if($tele1==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique teléfono principal del aliado.
            </div>');

      }else if($tele2 ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique teléfono secundario del aliado.
            </div>');

      }else if($correo1 ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique correo electrónico del aliado.
            </div>');

      }else if($estatus_aliado ==null){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el estatus del aliado.
            </div>');

      }else if($dias ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique frecuencia de visita por semana.
            </div>');

      }else if($caja_t ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique total de cajas/semana que comercializa el aliado.
            </div>');

      }else if($caja_p ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique cajas/semana de LLA que comercializa el aliado.
            </div>');

      }else if($despacho ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique medio de despacho al aliado.
            </div>');

      }/*else if($descuento ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique porcentaje de descuento al aliado.
            </div>');

      }*/else if($seca ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique observaciones sobre linea seca LLA .
            </div>');

      }else if($rf_competencia ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones  refrigerados de la competencia .
            </div>');

      }else if($ls_competencia ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones  linea seca de la competencia .
            </div>');

      }else if($observacion ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones sobre el aliado.
            </div>');

      }else{  //(A) si se escribe un nombre se consulta si ya existe...

        $consulta = Maliado::find('all',array('conditions' => array('orbis=? AND sorbis=? AND nombre=?',$orbis,$sorbis,$nombre)));

          if($consulta==null ){  //(B) si no existe lo guarda...

//print_r($estatus_aliado);exit;-".$longitud." ".$latitud."
            $geo_consulta = Maliado::find_by_sql("SELECT ST_GeomFromText( 'MULTIPOINT(-".$longitud." ".$latitud.")',4326) AS punto;");

            foreach ($geo_consulta as $treo) {
              $geometrica = $treo->punto;
            }

            //$tipos = $estatus_aliado[0].",".$estatus_aliado[1];
//print_r($geometrica);exit();
            $tipos = implode(",", $estatus_aliado);
            $dias1 = implode(",", $dias);

            $toldo1=implode(",", $toldo);
            $aviso1=implode(",", $aviso);
            $fachada1=implode(",", $fachada);
            $activo1=implode(",", $activo);

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $alia = new Maliado();
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
            $alia->toldos = $toldo1;
            $alia->avisos = $aviso1;
            $alia->fachadas = $fachada1;
            $alia->activos = $activo1;
            $alia->observaciones = $observacion;
            $alia->mdistribuidoras_id = $distribuidora;
            $alia->mregiones_id = $region;

            $alia->user_create = $usuario_id;
            $alia->created = $hoy;
            $alia->completado = 1;
            $alia->geom = $geometrica;


             if($alia->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido registrados exitosamente !.
                    </div>');

                if($caso=='1'){
                   $alia2 = Mtemporale::find($id);
                   $alia2 ->delete();
                }else{
                    $alia2 = Mtemporale::find_by_user_create($usuario_id); 
                    $alia2 ->delete();
                }    
 
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

        }else{ //(B) si exite el nombre verifica el status del registro...

            foreach ($consulta as $st) {

                 $estado=$st->status;
                 $ide=$st->id;

              }

            if($estado!=1){ //se activa mensaje modal para llevar el status a "1" ... (o no).

                    //echo 'MODAL PARA ACTIVAR REGISTRO GUARDADO'; exit();

              $respuesta = array('resultado'=>'error','mensaje'=>'<input type="hidden" id="id" value="'.$ide.'">
                  <div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>

                  Registro inactivo . ¿Desea activar ['.$sorbis.$orbis.' => '.$nombre.'] en el registro de aliados comerciales?

                      <div class="modal-footer" >
                        <button type="button" id="no" class="btn btn-outline pull-left" data-dismiss="alert" onClick="no()">No</button>
                        <button type="button" id="silo" class="btn btn-outline pull-left" onClick="si()" >Si</button>
                      </div>
                  </div>');

            }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El aliado comercial ['.$sorbis.$orbis.' => '.$nombre.'] ya se encuentra registrado.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }


     }
             echo json_encode($respuesta);

  break;
  #*******************************************************************************
  
  case 'del_temp':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        
        $alia2 = Mtemporale::find($record);
        $alia2 ->delete();
  break;

    #*******************************************************************************
  
  case 'get_recuperados':

        session_start();
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

        session_start();
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

//echo 'la fecha es: '.$fecha1;exit();

      if($nombre ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el nombre del aliado.
            </div>');

      }else if($razon ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la razón social del aliado.
            </div>');

      }else if($segmento ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el segmento de mercado del aliado.
            </div>');

      }else if($cedula ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese RIF/cedula del aliado.
            </div>');

      }else if($fecha1 == ""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique fecha de la primera visita al aliado.
            </div>');

      }else if($estado ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique estado donde se ubica el aliado.
            </div>');

      }else if($municipio ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique municipio donde se ubica el aliado.
            </div>');

      }else if($ciudad ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique ciudad o poblado donde se ubica el aliado.
            </div>');

      }else if($sector ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique sector donde se ubica el aliado.
            </div>');

      }else if($parroquia ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique parroquia donde se ubica el aliado.
            </div>');

      }else if($a_principal ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el tipo acceso principal.
            </div>');

      }else if($acceso1 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique acceso principal al  establecimiento del aliado.
            </div>');

      }else if($a_secundario ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el tipo acceso secundario.
            </div>');

      }else if($acceso2 ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
              Indique acceso secundario al establecimiento del aliado.
            </div>');

      }else if($zona ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione zona de venta.
            </div>');

      }else if($territorio ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione territorio de venta provedor.
            </div>');

      }else if($territorio_g ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione territorio de venta geográfico.
            </div>');

      }else if($latitud ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique latitud geográfica del aliado.
            </div>');

      }else if($longitud ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique longitud geográfica del aliado.
            </div>');

      }else if($propietario ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique nombre del propietario/encargado.
            </div>');

      }else if($tele1==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique teléfono principal del aliado.
            </div>');

      }else if($tele2 ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique teléfono secundario del aliado.
            </div>');

      }else if($correo1 ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique correo electrónico del aliado.
            </div>');

      }else if($estatus_aliado ==null){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione el estatus del aliado.
            </div>');

      }else if($dias ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique frecuencia de visita por semana.
            </div>');

      }else if($caja_t ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique total de cajas/semana que comercializa el aliado.
            </div>');

      }else if($caja_p ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique cajas/semana de LLA que comercializa el aliado.
            </div>');

      }else if($despacho ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique medio de despacho al aliado.
            </div>');

      }/*else if($descuento ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique porcentaje de descuento al aliado.
            </div>');

      }*/else if($seca ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
             Indique observaciones sobre linea seca LLA .
            </div>');

      }else if($rf_competencia ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones  refrigerados de la competencia .
            </div>');

      }else if($ls_competencia ==""){

        $respuesta = array('deslizador'=>'2','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones  linea seca de la competencia .
            </div>');

      }else if($observacion ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Indique observaciones sobre el aliado.
            </div>');

      }else{  

        $consulta = Maliado::find('all',array('conditions' => array('sorbis=? AND orbis=? AND orbis!=? AND id!=?',$sorbis,$orbis,'SIN CÓDIGO ORBIS',$id)));

          if($consulta==null){  //(B) si existe lo guarda...

//print_r($estatus_aliado);exit;

            $geo_consulta = Maliado::find_by_sql("SELECT ST_GeomFromText( 'MULTIPOINT(-".$longitud." ".$latitud.")',4326) AS punto;");

            foreach ($geo_consulta as $treo) {
              $geometrica = $treo->punto;
            }

            //$tipos = $estatus_aliado[0].",".$estatus_aliado[1];

            $tipos = implode(",", $estatus_aliado);
            $dias1 = implode(",", $dias);

            $toldo1=implode(",", $toldo);
            $aviso1=implode(",", $aviso);
            $fachada1=implode(",", $fachada);
            $activo1=implode(",", $activo);

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $alia = Maliado::find($id);
            $alia->cedula = $cedula;
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
            $alia->toldos = $toldo1;
            $alia->avisos = $aviso1;
            $alia->fachadas = $fachada1;
            $alia->observaciones = $observacion;
            $alia->activos = $activo1;
            $alia->mdistribuidoras_id = $distribuidora;
            $alia->mregiones_id = $region;

            $alia->user_create = $usuario_id;
            $alia->created = $hoy;
            $alia->completado = 1;
            $alia->geom = $geometrica;


             if($alia->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido actualizados exitosamente!.
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

            //echo json_encode($respuesta);

        }else{ 

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El código ORBIS ['.$orbis.'] ya se encuentra asignado.
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

        if($usuario_id !="" && ($rol ==1 || $rol==4)){

                  $alia= Maliado::find($record);
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

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

      @$data = Maliado::find('all',array('conditions' => array('id=?',$record)));

      if($data !=null){

        foreach($data as $rs){
//echo($rs->tipos);exit();
                

          $resp = array(
                  "id"=>$rs->id,
                  "sorbis"=>$rs->sorbis,
                  "orbis"=>$rs->orbis,
                  "nombre"=>$rs->nombre,
                  "razon"=>$rs->razon,
                  "segmento"=>$rs->msegmento_id,
                  "cedula"=>$rs->cedula,
                  "l_cedula"=>$rs->l_cedula,
                  "fecha1"=>(string)$rs->visita1->format("d-m-Y"),
                  "fecha2"=>(string)$hoy,
                  "estado"=>$rs->mestado_id,
                  "municipio"=>$rs->mmunicipio_id,
                  "ciudad"=>$rs->mciudad_id,
                  "sector"=>$rs->msector_id,
                  "parroquia"=>$rs->mparroquia_id,
                  "a_principal"=>$rs->macceso1,
                  "acceso1"=>$rs->acc_nombre1,
                  "a_secundario"=>$rs->macceso2,
                  "acceso2"=>$rs->acc_nombre2,
                  "referencia"=>$rs->referencia,
                  "zona"=>$rs->mzona_id,
                  "territorio"=>$rs->mterritorio,
                  "territorio_g"=>$rs->mterritorio_g,
                  "latitud"=>$rs->latitud,
                  "longitud"=>$rs->longitud,
                  "propietario"=>$rs->propietario,
                  "tele1"=>$rs->telefono1,
                  "tele2"=>$rs->telefono2,
                  "correo1"=>$rs->email,
                  "estatus_aliado"=>$rs->tipos,
                  "dias"=>$rs->dias,
                  "caja_t"=>$rs->cajas_t,
                  "caja_p"=>$rs->cajas_p,
                  "caja_o"=>$rs->cajas_o,
                  "despacho"=>$rs->despacho,
                  "descuento"=>$rs->descuento,
                  "seca"=>$rs->linea_seca,
                  "rf_competencia"=>$rs->refrigerado_c,
                  "ls_competencia"=>$rs->linea_seca_c,
                  "toldo"=>$rs->toldos,
                  "aviso"=>$rs->avisos,
                  "fachada"=>$rs->fachadas,
                  "activo"=>$rs->activos,
                  "observacion"=>$rs->observaciones,
                  "distribuidora"=>$rs->mdistribuidoras_id,
                  "region"=>$rs->mregiones_id

                 );
        }

        echo json_encode($resp);
       }

    }
    break;

#******************************************************************************

  case 'search2':

    if($record !=null){

        session_start();
                $distri_a = intval($_SESSION['distribuidora']); 
                $regio_a = intval($_SESSION['region']);

        $usuario_id = $_SESSION['idusuariox'];

        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

      @$data = Mtemporale::find('all',array('conditions' => array('id=?',$record)));

      if($data !=null){

        foreach($data as $rs){
//echo($rs->tipos);exit();
          $resp = array(
                  "id"=>$rs->id,
                  "sorbis"=>$rs->sorbis,
                  "orbis"=>$rs->orbis,
                  "nombre"=>$rs->nombre,
                  "razon"=>$rs->razon,
                  "segmento"=>$rs->msegmento_id,
                  "cedula"=>$rs->cedula,
                  "fecha1"=>(string)$rs->visita1->format("d-m-Y"),
                  "fecha2"=>(string)$hoy,
                  "estado"=>$rs->mestado_id,
                  "municipio"=>$rs->mmunicipio_id,
                  "ciudad"=>$rs->mciudad_id,
                  "sector"=>$rs->msector_id,
                  "parroquia"=>$rs->mparroquia_id,
                  "a_principal"=>$rs->macceso1,
                  "acceso1"=>$rs->acc_nombre1,
                  "a_secundario"=>$rs->macceso2,
                  "acceso2"=>$rs->acc_nombre2,
                  "referencia"=>$rs->referencia,
                  "zona"=>$rs->mzona_id,
                  "territorio"=>$rs->mterritorio,
                  "territorio_g"=>$rs->mterritorio_g,
                  "latitud"=>$rs->latitud,
                  "longitud"=>$rs->longitud,
                  "propietario"=>$rs->propietario,
                  "tele1"=>$rs->telefono1,
                  "tele2"=>$rs->telefono2,
                  "correo1"=>$rs->email,
                  "estatus_aliado"=>$rs->tipos,
                  "dias"=>$rs->dias,
                  "caja_t"=>$rs->cajas_t,
                  "caja_p"=>$rs->cajas_p,
                  "caja_o"=>$rs->cajas_o,
                  "despacho"=>$rs->despacho,
                  "descuento"=>$rs->descuento,
                  "seca"=>$rs->linea_seca,
                  "rf_competencia"=>$rs->refrigerado_c,
                  "ls_competencia"=>$rs->linea_seca_c,
                  "toldo"=>$rs->toldos,
                  "aviso"=>$rs->avisos,
                  "fachada"=>$rs->fachadas,
                  "activo"=>$rs->activos,
                  "observacion"=>$rs->observaciones,
                  "distribuidora"=>$distri_a,
                  "region"=>$regio_a,
                  "recuperado"=>$rs->completado
                 );
        }

        echo json_encode($resp);
       }

    }
    break;

#******************************************************************************

  case 'search_orbis':



    if($sorbis!=null || $orbis!=null){

      @$data = Maliado::find('all',array('conditions' => array('orbis=? AND sorbis=?',$orbis,$sorbis)));


        if($data !=null){

            foreach ($data as $rm) {
                $traba=$rm->orbis;
            }
                    
                if($traba!='SIN CÓDIGO ORBIS'){
                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        El código ORBIS ya se encuentra asignado.
                        </div>');
                }else{

                    $respuesta = array('resultado'=>'alert','mensaje'=>'');

                }

        }else{

                    $respuesta = array('resultado'=>'alert','mensaje'=>'');

        }
        //echo json_encode($respuesta);
    }else{
       $respuesta = array('resultado'=>'alert','mensaje'=>'');
    }
 echo json_encode($respuesta);

    break;

    #******************************************************************************

  case 'search_orbis_2':



    if($sorbis!=null || $orbis!=null){

      @$data = Maliado::find('all',array('conditions' => array('orbis=? AND sorbis=? AND id!=?',$orbis,$sorbis,$record)));

        if($data !=null){

            foreach ($data as $rm) {
                $traba=$rm->orbis;
            }

                if($traba!='SIN CÓDIGO ORBIS'){

                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        El código ORBIS ya se encuentra asignado.
                        </div>');
                
                }else{

                    $respuesta = array('resultado'=>'alert','mensaje'=>'');

                }
        }else{

                    $respuesta = array('resultado'=>'alert','mensaje'=>'');

        }
        //echo json_encode($respuesta);
    }else{
       $respuesta = array('resultado'=>'alert','mensaje'=>'');
    }
 echo json_encode($respuesta);

    break;

}//end switch

?>
