<!-- Modal -->
<div class="modal fade" id="preinscripcion_confirmation_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div class="row" align="center">
                    <h2>&iexcl;Bienvenido a tu Pr&aacute;ctica profesional, <?= $this->session->userdata('nombre') ?>!</h2>
                    <div class="form-group text-justify">
                        <p>
                            Has completado el proceso de preinscripci&oacute;n de tu pr&aacute;ctica profesional para el periodo 2017-1 
                            de manera satisfactoria. 
                        </p>
                        <h4>&iquest;Qu&eacute; sigue?</h4>
                        <p>
                            Tu facultad y Centro Progresa se encargar&aacute;n de los tr&aacute;mites correspondientes para certificar 
                            el v&iacute;nculo laboral con la empresa en la que ejercer&aacute;s la pr&aacute;ctica. 
                            Puedes estar atento al panel de notificaciones y a tu correo electr&oacute;nico, en donde ser&aacute;s notificado cuando 
                            &eacute;ste v&iacute;nculo sea formalizado.
                        </p>
                        <p class="text-info">
                            &excl;&Eacute;xitos en tu pr&aacute;ctica profesional!
                        </p>
                    </div>
                    <div class="form-group text-center">
                        <button onclick="location.href='<?= base_url() ?>user/home'" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up">&nbsp</span>Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>