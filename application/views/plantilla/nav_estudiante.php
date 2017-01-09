<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Hola! <?= $this->session->userdata('nombre') ?></li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Mi Perfil</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("estudiante/datos") ?>"><i class="fa fa-list"></i> Mis datos personales</a></li>
                    <li><a href="<?= base_url("estudiante/perfil_profesional") ?>"><i class="glyphicon glyphicon-blackboard"></i> Mi perfil profesional</a></li>
                    <li><a href="<?= base_url("estudiante/cambiar_password") ?>"><i class="fa fa-key"></i> Cambiar mi contrase&ntilde;a</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>