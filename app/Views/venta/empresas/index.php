<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OYE APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar bg-warning shadow">
        <div class="container-fluid">
            <a class="navbar-brand  text-white" href="#">
            <img src="<?php echo base_url('dist/img/logo1.jpg') ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                OYE APP
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-12">
                <h3 class="text-center">Restaurantes</h3>
            </div>
        </div>
        <div class="row p-3" id="categorias">
                
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('dist/js/custom/venta/restaurante.js') ?>"></script>
</body>
</html>