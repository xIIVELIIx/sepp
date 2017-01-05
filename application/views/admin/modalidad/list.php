<?php
$this->load->view("plantilla/head", ['titulo' => $titulo]);
$this->load->view("plantilla/header");
$this->load->view("plantilla/nav");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Modalidades
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("admin/home") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Modalidades</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <!-- right col -->
            <section class="col-lg-12 connectedSortable">

                <!-- Chat box -->
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-10">
                            <?= show_notification(); ?>
                        </div>
                        <div class="col-md-2 text-center">
                            <a href="<?= base_url() . "admin/modalidad/add" ?>">
                                <button id="back" class="btn btn-small btn-success"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Nueva modalidad</button>
                            </a>
                        </div>
                    </div>
                    <div class="box-body chat" id="chat-box" style="overflow: auto">
                        <table id="data_table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>visitas</th>
                                    <th>Estado</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombres</th>
                                    <th>visitas</th>
                                    <th>Estado</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?= $html ?>
                            </tbody>
                        </table>
                    </div><!-- /.chat -->
                    <div class="box-footer">

                    </div>
                </div><!-- /.box (chat box) -->
            </section>
            <!-- right col -->

        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="remove_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div class="row" align="center">
                    <h3>&iquest;Confirma deshabilitar la modalidad?</h3>
                    <div id="msj" class="alert alert-danger hide" role="alert"></div>
                    <div class="form-group">
                        <input type="hidden" id="remove_id" value="" />
                        <button id="btn_cancelar" class="btn btn-default"><span class="glyphicon glyphicon-repeat">&nbsp</span>Cancelar</button>
                        <button id="btn_borrar" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle">&nbsp</span>Deshabilitar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view("plantilla/footer"); ?>


<script>
    $(".remove").click(function() {

        $('#remove_modal').modal({
            keyboard: false,
            backdrop: 'static'
        });

        document.getElementById("remove_id").value = this.id;

    });
</script>

<script>

    $('#btn_borrar').click(function(e) {

        var id_usuario = document.getElementById("remove_id").value;

        $.ajax({
            type: 'POST',
            url: "<?= base_url("admin/modalidad/remove/") ?>" + id_usuario,
            dataType: 'json',
            success: function(data) {
                window.location.href = "<?= base_url("admin/modalidad") ?>";
            }
        });
    });

    $('#btn_cancelar').click(function() {
        $('#remove_modal').modal('hide');
    });

</script>