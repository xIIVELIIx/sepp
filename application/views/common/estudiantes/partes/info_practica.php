<div class="col-md-12">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Estado</a></li>
        <li><a data-toggle="tab" href="#menu1">Empresa</a></li>
        <li><a data-toggle="tab" href="#menu2">Historial de Pr&aactute;ctica</a></li>
        <li><a data-toggle="tab" href="#menu3">Seguimiento</a></li>
        <li><a data-toggle="tab" href="#menu4">Evaluaci&oacute;n</a></li>
    </ul>
    
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="col-md-8">
                <table class="table table-responsive">
                    <tr>
                        <td class="text-info">Estado:</td><td><?= @$estado ?></td>
                    </tr>
                    <tr>
                        <td class="text-info">Modalidad:</td><td><?= @modalidad_practica?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
        </div>
    </div>
</div>
