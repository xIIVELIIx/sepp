<div class="col-md-6 ">
    <div class="well pre-scrollable">
        
        <h4>Aptitudes Profesionales</h4>
        <?php if(!empty($aptitud_profesional)): ?>
        <?php foreach ($aptitud_profesional as $key_categoria => $value) { ?>

            <h5 class="text-info"><?= $key_categoria ?></h5>

            <ul>
                
                <table class="table table-striped table-responsive">
                    <?php foreach ($value as $aptitudes) { ?>
                        <tr>
                            <td><b><?= $aptitudes->nombre ?>: </b><?= $aptitudes->descripcion ?></td>
                        </tr>

                    <?php } ?>
                </table>
            </ul>

        <?php } ?>
        <?php else: ?>
            <h5 class="text-info">El estudiante no ha seleccionado aptitudes profesionales en su perfil.</h5>
        <?php endif; ?>
    </div>
    
</div>