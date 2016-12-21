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
                    <i class="fa fa-dashboard"></i> <span>Configuración Global</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?= base_url("admin/profesor") ?>"><i class="fa fa-circle-o"></i> Profesores </a></li>
                    <li><a href="<?= base_url("admin/carrera") ?>"><i class="fa fa-circle-o"></i> Carreras</a></li>
                    <li><a href="<?= base_url("admin/modalidad") ?>"><i class="fa fa-circle-o"></i> Modalidades de Práctica</a></li>
                    <li><a href="<?= base_url("admin/usuario") ?>"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>