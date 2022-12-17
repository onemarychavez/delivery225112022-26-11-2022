<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OYE APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css')?>">
    <?php $this->renderSection("css");?>
</head>
<body>
    <nav class="navbar bg-warning shadow">
        <div class="container-fluid">
            <a class="navbar-brand  text-white" href="#">
            <img src="<?php echo base_url('dist/img/logo1.jpg') ?>" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                OYE APP
            </a>
            
        </div>
        
    </nav>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-xxl-6 col-xl-6 col-md-8 col-sm-12 p-4">
                <div class="card shadow">
                    <div class="card-body">
                    <h5 class="card-title">Formulario de Registro</h5>
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text"  class="form-control" id="nombres">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text"  class="form-control" id="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text"  class="form-control" id="usuario">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="clave" class="form-label">Clave</label>
                                    <input type="password"  class="form-control" id="clave">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="number"  class="form-control" id="telefono">
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-12">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email"  class="form-control" id="correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Direccion</label>
                                    <textarea class="form-control" id="direccion" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-xxl-2 col-xl-2 col-sm-12 mt-2 mb-2">
                                <button type="button" id="btnguardar" class="btn btn-info"> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('plugins/toastr/toastr.min.js')?>"></script> 
    <script src="<?php echo base_url('dist/js/custom/venta/registrar.js') ?>"></script> 
</body>
</html>