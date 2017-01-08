<div class="col-sm-8 col-sm-offset-2">
    <h3>Reg&iacute;state aqu&iacute;</h3>
    <p>Si ya est&aacute;s registrado, debes    <a href="user/login">iniciar sesi&oacute;n</a>.</p>
    
    <div class="form-group">
        <div class="input-group">   
            <div class="input-group-addon">  
                <i class="fa fa-barcode"></i>    
            </div>
            <input type="number" id="cedula" placeholder="C&eacute;dula" name="cedula" value="<?= set_value("cedula", @$cedula) ?>" required="required" class="form-control" >
        </div>
    </div>
                                
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"> 
                <i class="fa fa-barcode"></i> 
            </div>
            <input type="number" id="codigo_uniminuto" name="codigo_uniminuto" placeholder="C&oacute;digo Uniminuto" value="<?= set_value("codigo_uniminuto", @$codigo_uniminuto) ?>" required="required" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">   
            <div class="input-group-addon">  
                <i class="fa fa-user"></i>    
            </div>
            <input type="text" id="nombre" placeholder="Nombres" name="nombre" value="<?= set_value("nombre", @$nombre) ?>" required="required" class="form-control" >
        </div>
    </div>
                                
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"> 
                <i class="fa fa-user"></i> 
            </div>
            <input type="text" id="apellido" name="apellido" placeholder="Apellidos" value="<?= set_value("apellido", @$apellido) ?>" required="required" class="form-control" >
        </div>
    </div>
                                
    <div class="form-group">
        <div class="input-group">           
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            <input type="email" id="email1" name="email1" placeholder="Correo Uniminuto" value="<?= set_value("email1", @$email1) ?>" required="required" class="form-control" >
        </div>
    </div>
                                
    <div class="form-group">
        <div class="input-group">         
            <div class="input-group-addon"> 
                <i class="fa fa-phone"></i>       
            </div>
            <input type="number" id="telefono_fijo" name="telefono_fijo" placeholder="Telefono fijo" value="<?= set_value("telefono_fijo", @$telefono_fijo) ?>" class="form-control" min="0">
        </div>
    </div>
                                
    <div class="form-group">
        <div class="input-group">         
            <div class="input-group-addon">  
                <i class="fa fa-phone"></i>   
            </div>
            <input type="number" id="celular" name="celular" placeholder="Celular" value="<?= set_value("celular", @$celular) ?>" class="form-control" min="0">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">            
            <div class="input-group-addon">  
                <i class="fa fa-graduation-cap"></i> 
            </div>
            <select name="id_programa" id="id_programa" required="required" class="form-control" disabled>
                <option value="">Ingenier&iacute;a de Sistemas (Piloto)</option>
            </select>
        </div>
    </div>
    <div class="form-group text-center">
        <button id="btn_save" class="btn btn-small btn-success">
            <span class="glyphicon glyphicon-send">&nbsp;</span>Registrarme en SEPP UNIMINUTO
        </button>
    </div>
</div>