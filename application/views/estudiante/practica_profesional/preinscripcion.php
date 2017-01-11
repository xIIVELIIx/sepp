<?php 
    $this->load->view("plantilla/head", ['titulo' => $titulo]);
    $this->load->view("plantilla/header");
    $this->load->view("plantilla/nav_estudiante");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titulo ?>
            <small>M&oacute;dulo de Estudiante</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">

            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="box box-success">

                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong>
                        </div>') ?>
                    
                    <?= form_open("estudiante/practica_profesional/preinscripcion") ?>
                        <!-- ////   LOAD FORM    ////////////////////--> 
                        <?php $this->load->view("estudiante/practica_profesional/partes/form_preinscripcion",['modalidades'=>$modalidades]); ?>
                    
                    <?= form_close() ?>

                </div><!-- /.box -->

            </section>
            <!-- Left col -->

        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view("plantilla/footer"); ?>

<?php if(@$preinscripcion_exitosa === TRUE) { ?>

<?php $this->load->view("estudiante/practica_profesional/partes/modal_confirmacion_preinscripcion"); ?>

<script>

    $('#preinscripcion_confirmation_modal').modal({
        keyboard: false,
        backdrop: 'static'
    });
    
</script>

<?php } ?>


