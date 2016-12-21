
<div class="box-body">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon fa fa-check"></i> Profesor creado correctamente!</strong>
    </div>
    <div class="col-md-6">
        <input type="hidden" id="id" name="id" value="<?= set_value('id', @$id); ?>" >
        <input type="hidden" id="id_rol_usuario" name="id_rol_usuario" value="<?= set_value('id_rol_usuario', @$id_rol_usuario); ?>" >
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
            <label>C&oacute;digo Uniminuto<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="number" id="codigo_uniminuto" name="codigo_uniminuto" value="<?= set_value('codigo_uniminuto', @$codigo_uniminuto); ?>" required="required" class="form-control" >
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
                    <i class="fa fa-phone"></i>   
                </div>
                <input type="number" id="celular" name="celular" value="<?= set_value("celular", @$celular) ?>" class="form-control" min="0">
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
                        <option value="<?= $value->id ?>" <?= set_select("id_facultad", @$id_facultad, $attribFacultad); ?> ><?= $value->nombre ?></option>
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

        <?php if (isset($id_programa)): ?>
            <script>
                $("#id_programa").val(<?= $id_programa ?>);
            </script>
        <?php endif; ?>

        <div class="form-group">
            <label>Sede<span class="required">*</span>
            </label>
            <div class="input-group">           
                <div class="input-group-addon">    
                    <i class="fa fa-home"></i>    
                </div>
                <select name="id_sede" id="id_sede" required="required" class="form-control">
                    <option value="">Seleccione la Sede</option>
                    <?php foreach ($sedes->result() as $value): ?>
                        <?php $attribSede = ($value->id === @$id_sede) ? TRUE : '' ?>
                        <option value="<?= $value->id ?>" <?= set_select("id_sede", @$id_sede, $attribSede); ?> ><?= $value->nombre ?></option>
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
