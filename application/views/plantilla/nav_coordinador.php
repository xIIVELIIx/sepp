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
                    <i class="glyphicon glyphicon-info-sign"></i> <span>Informaci&oacute;n</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("coordinador/estudiantes") ?>"><i class="fa fa-users"></i> Estudiantes</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-stats"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("coordinador/reportes/practicas_profesionales") ?>"><i class="fa fa-list"></i> Pr&aacute;cticas profesionales</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>