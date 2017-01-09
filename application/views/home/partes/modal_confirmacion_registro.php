
<!-- Modal -->
<div class="modal fade" id="confirm_registration_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <div class="row" align="center">
                    <h3>&iexcl;Bienvenid@, <?= $nombre ?>!</h3>
                    <p>En instantes recibir&aacute;s un mensaje en tu e-mail <?= $email1 ?> con un 
                        <span class="text-info">link de activaci&oacute;n</span> para confirmar tu identidad y generar tus credenciales de acceso.
                       
                        </p>
                    <div class="form-group">
                        <button id="btn_close" class="btn btn-info"><span class="glyphicon glyphicon-check">&nbsp</span>Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btn_close').click(function() {
        $('#confirm_registration_modal').modal('hide');
        $("input").val("");
    });

</script>
