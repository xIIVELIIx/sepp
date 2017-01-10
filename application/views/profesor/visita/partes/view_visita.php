
<div class="box-body">
    <div class="col-md-8">
        <input type="hidden" id="id_visita" name="id_visita" value="<?= @$id ?>" >
        
        <div class="form-group">
            <label>Fecha</label>
            <div class="input-group">           
                <div class="input-group-addon">    
                    <i class="fa fa-calendar"></i>    
                </div>
                <p><?= set_value("fecha",@$fecha) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <div class="input-group">           
                <div class="input-group-addon">    
                    <i class="fa fa-bookmark"></i>    
                </div>
                <p><?= set_value("estado_visita",@$estado_visita) ?></p>
            </div>
        </div>

        <div class="form-group">
            <label>Comentario</label>
            <div class="input-group">           
                <div class="input-group-addon">    
                    <i class="fa fa-comment"></i>    
                </div>
                <p><?= set_value("comentario",@$comentario) ?></p>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>item</th>
                    <th>Posibles Valores</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                <?= $items ?>
            </tbody>
        </table>

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button id="btn_save" class="btn btn-small btn-success">
                    <span class="glyphicon glyphicon-save">&nbsp;</span>Guardar
                </button>
            </div>
        </div>

    </div> <!-- col-md-6 -->

    <div class="col-md-6">

    </div>
</div><!-- /.box-body -->
