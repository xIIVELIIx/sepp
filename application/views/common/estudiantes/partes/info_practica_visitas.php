<div id="menu3" class="tab-pane fade">
    <div class="row">
        <div class="col-md-8">
            
        <table class="table table-responsive">
            <tr>
                <td class="text-info">Modalidad de Pr&aacute;ctica Profesional:</td>
                <td><b><?= @$practica['modalidad_practica']?></b></td>
            </tr>
            <tr>
                <td class="text-info">Visitas de seguimiento realizadas:</td><td><b><?= @$visitas_realizadas ?></b> de <b><?= @$modalidad['numero_visitas'] ?></b> requeridas.</td>
            </tr>
            <tr>
                <td class="text-info">Profesor asignado:</td>
                <td>
                    <?php if ($estudiante['id_estado'] == '2'): ?>
                        <?= @$profesor['nombre']." ".@$profesor['apellido'] ?>
                    <?php else: ?>
                        <?php $this->load->view("common/estudiantes/partes/asignar_docente", $profesoresList); ?>
                    <?php endif; ?>
                
                </td>
            </tr>
        </table>
        </div>
        <?php if ($estudiante['id_estado'] == '2'): ?>
        <div class="col-md-12">
            <h3>Registro de Visitas</h3>
            <div class="col-sm-12 text-right">
                <?php if($this->session->userdata("id_rol_usuario") == ID_ROL_PROFESOR): ?>
                <a href="<?= base_url()."profesor/visita/add/".$practica['id']; ?>">
                    <button id="back" class="btn btn-small btn-success"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Nueva Visita</button>
                </a>
                <br/>
                <?php endif; ?>
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
        <?php endif; ?>

        </div>
    </div>
    
</div>