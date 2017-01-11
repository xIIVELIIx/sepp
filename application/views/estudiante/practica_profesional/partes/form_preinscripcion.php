<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>Modalidad de Pr&aacute;ctica:<span class="required">*</span></label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="fa fa-random"></i>    
                </div>
                <select class="form-control" name="id_modalidad" id="id_modalidad" required>
                    <option value=''>- Selecciona una modalidad -</option>

                    <?php foreach($modalidades as $a) { ?>
                        <option value="<?= $a->id ?>" ><?= $a->nombre ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div id="div_tip" class="well well-sm form-group text-justify hidden">
            <p>
                <span id="tip" class="text-muted"></span><br>
                <span id="visitas" class="text-muted"></span>
            </p>
        </div>
        <div id="datos_empresa" class="hidden">
            <div class="form-group">
                <label>Nombres<span class="required">*</span>
                </label>
                <div class="input-group">   
                    <div class="input-group-addon">  
                        <i class="fa fa-user"></i>    
                    </div>
                    <input type="text" id="nombre_jefe" name="nombre_jefe" value="<?= set_value("nombre", @$nombre) ?>" class="form-control" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <button  class="btn btn-small btn-success">
                <span class="fa fa-handshake-o">&nbsp;</span>Confirmar preinscripci&oacute;n
            </button>
        </div>
        
    </div>
</div><!-- /.box-body -->


<script>
    $("#id_modalidad").change(function(){
        
        var html = "";
        $.ajax({
                url: '<?= base_url() ?>estudiante/practica_profesional/get_detalle_modalidad/'+document.getElementById('id_modalidad').value,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    if(msg !== ""){
                        $("#div_tip").removeClass("hidden");
                        $("#tip").html(msg.descripcion);
                        $("#visitas").html("<b>Visitas de seguimiento: </b>"+msg.numero_visitas);
                        
                    }else{
                        $("#div_tip").addClass("hidden");
                    }
                }
            });
        /*
        if($(this).val() == 1 || $(this).val() == 3){
            $("#datos_empresa").removeClass("hidden");
        }else{
            $("#datos_empresa").addClass("hidden");
        }
        */
    });
    
</script>