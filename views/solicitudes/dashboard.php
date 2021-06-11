<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>
<?php include("../layouts/constantes.php") ?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4 style="font-size: 34px" id="restan"><sup style="font-size: 20px">$</sup></h4>
                  <p>PRESUPUESTO NACIONAL</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bank"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Restante <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4 style="font-size: 34px" id="indi"><sup style="font-size: 20px">$</sup></h4>
                  <p>INDIVIDUALES</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4 style="font-size: 34px" id="reto"><sup style="font-size: 20px">$</sup></h4>
                  <p>RETORNOS Y REUBICACIONES</p>
                </div>
                <div class="icon">
                  <i class="ion ion-location"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4 style="font-size: 34px" id="cole"><sup style="font-size: 20px">$</sup></h4>
                  <p>COLECTIVOS</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

<div class="row">

            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">EJECUCIÓN PRESUPUESTAL TERRITORIAL</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="chartdiv" style="width:100%;max-height:600px;height:100vh;">
                  
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ASIGNACIÓN PRESUPUESTAL GENERAL</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <form id="form" role="form" enctype="multipart/form-data" >

                <div class="box-body">                    
                  <div class="form-group">
                    <label>Número de contrato</label>
                    <input type="text" class="form-control" id="num_contrato" placeholder="Indique el número de contrato"  onpaste="return false" tabindex="10" onkeypress="return esnumint(event);" onblur="alsalir(this.id)" autocomplete="off">
                    <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_num_contrato'><p></p></div>
                  </div>

                  <label>Asignación presupuestal</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="cos_contrato" placeholder="Indique la asignación presupuestal"  onpaste="return false" tabindex="20" onkeypress="return esnum(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_cos_contrato'><p></p></div>
                </div>

                <div class="box-footer">
                    <button id="p_guarda" type="button" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
                    <button id="p_edita" type="button" class="btn btn-success" style="display:none;"><i class="fa fa-fw fa-edit"></i>Editar</button>
                </div> 
                </form> 
              </div><!-- /.box-body -->
            </div><!-- /.box -->
</div>


<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<script type="text/javascript" src="../../plugins/amcharts4/core.js"></script>
<script type="text/javascript" src="../../plugins/amcharts4/charts.js"></script>
<script type="text/javascript" src="../../plugins/amcharts4/themes/animated.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	$.post( "../../controllers/mcontratos_controller", { action: "search_act"}).done(function( data ) {
		var parsedJson = $.parseJSON(data);
    
		var num_cont = parsedJson.num_contrato;
    var cos_cont = parsedJson.cos_contrato;
    var estato = parsedJson.estado;
    var cos_indi = parsedJson.cos_indi;
    var cos_reub = parsedJson.cos_reub;
    var cos_cole = parsedJson.cos_cole;
    var restan = parsedJson.restan;
        
		$("#num_contrato").val( num_cont );       
		$("#cos_contrato").val( cos_cont );
    $("#restan").html( restan +'<sup style="font-size: 20px">$</sup>' );
    $("#indi").html( cos_indi +'<sup style="font-size: 20px">$</sup>' );
    $("#reto").html( cos_reub +'<sup style="font-size: 20px">$</sup>' );
    $("#cole").html( cos_cole +'<sup style="font-size: 20px">$</sup>');
        if(estato=="si"){
            $("#p_guarda").css("display", "none");
            $("#p_edita").css("display", "block");
        }
	},"json");



});

am4core.ready(function() {



// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart3D);
// Add data
var datum = [];

$.post( "../../data_json/data_dashboard1.php").done(function( data ) {
      var parsedJson = $.parseJSON(data);
      datum=parsedJson;
      datum.pop();
});



setTimeout(function() {	

      chart.legend = new am4charts.Legend();

      chart.data = datum;

      //chart.innerRadius = am4core.percent(50);

      // Add and configure Series
      var pieSeries = chart.series.push(new am4charts.PieSeries3D());
      pieSeries.dataFields.value = "valor";
      pieSeries.dataFields.category = "region";
      pieSeries.slices.template.stroke = am4core.color("#fff");
      pieSeries.slices.template.strokeOpacity = 1;

      pieSeries.colors.list = [
        am4core.color("#845EC2"),
        am4core.color("#D65DB1"),
        am4core.color("#FF6F91"),
        am4core.color("#FF9671"),
        am4core.color("#FFC75F"),
        am4core.color("#F9F871"),
      ];
      // This creates initial animation
    //  pieSeries.labels.template.maxWidth = 90;
    //  pieSeries.labels.template.wrap = true;
      pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
      pieSeries.hiddenState.properties.opacity = 1;
      pieSeries.hiddenState.properties.endAngle = -90;
      pieSeries.hiddenState.properties.startAngle = -90;

      chart.hiddenState.properties.radius = am4core.percent(0);
}, 500);

}); // end am4core.ready()

            function alsalir(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function esnumint(e) {

                    k = (document.all) ? e.keyCode : e.which;
                    if (k==8 || k==0 || k==13) return true;
                    patron = /[0-9]/;
                    n = String.fromCharCode(k);

                                    if(patron.test(n)==''){

                                        document.getElementById('ms_num_contrato').style.display = 'block';
                                        document.getElementById("ms_num_contrato").innerHTML = 'Use solo números';
                                            return patron.test(n);

                                    }else{

                                        document.getElementById("ms_num_contrato").innerHTML = '';
                                        return patron.test(n);

                                    }

            }

            function esnum(e) {

                    k = (document.all) ? e.keyCode : e.which;
                    if (k==8 || k==0 || k==13) return true;
                    patron = /[0-9\.]/;
                    n = String.fromCharCode(k);

                                    if(patron.test(n)==''){

                                        document.getElementById('ms_cos_contrato').style.display = 'block';
                                        document.getElementById("ms_cos_contrato").innerHTML = 'Use solo números y punto decimal';
                                            return patron.test(n);

                                    }else{

                                        document.getElementById("ms_cos_contrato").innerHTML = '';
                                        return patron.test(n);

                                    }

            }        

            $("#p_guarda" ).click(function() {

                    $.post( "../../controllers/mcontratos_controller", {

                        action: "add",

                        num_contrato: $("#num_contrato").val(),
                        cos_contrato: $("#cos_contrato").val(),


                        }).done(function(data){

                            var parsedJson = $.parseJSON(data);
                            $(".message").html(parsedJson.mensaje);

                            if(parsedJson.resultado != 'error'){

                                setTimeout(function(){

                                        $(location).attr('href','dashboard');

                                }, 1500);

                            }

                        },"json");

            });     
            $("#p_edita" ).click(function() {

                $.post( "../../controllers/mcontratos_controller", {

                    action: "edit",

                    num_contrato: $("#num_contrato").val(),
                    cos_contrato: $("#cos_contrato").val(),


                    }).done(function(data){

                        var parsedJson = $.parseJSON(data);
                        $(".message").html(parsedJson.mensaje);

                        if(parsedJson.resultado != 'error'){

                            setTimeout(function(){

                                    $(location).attr('href','dashboard');

                            }, 1500);

                        }

                    },"json");

            });   
</script>

<?php include_once("../layouts/pie.php") ?>
