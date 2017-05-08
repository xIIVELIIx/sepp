<?php
$this->load->view("plantilla/head", ['titulo' => $titulo]);
$this->load->view("plantilla/header");
$this->load->view("plantilla/$nav");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titulo ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Estudiantes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Main row -->
        <div class="row">
                <div class="box box-solid">
                    <?= show_notification(); ?>
                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <button id="btn_back" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
                        </div>
                    </div>

                    <div class="box-body">
                        
                        <div class="row">
                
                            <input type="hidden" id="estudiante_id" value="<?= $estudiante["id"] ?>">
                            
                            <!-- INFORMACION GENERAL -->
                            
                            <?php $this->load->view("common/estudiantes/partes/info_general", $estudiante); ?>
                            
                            
                            <!-- INFROMACION DE PERFIL PROFESIONAL -->
                            
                            <div class="col-md-12">
                                <hr>
                                <h2>Perfil Profesional</h2>
                            </div>
                            
                            <div class="row-md">
                            
                            <?php $this->load->view("common/estudiantes/partes/info_aptitud_profesional", $aptitud_profesional); ?>
                            <?php $this->load->view("common/estudiantes/partes/info_perfil_profesional", $estudiante , $perfil_personalizado ); ?>
                                
                            </div>
                            
                            <div class="col-md-12">
                                <hr>
                                <h2>Pr&aacute;ctica Profesional</h2>
                                <?php var_dump($practica); ?>
                                <?php $this->load->view("common/estudiantes/partes/info_practica", $practica, $profesor, $estudiante , $perfil_personalizado ); ?>
                                
                            </div>
                        
                        </div>
                        
                        
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            
                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Profesor Asignado
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="box-body">
                                        <!-- ////   LOAD VIEW    ////////////////////-->                                        
                                        <?php if ($profesor !== ''): ?>
                                            <?php $this->load->view("common/estudiantes/partes/info_profesor", $profesor); ?>
                                        <?php else: ?>
                                            <?php if ($empresa !== ''): ?>
                                                <?php $this->load->view("common/estudiantes/partes/asignar_docente", $profesoresList); ?>
                                            <?php else: ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong><i class="icon fa fa-check"></i>&nbsp;Debe agregar una empresa para poder asignar un docente.</strong>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <!-- ***   END LOAD VIEW *** --> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsethree">
                                            Aptitud Profesional
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsethree" class="panel-collapse collapse">
                                    <div class="box-body">                 
                                        <!-- ***   LOAD VIEW *** --> 
                                        <?php $this->load->view("common/estudiantes/partes/info_aptitud_profesional", $aptitud_profesional); ?>
                                        <!-- ***   END LOAD VIEW *** --> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                                            Empresa
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsefour" class="panel-collapse collapse">
                                    <div class="box-body">                 
                                        <!-- ***   LOAD VIEW *** -->
                                        <?php if ($empresa !== ''): ?>
                                            <?php $this->load->view("common/estudiantes/partes/info_empresa", $empresa); ?>
                                        <?php else: ?>
                                            <?php $this->load->view("common/estudiantes/partes/asignar_empresa", $empresasList); ?>
                                        <?php endif; ?>
                                        <!-- ***   END LOAD VIEW *** --> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
                                            Practica Profesional
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsefive" class="panel-collapse collapse">
                                    <div class="box-body">                 
                                        <!-- ***   LOAD VIEW *** --> 
                                        <?php $this->load->view("common/estudiantes/partes/info_practica_profesional", $modalidad, $estudiante, $visitas); ?>
                                        <!-- ***   END LOAD VIEW *** --> 
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

<?php $this->load->view("plantilla/footer"); ?>