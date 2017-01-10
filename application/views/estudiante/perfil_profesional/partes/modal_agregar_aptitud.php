
<!-- Modal -->
<div class="modal fade" id="add_aptitud_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar aptitudes profesionales</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

                <div class="row" align="center">
                    <p>Selecciona una categor&iacute;a y una aptitud.</p>
                    
                    <?= form_open("estudiante/perfil_profesional/add_aptitud") ?>
                    
                        <div class="form-group">
                            <select class="selectpicker" data-live-search="true" data-width="100%" name="id_categoria" id="id_categoria" required>
                                <option value=''>- Selecciona una categor&iacute;a -</option>

                                <?php foreach($categorias as $a) { ?>
                                    <option data-tokens="<?= $a->nombre ?>" value="<?= $a->id ?>" ><?= $a->nombre ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    
                        <div class="form-group">
                            <select class="selectpicker" data-live-search="true" data-width="100%" name="id_aptitud" id="id_aptitud" required>
                                <option value=''>- Selecciona una aptitud -</option>
                            </select>
                        </div>
                        
                        <div id="div_tip" class="form-group text-justify hidden">
                            <p>
                                <i class="fa fa-quote-left"></i>
                                <span id="tip_aptitud" class="small"></span>
                                <i class="fa fa-quote-right"></i>
                            </p>
                        </div>
                    
                        <div class="form-group">
                            <button class="btn btn-small btn-success">
                                <span class="glyphicon glyphicon-save">&nbsp;</span>Guardar
                            </button>
                        </div>
                    
                    <?= form_close() ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btn_close').click(function() {
        $('#add_aptitud_modal').modal('hide');
        $("input").val("");
    });
    
</script>

<script>
    $("#id_categoria").change(function(){
        
        var html_option = "<option value=''>- Selecciona una aptitud -</option>";
        $("#div_tip").addClass("hidden");
        
        $.ajax({
                url: '<?= base_url() ?>estudiante/perfil_profesional/get_aptitudes_by_categoria/'+document.getElementById('id_categoria').value,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    if(msg !== ""){
                        for (i = 0; i < msg.length; i++) {
                            html_option += "<option data-tokens='" + msg[i].nombre + "' value='" + msg[i].id + "' >" + msg[i].nombre + "</option>";
                            $("#id_aptitud").html(html_option);
                        }
                        $('#id_aptitud').selectpicker('refresh');
                    }
                }
            });
    });
    
    $("#id_aptitud").change(function(){
        
        var html = "";
        $.ajax({
                url: '<?= base_url() ?>estudiante/perfil_profesional/get_detalle_aptitud/'+document.getElementById('id_aptitud').value,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    if(msg !== ""){
                        $("#div_tip").removeClass("hidden");
                        $("#tip_aptitud").html(msg.descripcion);
                    }else{
                        $("#div_tip").addClass("hidden");
                    }
                }
            });
    });
    
</script>
  