<div id="menu3" class="tab-pane fade">
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
        <div class="col-md-12">

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


        </div>
    </div>
    
</div>