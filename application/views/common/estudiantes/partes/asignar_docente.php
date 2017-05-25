<button type="button" class="btn btn-block btn-warning btn-lg" id="en_curso">Asignar Docente</button>
<!-- Modal -->
<div class="modal fade" id="en_curso_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div id="msj2" class="alert alert-warning" role="alert" hidden></div>
                <div class="row" align="center">
                    <h3>Vinculaci&oacute;n de alumno con docente</h3>
                    <div class="form-group">
                        <select id="profesor_id" class="form-control select2" style="width: 50%;">
                            <option value="">Seleccione el docente</option>
                            <?php foreach ($profesoresList as $value): ?>
                                <option value="<?= $value->id ?>"><?= $value->nombre . ' ' . $value->apellido ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-default btn_cancelar"><span class="glyphicon glyphicon-repeat">&nbsp</span>Cancelar</button>
                        <button id="btn_en_curso" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle">&nbsp</span>Vincular</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#en_curso").click(function() {

        $('#en_curso_modal').modal({
            keyboard: false,
            backdrop: 'static'
        });

        //document.getElementById("en_curso_id").value = this.id;

    });
</script>

<script>

    $('#btn_en_curso').click(function(e) {
        var id_usuario = document.getElementById("estudiante_id").value;
        var id_profesor = document.getElementById("profesor_id").value;
        $("#msj2").hide().empty();
        if (id_profesor !== "") {
            $.ajax({
                type: 'POST',
                url: "<?= base_url("coordinador/estudiantes/en_curso/") ?>" + id_usuario + "/" + id_profesor,
                dataType: 'json',
                success: function(data) {
                    window.location.href = "<?= base_url("coordinador/estudiantes/view/") ?>" + id_usuario;
                }
            });
        } else {
            $("#msj2").append("<p>Debes seleccionar algun Docente.</p>").show();
            $("#profesor_id").focus();
        }
    });

</script>