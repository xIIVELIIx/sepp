<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/estilos.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/datatables.min.css">
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h2 class="brand brand-name navbar-left">
                    <a href="<?= base_url()."/index.php/user/home" ?>">
                        <img class="logo" src="<?= base_url(); ?>images/logo.png">
                        <span class="text-primary">SEPP</span> - Seguimiento a Estudiantes en Pr&aacute;cticas Profesionales
                    </a>
                </h2>
            </div>
            
            <?php if($this->user_model->isLoggedIn()) { ?>
                
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span>Configuraci&oacute;n Global</span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url()."/index.php/admin/profesor" ?>">Profesores</a></li>
                            <li><a href="<?= base_url()."/index.php" ?>">Carreras</a></li>
                            <li><a href="<?= base_url()."/index.php" ?>">Modalidades de Pr&aacute;ctica</a></li>
                            <li><a href="<?= base_url()."/index.php" ?>">Usuarios</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span> <span class="text-info">hola, Administrador</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url()."/index.php/user/logout" ?>"><span class="glyphicon glyphicon-off text-danger" aria-hidden="true"></span>  Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <?php } ?>
        </div>
    </nav>