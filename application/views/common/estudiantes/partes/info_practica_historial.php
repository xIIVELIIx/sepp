<div id="menu2" class="tab-pane fade">
    <div class="col-md-6 col-md-offset-3 pre-scrollable">
        <?php foreach (@$novedades as $a) { ?>
        <h5 class="text-right text-primary"><?= $a->fecha ?></h5>
        <span class="text-right text-sm text-muted">por: <?= $a->nombre_usuario ?></span>
        <div class="well well-sm">
            <p class="text-default"><?= $a->comentario ?></p>
        </div>
        <?php } ?>
    </div>
</div>


