
<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<div class="box-body">
    <div class="col-md-6">

        <div class="form-group">
            <label>Nombre<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="text" id="nombre" name="nombre" value="<?= set_value('nombre', @$nombre); ?>" class="form-control" required="required"  min="0">
            </div>
        </div>

        <div class="form-group">
            <label>Tel&eacute;fono
            </label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-phone"></i>       
                </div>
                <input type="number" id="telefono" name="telefono" value="<?= set_value("telefono", @$telefono) ?>" class="form-control" min="0">
            </div>
        </div>

        <div class="form-group">
            <label>Celular
            </label>
            <div class="input-group">         
                <div class="input-group-addon">  
                    <i class="fa fa-phone"></i>   
                </div>
                <input type="number" id="celular" name="celular" value="<?= set_value("celular", @$celular) ?>" class="form-control" min="0">
            </div>
        </div>

    </div> <!-- col-md-6 -->

    <div class="col-md-6">

        <div class="form-group">
            <label>Direcci&oacute;n
            </label>
            <div class="input-group">         
                <div class="input-group-addon">      
                    <i class="fa fa-envelope"></i>   
                </div>
                <input type="text" id="direccion" name="direccion" value="<?= set_value("direccion", @$direccion) ?>" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label>Ciudad<span class="required">*</span>
            </label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-institution"></i>              
                </div>
                <select name="id_ciudad" id="id_ciudad" required="required" class="form-control">
                    <option value="">Seleccione la Ciudad</option>
                    <?php foreach ($ciudades->result() as $value): ?>
                        <?php $attribCiudad = ($value->id === @$id_ciudad) ? TRUE : '' ?>
                        <option value="<?= $value->id ?>" <?= set_select("id_ciudad", $value->id, $attribCiudad); ?> ><?= $value->nombre ?></option>
                    <?php endforeach; ?>
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
