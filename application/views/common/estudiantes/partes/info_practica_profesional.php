
<div class="row">
    <div class="col-md-10">
        <?= show_notification(); ?>
    </div>
    <div class="col-md-2 text-center">
        <a href="<?= base_url()."profesor/visita/add/".$practica['id']; ?>">
            <button id="back" class="btn btn-small btn-success"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Nueva Visita</button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-body">
                <h4>Modalidad</h4>
                <p><?= $nombre ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-body">
                <h4>Visitas</h4>
                <p><?= $numero_visitas ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-body">
                <h4>Estado</h4>
                <p><?= $estado_practica ?></p>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Comentario</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?= $visitas ?>
    </tbody>
</table>