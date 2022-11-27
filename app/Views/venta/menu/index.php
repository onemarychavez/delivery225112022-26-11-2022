<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OYE APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar bg-warning shadow">
        <div class="container-fluid">
            <a class="navbar-brand  text-white" href="#">
            <img src="<?php echo base_url('dist/img/logo1.jpg') ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                OYE APP
            </a>

            <button class="btn btn-warning"><i class="bi bi-cart3 text-bold text-white"></i></button>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-12">
                <h2 class="text-center text-warning">Menu</h2>
            </div>
        </div>
        <div class="row p-3" >
                <div class="col-12" id="categorias" >
                    
                </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Extras y Complementos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"  >
                <div class="row"id="extras"></div>
                <div class="row">
                    <div class="col-12 justify-content-md-center">
                            <h5 class="text-center">Cantidad</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-auto">
                                <button type="button" onclick="cantidades(-1)" class="btn btn-info" >-</button> 
                            </div>
                            <div class="col-auto">
                            <h3 id="cantidad"  class="text-bold text-center">0</h3>
                        
                            </div>
                            <div class="col-auto">
                            <button id="sumar" type="button" onclick="cantidades(1)"  class="btn btn-info" >+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Agregar</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <script src="<?php echo base_url('dist/js/custom/venta/menu.js') ?>"></script>
</body>
</html>