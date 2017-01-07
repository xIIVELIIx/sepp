
<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>C&eacute;dula</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <p><?= set_value('cedula', @$cedula); ?> </p>
            </div>
        </div>
        <div class="form-group">
            <label>Nombres</label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="fa fa-user"></i>    
                </div>
                <p><?= set_value("nombre",@$nombre) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Apellidos</label>
            <div class="input-group">
                <div class="input-group-addon"> 
                    <i class="fa fa-user"></i> 
                </div>
                <p><?= set_value("apellido",@$apellido) ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">           
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </div>
                <p><?= set_value("email1",@$email1) ?></p>
            </div>
        </div>

    </div> <!-- col-md-6 -->

    <div class="col-md-6">

        <div class="form-group">
            <label>Email 2 (opcional)</label>
            <div class="input-group">         
                <div class="input-group-addon">      
                    <i class="fa fa-envelope"></i>   
                </div>
                <p><?= set_value("email2",@$email2) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Tel&eacute;fono Fijo</label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-phone"></i>       
                </div>
                <p><?= set_value("telefono_fijo",@$telefono_fijo) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Celular</label>
            <div class="input-group">         
                <div class="input-group-addon">  
                    <i class="fa fa-phone"></i>   
                </div>
                <p><?= set_value("celular",@$celular) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Empresa</label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-institution"></i>              
                </div>
                <p><?= set_value("empresa",@$empresa) ?></p>
            </div>
        </div>

    </div>
</div><!-- /.box-body -->
