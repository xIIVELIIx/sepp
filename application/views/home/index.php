<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pr&aacute;cticas Profesionales UNIMINUTO - Corporaci&oacute;n Universitaria Minuto de Dios</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#"><img class="logo logo-mini" src="<?= base_url() ?>images/logo.png" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#acerca">&iquest;Por qu&eacute; SEPP?</a>
                    </li>
                    <li>
                        <a href="#ventajas">Ventajas</a>
                    </li>
                    <li>
                        <a href="#quien">&iquest;Qu&iacute;enes  aplicar?</a>
                    </li>
                    <li>
                        <a href="#aplicar">Reg&iacute;strate</a>
                    </li>
                    <li>
                        <button onclick="location.href='user/login'" class="btn btn-info btn-menu-login"><span class="glyphicon glyphicon-user">&nbsp</span>Iniciar Sesi&oacute;n</button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <div class="intro-header">
        <div class="container" style="background-color: rgb(0,0,0,0.3);">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Perfila tu carrera profesional desde la Univesidad</h1>
                        <h3>El proyecto SEPP de UNIMINUTO te ayuda a darle el rumbo que quieres a tu vida profesional.</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#aplicar" class="btn btn-success btn-lg"><span class="network-name">&iexcl;Aplica ya!</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <a name="acerca"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">&iquest;Por qu&eacute; SEPP?</h2>
                    <p class="lead">
                        La Pr&aacute;ctica Profesional es una iniciativa valiosa mediante la cual UNIMINUTO ayuda a sus estudiantes
                        a iniciarse en el mundo laboral y poder llevar los conocimientos adquiridos de la Academia a la vida pr&aacute;ctica.
                    </p>
                    <p class="lead">
                        El proyecto de <b>Seguimiento a Estudiantes en Pr&aacute;ctica Profesional (SEPP)</b> de UNIMINUTO busca facilitar el proceso de inscripci&oacute;n, formalizaci&oacute;n y 
                        seguimiento de las pr&aacute;cticas profesionales a los practicantes que representan la Universidad en diferentes
                        empresas del pa&iacute;s.
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive img-section" src="<?= base_url() ?>images/sepp.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    <a name="ventajas"></a>
    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">El primer beneficiado eres tu...</h2>
                    <p class="lead">
                        <ul class="lead">
                            <li class='custom_list'>Haces la preinscripci&oacute;n de tu pr&aacute;ctica profesional en solo dos pasos.</li>
                            <li class='custom_list'>Crea tu propio perfil profesional de acuerdo a tus afinidades t&eacute;cnicas y acad&eacute;micas.</li>
                            <li class='custom_list'>Las empresas en convenio con UNIMINUTO podr&aacute;n ver tu perfil profesional.</li>
                            <li class='custom_list'>Te ayudamos a que realices tu pr&aacute;ctica profesional haciendo lo que te gusta, no lo que te toque.</li>
                            <li class='custom_list'>La Universidad podr&aacute; hacer un mejor seguimiento de tu pr&aacute;ctica para atender cualquier novedad 
                            o inquietud que tengas en el momento oportuno.</li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive img-section" src="<?= base_url() ?>images/students.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    <a  name="quien"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Un piloto capaz de expanderse a nivel nacional... </h2>
                    <p class="lead">
                        En el piloto inicial, solo los estudiantes de &uacute;ltimos semestres de Ingenier&iacute;a de Sistemas de la sede principal de Bogot&aacute;
                        podr&aacute;n acceder al programa SEPP. Pero el proyecto tiene el potencial de expandirse a los dem&aacute;s programas y 
                        facultades no solo de Bogot&aacute;, sino de toda la red educacional de UNIMINUTO en el pa&iacute;s.
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive img-section" src="<?= base_url() ?>images/sedes.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="aplicar"></a>
    <div class="banner-footer">

        <div class="container">

            <div class="row">
                    
                

                <?= form_open("home/register") ?>
                <div class="col-lg-6">
                    
                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong>
                    </div>') ?>
                    <?php $this->load->view("home/partes/form_registro_estudiante"); ?>
                    
                    
                </div>
                <?= form_close() ?>
                
                </form>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><span class='glyphicon glyphicon-arrow-up'>&nbsp;</span><b>Volver Arriba</b></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#acerca">&iquest;Por qu&eacute; SEPP?</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#ventajas">Ventajas</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#quien">&iquest;Qu&iacute;enes pueden aplicar?</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url() ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>

</body>

</html>
