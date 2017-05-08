<div class="col-md-6 ">
    <div class="well pre-scrollable">
        
        <h4>Aptitudes Profesionales</h4>

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
    </div>
    
</div>