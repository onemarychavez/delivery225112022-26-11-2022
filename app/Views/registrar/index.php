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
    <div class="row justify-content-center">
        <div class="col-6 pt-4">
            <div class="card card-outline card-warning">
                <div class="card ">
                    <div class="card-body login-card-body">
                        <div class="text-center">
                            <img class="rounded" width="100" height="100" src="<?php echo base_url('dist/img/logo1.jpg') ?>" alt="Card image">
                        </div>
                        <h2 class="fw-bold text-center mt-2">Registro de usuarios</h2>
                        
                        <form action="#" >
                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" id="nombre"  />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label >Apellidos</label>
                                        <input type="text" class="form-control" id="apellido">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row p-0">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label >Dui</label>
                                                <input type="text" class="form-control" id="dui">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label >Nit</label>
                                                <input type="text" class="form-control" id="nit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label >Rol</label>
                                        <select class="form-control" id="rol"></select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" id="usuario"  />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="clave"  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <a type="button" id="btnRegresar" href="<?= base_url()?>" class="btn btn-success">Regresar</a>
                                <button type="button" id="btnCreate" class="btn btn-primary">Guardar</button>
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
    <script src="<?php echo base_url('dist/js/custom/registrar/index.js')?>"></script>
 
    <!-- AdminLTE App -->
    <!-- AdminLTE App -->
    
</body>
</html>