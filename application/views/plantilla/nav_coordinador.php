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
                    <i class="glyphicon glyphicon-cog"></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("coordinador/estudiantes") ?>"><i class="fa fa-circle-o"></i> Estudiantes Pre-inscritos</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-book"></i> <span>Otra opción</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("coordinador/") ?>"><i class="fa fa-circle-o"></i> Otro menú </a></li>
                    <li><a href="<?= base_url("coordinador/") ?>"><i class="fa fa-circle-o"></i> Otro menú</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>