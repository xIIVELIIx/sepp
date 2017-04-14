
<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<div class="box-body">
    <div class="col-md-6">

        <div class="form-group">
            <label>Nombre</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <p><?= set_value('nombre', @$nombre); ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Tel&eacute;fono
            </label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-phone"></i>       
                </div>
                <p><?= set_value("telefono", @$telefono) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Celular
            </label>
            <div class="input-group">         
                <div class="input-group-addon">  
                    <i class="fa fa-phone"></i>   
                </div>
                <p><?= set_value("celular", @$celular) ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Jefe Inmediato</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <p><?= set_value('nombre_jefe', @$nombre_jefe. ' ' . @$apellido_jefe); ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Email Jefe</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <p><?= set_value('email_jefe', @$email_jefe); ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Cargo Jefe</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <p><?= set_value('cargo_jefe', @$cargo_jefe); ?></p>
            </div>
        </div>

    </div> <!-- col-md-6 -->

    <div class="col-md-6">

        <div class="form-group">
            <label>Direcci&oacute;n
            </label>
            <div class="input-group">         
                <div class="input-group-addon">      
                    <i class="fa fa-building"></i>   
                </div>
                <p><?= set_value("direccion", @$direccion) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Ciudad
            </label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-institution"></i>              
                </div>
                <p><?= set_value("direccion", @$ciudad) ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Cargo Practicante</label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-briefcase"></i>              
                </div>
                <p><?= set_value("cargo", @$cargo_practicante) ?></p>
            </div>
        </div>
        
         <div class="form-group">
             <label>Tel&eacute;fono Jefe</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <p><?= set_value('telefono_jefe', @$telefono_jefe); ?></p>
            </div>
        </div>
        
         <div class="form-group">
             <label>Celular Jefe</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <p><?= set_value('celular_jefe', @$celular_jefe); ?></p>
            </div>
        </div>
        
         <div class="form-group">
             <label>Direcci&oacute;n</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <p><?= set_value('direccion_practica', @$direccion_practica); ?></p>
            </div>
        </div>
        
    </div>
   
</div><!-- /.box-body -->
