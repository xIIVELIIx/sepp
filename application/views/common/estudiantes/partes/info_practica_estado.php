<div id="home" class="tab-pane fade in active">
    <div class="col-md-8">
        <table class="table table-responsive">
            <tr>
                <td class="text-info">Estado:</td>
                <td><h4><b><?= strtoupper(@$practica['estado']) ?></b></h4><span class="text-muted"><?= @$practica['estado_usuario'] ?></span></td>
            </tr>
            <tr>
                <td class="text-info">Modalidad:</td><td><?= @$practica['modalidad_practica']?></td>
            </tr>
            <tr>
                <td class="text-info">Visitas de seguimiento requeridas:</td><td><?= @$modalidad['numero_visitas'] ?></td>
            </tr>
        </table>
    </div>
</div>