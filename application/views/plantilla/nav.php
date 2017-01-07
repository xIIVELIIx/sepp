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
                    <i class="glyphicon glyphicon-cog"></i> <span>Configuración Global</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("admin/modalidad") ?>"><i class="fa fa-circle-o"></i> Modalidades de Pr&aacute;ctica</a></li>
                    <li><a href="<?= base_url("admin/empresa") ?>"><i class="fa fa-circle-o"></i> Empresas </a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-certificate"></i> <span>Aptitudes Profesionales</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("admin/categoria_aptitud") ?>"><i class="fa fa-circle-o"></i> Categor&iacute;as </a></li>
                    <li><a href="<?= base_url("admin/aptitud_profesional") ?>"><i class="fa fa-circle-o"></i> Aptitudes Profesionales </a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("admin/coordinador") ?>"><i class="fa fa-circle-o"></i> Coordinadores de P.P.</a></li>
                    <li><a href="<?= base_url("admin/profesor") ?>"><i class="fa fa-circle-o"></i> Profesores </a></li>
                    <li><a href="<?= base_url("admin/usuario_empresa") ?>"><i class="fa fa-circle-o"></i> Usuarios de Empresas </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>