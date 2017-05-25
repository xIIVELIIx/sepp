<div class="col-md-6 row-md">
    <div class="well">
        <h4>Comentario Personal</h4>
            
            <i class="fa fa-quote-left"></i>&nbsp;
            <span class="text-muted">
                <?= @$perfil_personalizado['comentario'] ?>
            </span>
            &nbsp;<i class="fa fa-quote-right"></i>
        <br />
        <br />
        <br />
        <h4>Hoja de Vida</h4>
        <?php if($estudiante['hoja_vida'] != ""): ?>
            <a class="btn btn-info" target="_blank" href="<?= @$estudiante['hoja_vida'] ?>">Ver Hoja de Vida</a>
        <?php else: ?>
            <p class="text-info">El estudiante a&uacute;n no ha subido su Hoja de Vida.</p>
        <?php endif; ?>
        
    </div>
</div>