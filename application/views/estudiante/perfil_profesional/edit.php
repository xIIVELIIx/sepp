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
            <section class="col-lg-6 connectedSortable">
                <div class="box">
                    <div class="box-header">
                        <div class="col-sm-12">
                            <?= show_notification(); ?>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-primary">Aptitudes profesionales</h4>
                            <p><?= $estado_aptitudes ?></p>
                        </div>
                    </div>
                    <div class="box-body chat" id="chat-box" style="overflow: auto">
                        <div class="col-sm-12 text-right">
                            <button id="add_aptitud" class="btn btn-small btn-success" data-toggle="modal" data-target="#add_aptitud_modal">
                                <span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Agregar aptitud
                            </button>
                        </div>
                        <br/><br/>
                        <div class="well well-sm pre-scrollable">
                        <?php if(!empty($aptitudes_estudiante)) { ?>
                            <?php foreach ($aptitudes_estudiante as $key_categoria => $value) { ?>
                            
                            <h5 class="text-info"><?= $key_categoria ?></h5>
                            
                            <ul>
                            <table class="table">
                                <?php foreach ($value as $aptitudes) { ?>
                                <tr>
                                    <td><b><?= $aptitudes->nombre ?>: </b><?= $aptitudes->descripcion ?></td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="eliminar" href="<?= base_url() ?>estudiante/perfil_profesional/delete_aptitud/<?= $aptitudes->id ?>">
                                            <span class="text-danger glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </table>
                            </ul>
                            <hr style="border-color:#31708f;">
                            <?php } ?>
                        <?php }else{  ?>
                            <span class="text-danger">No has agregado aptitudes a tu perfil profesional</span>
                        <?php } ?>
                        </div>
                        
                    </div>
                        
                </div>
                
            </section>
            <!-- Right col -->
            
            <section class="col-lg-6 connectedSortable">
                <div class="box">
                    <div class="box-header">
                        <h4 class="text-primary">Descripci&oacute;n personal del perfil profesional</h4>
                        <p><?= $estado_perfil_personalizado ?></p>
                    </div>
                    <div class="box-body chat" id="chat-box" style="overflow: auto">
                        <?= form_open("estudiante/perfil_profesional/edit_profile_description") ?>
                            
                            <div class="form-group">
                                <textarea rows="10" id="comentario" name="comentario" required="required" class="form-control" ><?= @$perfil_personalizado[0]->comentario ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_estudiante" value="<?= $this->session->userdata('id') ?>">
                                <button class="btn btn-small btn-success">
                                    <span class="glyphicon glyphicon-save">&nbsp;</span>Guardar
                                </button>
                            </div>                                
                        <?= form_close() ?>
                        
                    </div>
                </div>
                
            </section>
            
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->load->view("estudiante/perfil_profesional/partes/modal_agregar_aptitud",['categorias' => $listado_categorias]); ?>

<?php $this->load->view("plantilla/footer"); ?>