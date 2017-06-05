<?php
$this->load->view("plantilla/head", ['titulo' => $titulo]);
$this->load->view("plantilla/header");
$this->load->view("plantilla/$nav");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $estudiante["apellido"].", ".$estudiante["nombre"] ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Estudiantes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" id="estudiante_id" value="<?= $estudiante["id"] ?>">
        <!-- Main row -->
        <div class="row">
                <div class="box box-solid">
                    <?= show_notification(); ?>
                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <?php if($this->session->userdata("id_rol_usuario") == ID_ROL_PROFESOR): ?>
                                <a href="<?= base_url()."profesor/estudiantes" ?>" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</a>
                            <?php else: ?>
                                <a href="<?= base_url()."coordinador/estudiantes" ?>" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="box-body">
                        
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#info_general">
                                            Informaci&oacute;n General
                                        </a>
                                    </h4>
                                </div>
                                <div id="info_general" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        <!-- INFORMACION GENERAL -->
                                        <?php $this->load->view("common/estudiantes/partes/info_general", $estudiante); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#perfil_profesional">
                                            Perfil Profesional
                                        </a>
                                    </h4>
                                </div>
                                <div id="perfil_profesional" class="panel-collapse collapse">
                                    <div class="box-body">                 
                                        <div class="row-md">
                                            
                                        <!-- INFROMACION DE PERFIL PROFESIONAL -->
                                        <?php $this->load->view("common/estudiantes/partes/info_aptitud_profesional", $aptitud_profesional); ?>
                                        <?php $this->load->view("common/estudiantes/partes/info_perfil_profesional", @$estudiante , @$perfil_personalizado ); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#practica_profesional">
                                            Pr&aacute;ctica Profesional
                                        </a>
                                    </h4>
                                </div>
                                <div id="practica_profesional" class="panel-collapse collapse">
                                    <div class="box-body">                 
                                        <div class="col-md-12">
                                            <ul class="nav nav-pills">
                                                <li class="active"><a data-toggle="tab" href="#home">RESUMEN</a></li>
                                                <li><a data-toggle="pill" href="#menu1"><b>INFORMACI&Oacute;N LABORAL</b></a></li>
                                                <?php if ($estudiante['id_estado'] != '3'): ?>
                                                <li><a data-toggle="pill" href="#menu3"><b>SEGUIMIENTO</b></a></li>
                                                <?php endif; ?>
                                                <li><a data-toggle="pill" href="#menu2"><b>HISTORIAL</b></a></li>
                                                <?php if ($visitas_realizadas == @$modalidad['numero_visitas'] && $this->session->userdata("id_rol_usuario") == ID_ROL_COORDINADOR): ?>
                                                <!--<li><a data-toggle="pill" href="#menu4"><b>EVALUAR PR&Aacute;CTICA</b></a></li>-->
                                                <?php endif; ?>
                                            </ul>

                                            <div class="tab-content">
                                                
                                                <!--    PRACTICA PROFESIONAL TAB INICIAL    -->
                                                <?php $this->load->view("common/estudiantes/partes/info_practica_estado", $practica, $profesor, $modalidad); ?>
                                                
                                                <!--    PRACTICA PROFESIONAL TAB EMPRESA    -->
                                                <?php $this->load->view("common/estudiantes/partes/info_practica_empresa", $empresa); ?>
                                                
                                                <!--    PRACTICA PROFESIONAL TAB HISTORIAL (NOVEDADES)    -->
                                                <?php $this->load->view("common/estudiantes/partes/info_practica_historial", $novedades); ?>
                                                
                                                <!--    PRACTICA PROFESIONAL TAB VISITAS    -->
                                                <?php $this->load->view("common/estudiantes/partes/info_practica_visitas", $visitas, $practica, $visitas_realizadas ); ?>
                                                
                                                <!--    PRACTICA PROFESIONAL TAB EVALUACION    -->
                                                <?php //$this->load->view("common/estudiantes/partes/info_practica_evaluacion", $practica); ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
              
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

            <!-- Left col -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
//    $(document).ready(function() {
//        $("#id_facultad").trigger("change");
//    });
//
//    $("#id_facultad").change(function() {
//        var valor = $("#id_facultad").val();
//        $("#id_programa").empty();
//        $("#id_programaDiv").hide();
//        if (valor !== "") {
//            $.ajax({
//                url: "<?= base_url("admin/profesor") ?>" + "/traerPrograma/" + valor,
//                type: "POST",
//                dataType: "json",
//                success: function(msg) {
//                    $("#id_programaDiv").show();
//                    $("#id_programa").append("<option value=''>Seleccione el programa</option>");
//                    for (i = 0; i < msg.length; i++) {
//                        $("#id_programa").append("<option value='" + msg[i].id + "'>" + msg[i].nombre + "</option>");
//                    }
//                }
//
//            });
//        }
//
//    });
//    $('.btn_cancelar').click(function() {
//        $('.modal').modal('hide');
//    });

</script>

<script>
    
$('.btn_cancelar').click(function() {
    $('.modal').modal('hide');
});

</script>
<?php $this->load->view("plantilla/footer"); ?>