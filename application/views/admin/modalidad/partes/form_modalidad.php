<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombre<span class="required">*</span>
            </label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="fa fa-user"></i>    
                </div>
                <input type="text" id="nombre" name="nombre" value="<?= set_value("nombre", @$nombre) ?>" required="required" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label>Descripci&oacute;n<span class="required">*</span>
            </label>
            <div class="input-group">
                <div class="input-group-addon"> 
                    <i class="glyphicon glyphicon-edit"></i> 
                </div>
                <textarea rows="5" id="descripcion" name="descripcion" value="<?= set_value("descripcion", @$descripcion) ?>" required="required" class="form-control" ><?= @$descripcion ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label>Número de Visitas<span class="required">*</span>
            </label>
            <div class="input-group">
                <div class="input-group-addon"> 
                    <i class="fa fa-user"></i> 
                </div>
                <input type="number" id="numero_visitas" name="numero_visitas" value="<?= set_value("numero_visitas", @$numero_visitas) ?>" required="required" class="form-control" min="0">
            </div>
        </div>

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button id="btn_save" class="btn btn-small btn-success">
                    <span class="glyphicon glyphicon-save">&nbsp;</span>Guardar
                </button>
            </div>
        </div>

    </div> <!-- col-md-6 -->

</div><!-- /.box-body -->
