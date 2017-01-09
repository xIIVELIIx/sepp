<ul>
    <?php foreach ($aptitud_profesional as $value): ?>
        <li><a href="#aptitud<?= $value->id ?>" data-toggle="collapse"><?= $value->categoria ?></a></li><br>
        <div id="aptitud<?= $value->id ?>" class="collapse">
            <ul>
                <li><strong>Nombre: </strong><?= $value->nombre ?><br></li>
                <li><strong>Descripci&oacute;n: </strong><?= $value->descripcion ?></li>
            </ul>
        </div><br>
    <?php endforeach; ?>
</ul>