<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo" style="background-color:#fff;">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <img class="logo logo-mini" style="max-height:20px; margin-top:15px; background-color:#fff;" src="<?= base_url() ?>images/logo-mobile.png" />
                <!--<span class="logo-mini"><b>SE</b>PP</span>-->
                <!-- logo for regular state and mobile devices -->
                <img class="logo logo-lg" style="width:170px; height:38px; margin-top:5px; background-color:#fff;" src="<?= base_url() ?>images/logo.png" />
                <!--<span class="logo-lg"><b>SE</b>PP</span>-->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>dashboard/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->userdata('nombre') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->session->userdata('nombre')." ".$this->session->userdata('apellido') ?>
                                        <small><?= $this->session->userdata('email1') ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url() ?>user/edit" class="btn btn-default btn-flat">Editar Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url() ?>user/logout" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>