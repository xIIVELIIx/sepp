
<input type="hidden" id="id" name="id" value="<?= @$id ?>" >
<input type="hidden" id="id_practica" name="id_practica" value="<?= @$id_practica ?>" >
<div class="box-body">
    <div class="col-md-6">

        <div class="form-group">
            <label>Fecha<span class="required">*</span></label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </div>
                <input type="date" id="fecha" name="fecha" value="<?= set_value('fecha', @$fecha); ?>" class="form-control" required="required" >
            </div>
        </div>

        <div class="form-group">
            <label>Estado
            </label>
            <div class="input-group">         
                <div class="input-group-addon">  
                    <i class="fa fa-date"></i>   
                </div>
                <select name="estado_visita" id="estado_visita" class="form-control">
                    <option value="<?= set_value("estado_visita", @$estado_visita) ?>" selected><?= set_value("estado_visita", @$estado_visita) ?></option>
                    <option>agendada</option>
                    <option>realizada</option>
                    <option>cancelada</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Comentario
            </label>
            <div class="input-group">         
                <div class="input-group-addon"> 
                    <i class="fa fa-text"></i>       
                </div>
                <textarea id="comentario" name="comentario" class="form-control" > <?= set_value("comentario", @$comentario) ?> </textarea>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>item</th>
                    <th>Valoracion</th>
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