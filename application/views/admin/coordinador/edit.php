<?php
$this->load->view("plantilla/head", ['titulo' => $titulo]);
$this->load->view("plantilla/header");
$this->load->view("plantilla/nav");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titulo ?>
            <small>M&oacute;dulo de Administrador</small>
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

            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="box box-success">

                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <a href="<?= base_url() . "admin/coordinador" ?>">
                                <button id="back" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
                            </a>
                        </div>
                    </div>



                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong>
                        </div>') ?>

                    <?= form_open("admin/coordinador/edit/" . @$coordinador['id']) ?>

                    <!-- ////   LOAD FORM    ////////////////////--> 
                    <?php $this->load->view("admin/coordinador/partes/form_coordinador", $coordinador); ?>

                    <?= form_close() ?>


                </div><!-- /.box -->

            </section>
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
                url: "<?= base_url("admin/coordinador") ?>" + "/traerPrograma/" + valor,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    $("#id_programaDiv").show();
                    $("#id_programa").append("<option value=''>Seleccione el programa</option>");
                    for (i = 0; i < msg.length; i++) {
                        var selected = (msg[i].id == <?= $coordinador["id_programa"] ?>) ? "selected=\"selected\"" : '';
                        $("#id_programa").append("<option value='" + msg[i].id + "'" + selected + ">" + msg[i].nombre + "</option>").trigger("change");
                    }
                }

            });
        }

    });
</script>

<?php $this->load->view("plantilla/footer"); ?>