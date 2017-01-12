<button type="button" class="btn btn-block btn-warning btn-lg" id="vincular">Asignar Empresa</button>
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
                            <?php foreach ($empresasList as $value): ?>
                                <option value="<?= $value->id ?>"><?= $value->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-default btn_cancelar"><span class="glyphicon glyphicon-repeat">&nbsp</span>Cancelar</button>
                        <button id="btn_vincular" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle">&nbsp</span>Vincular</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#vincular").click(function() {

        $('#vincular_modal').modal({
            keyboard: false,
            backdrop: 'static'
        });

        document.getElementById("vincular_id").value = this.id;

    });
</script>

<script>

    $('#btn_vincular').click(function(e) {

        var id_usuario = document.getElementById("estudiante_id").value;
        var id_empresa = document.getElementById("empresas_id").value;
        $("#msj").hide().empty();
        if (id_empresa !== "") {
            $.ajax({
                type: 'POST',
                url: "<?= base_url("coordinador/estudiantes/vincular/") ?>" + id_usuario + "/" + id_empresa,
                dataType: 'json',
                success: function(data) {
                    window.location.href = "<?= base_url("coordinador/estudiantes/view/") ?>" + id_usuario;
                }
            });
        } else {
            $("#msj").append("<p>Debes seleccionar alguna empresa.</p>").show();
            $("#empresas_id").focus();
        }
    });

</script>