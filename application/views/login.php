<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= base_url("dashboard/") ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url("dashboard/") ?>dist/css/AdminLTE.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo text-center">
                <a href="<?= base_url() ?>">
                    <img class="logo logo-block" src="<?= base_url() ?>images/logo.png" />
                </a>
                <h4 class="text-info text-center">
                    SEPP - Seguimiento a Estudiantes en Pr&aacute;cticas Profesionales
                </h4>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg text-center">
                    Ingresa con tus credeciales para iniciar sesión
                </p>
                <?= validation_errors('<div class="well alert-danger">', '</div>') ?>
                <?= form_open("user/login", "id='login' data-parsley-validate class='form-signin'") ?>
                <div class="form-group has-feedback">
                    <input type="text" id="username" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div><br>
                <?= form_close() ?>

                <a href="<?= base_url() ?>user/pass-recovery">Olvidé mi contraseña.</a><br>
                <a href="<?= base_url() ?>#aplicar" class="text-center">Registrate!</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    </body>
    
</html>
