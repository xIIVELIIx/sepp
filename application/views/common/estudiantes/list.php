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
            <small>M&oacute;dulo de Coordinador</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("test") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profesores</li>
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
                    </div>
                    <div class="box-body chat" id="chat-box" style="overflow: auto">
                        <table id="data_table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Programa</th>
                                    <th>Facultad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Programa</th>
                                    <th>Facultad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
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
<div class="modal fade" id="vincular_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div id="msj" class="alert alert-warning" role="alert" hidden></div>
                <div class="row" align="center">
                    <h3>Vinculaci&oacute;n de alumno con empresa</h3>
                    <div class="form-group">
                        <select id="empresas_id" class="form-control select2" style="width: 50%;">
                            <option value="">Seleccione la Empresa</option>
                            <?php foreach ($empresas as $value): ?>
                                <option value="<?= $value->id ?>"><?= $value->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input type="hidden" id="vincular_id" value="" />
                        <button id="btn_cancelar_remove" class="btn btn-default"><span class="glyphicon glyphicon-repeat">&nbsp</span>Cancelar</button>
                        <button id="btn_vincular" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle">&nbsp</span>Vincular</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="enable_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div class="row" align="center">
                    <h3>&iquest;Confirma habilitar nuevamente al usuario?</h3>
                    <div class="form-group">
                        <input type="hidden" id="enable_id" value="" />
                        <button id="btn_cancelar_enable" class="btn btn-default"><span class="glyphicon glyphicon-repeat">&nbsp</span>Cancelar</button>
                        <button id="btn_enable" class="btn btn-info"><span class="glyphicon glyphicon-check">&nbsp</span>Habilitar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("plantilla/footer"); ?>


<script>
    $(".vincular").click(function() {
<<<<<<< HEAD
=======

>>>>>>> origin/dev
        $('#vincular_modal').modal({
            keyboard: false,
            backdrop: 'static'
        });
<<<<<<< HEAD
        document.getElementById("vincular_id").value = this.id;
=======

        document.getElementById("vincular_id").value = this.id;

>>>>>>> origin/dev
    });
    $(".enable").click(function() {
        $('#enable_modal').modal({
            keyboard: false,
            backdrop: 'static'
        });
        document.getElementById("enable_id").value = this.id;
    });
</script>

<script>
<<<<<<< HEAD
    $('#btn_vincular').click(function(e) {
=======

    $('#btn_vincular').click(function(e) {

>>>>>>> origin/dev
        var id_usuario = document.getElementById("vincular_id").value;
        var id_empresa = document.getElementById("empresas_id").value;
        $("#msj").hide().empty();
        if (id_empresa !== "") {
            $.ajax({
                type: 'POST',
                url: "<?= base_url("coordinador/estudiantes/vincular/") ?>"+id_usuario+"/"+id_empresa,
                dataType: 'json',
                success: function(data) {
                    window.location.href = "<?= base_url("coordinador/estudiantes") ?>";
                }
            });
        } else {
            $("#msj").append("<p>Debes seleccionar alguna empresa.</p>").show();
            $("#empresas_id").focus();
        }
    });
    $('#btn_cancelar_remove').click(function() {
        $('#vincular_modal').modal('hide');
    });
</script>

<script>
    $('#btn_enable').click(function(e) {
        var id_usuario = document.getElementById("enable_id").value;
        $.ajax({
            type: 'POST',
            url: "<?= base_url("admin/profesor/enable/") ?>" + id_usuario,
            dataType: 'json',
            success: function(data) {
                window.location.href = "<?= base_url("admin/profesor") ?>";
            }
        });
    });
    $('#btn_cancelar_enable').click(function() {
        $('#enable_modal').modal('hide');
    });
</script>