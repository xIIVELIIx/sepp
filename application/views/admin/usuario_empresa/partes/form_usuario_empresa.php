<input type="hidden" id="id_rol_usuario" name="id_rol_usuario" value="<?= ID_ROL_EMPRESA ?>" >
<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>C&eacute;dula<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="number" id="cedula" name="cedula" value="<?= set_value('cedula', @$cedula); ?>" class="form-control" required="required"  min="0">
            </div>
        </div>
        <div class="form-group">
            <label>Nombres<span class="required">*</span>
            </label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="fa fa-user"></i>    
                </div>
                <input type="text" id="nombre" name="nombre" value="<?= set_value("nombre", @$nombre) ?>" required="required" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label>Apellidos<span class="required">*</span>
            </label>
            <div class="input-group">
                <div class="input-group-addon"> 
                    <i class="fa fa-user"></i> 
                </div>
                <input type="text" id="apellido" name="apellido" value="<?= set_value("apellido", @$apellido) ?>" required="required" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label>Email<span class="required">*</span>
            </label>
            <div class="input-group">           
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="email" id="email1" name="email1" value="<?= set_value("email1", @$email1) ?>" required="required" class="form-control" >
            </div>
        </div>

    </div> <!-- col-md-6 -->

    <div class="col-md-6">

        <div class="form-group">
            <label>Email 2 (opcional)
            </label>
            <div class="input-group">         
                <div class="input-group-addon">      
                    <i class="fa fa-envelope"></i>   
                </div>
                <input type="email" id="email2" name="email2" value="<?= set_value("email2", @$email2) ?>" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label>Tel&eacute;fono Fijo
            </label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-phone"></i>       
                </div>
                <input type="number" id="telefono_fijo" name="telefono_fijo" value="<?= set_value("telefono_fijo", @$telefono_fijo) ?>" class="form-control" min="0">
            </div>
        </div>

        <div class="form-group">
            <label>Celular
            </label>
            <div class="input-group">         
                <div class="input-group-addon">  
                    <i class="fa fa-mobile-phone"></i>   
                </div>
                <input type="number" id="celular" name="celular" value="<?= set_value("celular", @$celular) ?>" class="form-control" min="0">
            </div>
        </div>

        <div class="form-group">
            <label>Empresa<span class="required">*</span>
            </label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-keyboard-o"></i>              
                </div>
                <select name="id_empresa" id="id_empresa" required="required" class="form-control">
                    <option value="">Seleccione la empresa</option>
                    <?php foreach ($empresas as $value): ?>
                        <?php $attribEmpresa = ($value->id === @$id_empresa) ? TRUE : '' ?>
                        <option value="<?= $value->id ?>" <?= set_select("id_empresa", $value->id, $attribEmpresa); ?> ><?= $value->nombre ?></option>
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
