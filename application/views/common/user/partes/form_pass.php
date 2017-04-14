<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<input type="hidden" id="id_rol_usuario" name="id_rol_usuario" value="<?= @$id_rol_usuario ?>" >
<div class="box-body">
    <div class="col-md-3">
        <div class="form-group">
            <label>Contrase&ntilde;a Anterior<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="password" id="password" name="old_password" class="form-control" required="required"  min="0">
            </div>
        </div>
    </div> <!-- col-md-3 -->

    <div class="col-md-3">
        <div class="form-group">
            <label>Contrase&ntilde;a Nueva<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="password" id="password" name="password" class="form-control" required="required"  min="0">
            </div>
        </div>
    </div> <!-- col-md-3 -->

    <div class="col-md-3">
        <div class="form-group">
            <label>Confirme la Contrase&ntilde;a Nueva<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                </div>
                <input type="password" id="repassword" name="repassword" class="form-control" required="required"  min="0">
            </div>
        </div>
    </div> <!-- col-md-3 -->


    <div class="col-md-3">
        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button id="btn_save" class="btn btn-small btn-danger">
                    <span class="glyphicon glyphicon-save">&nbsp;</span>Cambiar Contrase&ntilde;a
                </button>
            </div>
        </div>
    </div>
</div><!-- /.box-body -->
