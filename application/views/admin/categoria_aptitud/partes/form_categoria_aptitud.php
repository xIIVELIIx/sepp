<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombre<span class="required">*</span>
            </label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="glyphicon glyphicon-pencil"></i>    
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
            <label>Facultad<span class="required">*</span>
            </label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-institution"></i>              
                </div>
                <select name="id_facultad" id="id_facultad" required="required" class="form-control">
                    <option value="">Seleccione la facultad</option>
                    <?php foreach ($facultades->result() as $value): ?>
                        <?php $attribFacultad = ($value->id === @$id_facultad) ? TRUE : '' ?>
                        <option value="<?= $value->id ?>" <?= set_select("id_facultad", $value->id, $attribFacultad); ?> ><?= $value->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group" id="id_programaDiv" hidden>
            <label>Programa<span class="required">*</span>
            </label>
            <div class="input-group">            
                <div class="input-group-addon">  
                    <i class="fa fa-graduation-cap"></i> 
                </div>
                <select name="id_programa" id="id_programa" required="required" class="form-control">
                    <option value="">Seleccione el programa</option>
                </select>
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
    </div>
</div><!-- /.box-body -->
