<?php
$this->load->view("plantilla/head", ['titulo' => $titulo]);
$this->load->view("plantilla/header");
$this->load->view("plantilla/".$nav);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">

            <div class="col-md-12">
                <div class="box box-solid">

                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <a href="<?= base_url() ?>">
                                <button id="back" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
                            </a>
                        </div>
                    </div>


                    <div class="box-body">
                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Información General - <?= $estudiante["nombre"] . ' ' . $estudiante["apellido"] ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong></div>') ?>
                                                          
                                        <!-- ***   LOAD VIEW *** --> 
                                        <?php $this->load->view("common/estudiantes/partes/info_general", $estudiante); ?>
                                        <!-- ***   END LOAD VIEW *** --> 
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Practica Profesional
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="box-body"> 

                                    <a href="<?= base_url()."profesor/visita/add/".$practica['id']; ?>">Agregar Visita</a>
                                    <p>HOLA</p>
                                        <?php //$this->load->view("common/estudiantes/partes/info_practica", $practica); ?>
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
    $(document).ready(function() {
        $("#id_facultad").trigger("change");
    });

    $("#id_facultad").change(function() {
        var valor = $("#id_facultad").val();
        $("#id_programa").empty();
        $("#id_programaDiv").hide();
        if (valor !== "") {
            $.ajax({
                url: "<?= base_url("admin/profesor") ?>" + "/traerPrograma/" + valor,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    $("#id_programaDiv").show();
                    $("#id_programa").append("<option value=''>Seleccione el programa</option>");
                    for (i = 0; i < msg.length; i++) {
                        $("#id_programa").append("<option value='" + msg[i].id + "'>" + msg[i].nombre + "</option>");
                    }
                }

            });
        }

    });
</script>

<?php $this->load->view("plantilla/footer"); ?>