<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery OYE!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css')?>">
</head>
<body class="hold-transition login-page" >
    <div class="row align-items-center">
        <div class="col-12 pt-4">
            <div class="card card-outline card-warning">
                <div class="card ">
                    <div class="card-body login-card-body">
                        <div class="text-center">
                            <img class="rounded" width="100" height="100" src="<?php echo base_url('dist/img/logo1.jpg') ?>" alt="Card image">
                        </div>
                        <h2 class="fw-bold text-center mt-2">Iniciar Sesi&oacute;n</h2>
                        <p class="login-box-msg">Hola! Bienvenido somos tu mejor opci&oacute;n</p>

                        <form action="#" >
                            <div class="input-group mb-3">
                                <input type="text" id="username" name="username"  class="form-control" placeholder="Usuario">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="button" id="btnlogin" class="btn btn-warning btn-block">Ingresar</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <a type="button" id="btnNew" href="<?= base_url()?>/registrar" class="btn btn-success btn-block">Registrarse</a>
                            </div>
                            </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                                <?php if(!empty($errores)){ echo "<div class='alert alert-danger' role='alert'>".$errores."</div>";}?>
                        </div>
                    <!-- /.login-card-body -->
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('plugins/toastr/toastr.min.js')?>"></script>
    <script src="<?php echo base_url('dist/js/custom/login/login.js')?>"></script>
    
    <!-- AdminLTE App -->
    <!-- AdminLTE App -->
    
</body>
</html>