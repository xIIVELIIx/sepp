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
            <tr>
                <td class="text-info">Profesor asignado:</td>
                <td>
                    <?php if ($estudiante['id_estado'] == '2'): ?>
                        <?= @$profesor['nombre']." ".@$profesor['apellido'] ?>
                    <?php elseif($estudiante['id_estado'] == '4'): ?>
                        <?php $this->load->view("common/estudiantes/partes/asignar_docente", $profesoresList); ?>
                    <?php else: ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong><i class="icon fa fa-check"></i>&nbsp;Debe agregar una empresa para poder asignar un docente.</strong>
                        </div>
                    <?php endif; ?>
                
                </td>
            </tr>
        </table>
    </div>
</div>