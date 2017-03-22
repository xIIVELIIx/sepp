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
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Aptitudes</li>
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
                        <div class="col-md-10">
                            <h3><?= $titulo ?></h3>
                        </div>
                        <div class="col-md-2 text-center">
                            <button id="btn_back" class="btn btn-small btn-default"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
                        </div>
                    </div>
                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong>
                        </div>') ?>
                    
                    <?= form_open("admin/aptitud_profesional/add") ?>
                        <!-- ////   LOAD FORM    ////////////////////--> 
                        <?php $this->load->view("admin/aptitud_profesional/partes/form_aptitud_profesional"); ?>
                    
                    <?= form_close() ?>

                </div><!-- /.box -->

            </section>
            <!-- Left col -->

        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php $this->load->view("plantilla/footer"); ?>