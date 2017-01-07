
<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            <label>NIT</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <p><?= set_value('nit', @$nit); ?> </p>
            </div>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <div class="input-group">   
                <div class="input-group-addon">  
                    <i class="fa fa-user"></i>    
                </div>
                <p><?= set_value("nombre",@$nombre) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Tel&eacute;fono</label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-phone"></i>       
                </div>
                <p><?= set_value("telefono",@$telefono) ?></p>
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
            <label>Direcci&oacute;</label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-home"></i>              
                </div>
                <p><?= set_value("empresa",@$empresa) ?></p>
            </div>
        </div>
        
        <div class="form-group">
            <label>Ciudad</label>
            <div class="input-group">        
                <div class="input-group-addon">                
                    <i class="fa fa-map-marker"></i>              
                </div>
                <p><?= set_value("ciudad",$ciudad) ?></p>
            </div>
        </div>

    </div>
</div><!-- /.box-body -->
