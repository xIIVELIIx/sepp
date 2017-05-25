<div id="menu1" class="tab-pane fade">
    <div class="col-md-8">
        
        <?php if($practica['id_empresa'] != 0): ?>
        
        <table class="table table-responsive">
            
            <tr>
                <td class="text-primary" colspan="2"><b>Datos de la Empresa</b></td>
            </tr>
            <tr>
                <td class="text-info">Nombre:</td><td><b><?= @$nombre ?></b></td>
            </tr>
            <tr>
                <td class="text-info">Tel&eacute;fono:</td><td><?= @$direccion ?></td>
            </tr>
            <tr>
                <td class="text-info">Direcci&oacute;n:</td><td><?= @$direccion.", ".@$ciudad ?></td>
            </tr>
            <tr>
                <td class="text-info">Cargo que ejerce el estudiante:</td><td><?= @$cargo_estudiante ?></td>
            </tr>
            <tr>
                <td class="text-primary" colspan="2"><b>Datos del Jefe del estudiante</td>
            </tr>
            <tr>
                <td class="text-info">Jefe inmediato:</td><td><?= @$nombre_jefe. ' ' . @$apellido_jefe ?></td>
            </tr>
            <tr>
                <td class="text-info">Cargo:</td><td><?= @$cargo_jefe ?></td>
            </tr>
            <tr>
                <td class="text-info">Tel&eacute;fono:</td><td><?= @$telefono_jefe ?></td>
            </tr>
            <tr>
                <td class="text-info">Celular :</td><td><?= @$celular_jefe ?></td>
            </tr>
            <tr>
                <td class="text-info">Email:</td><td><?= @$email_jefe ?></td>
            </tr>
        </table>
        
        <?php else: ?>
        <div class="col-md-12 text-center">
            <h3 class="text-danger">El estudiante a&uacute;n no tiene una empresa asignada.</h3>
            <?php if($this->session->userdata("id_rol_usuario") == ID_ROL_COORDINADOR): ?>
                <?php $this->load->view("common/estudiantes/partes/asignar_empresa", $empresasList); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>



