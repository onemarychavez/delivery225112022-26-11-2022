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
               
                <?php if(isset($_SESSION['usuario'])){ ?>
                 
     
                  <div class="btn-group dropstart">
          <a class="nav-link dropdown-toggle dropstart text-white " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['usuario']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" id="pedido" href="<?php echo base_url('pedido') ?>">mis Pedidos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('') ?> ">Salir</a></li>
          </ul>
                </div>
      
    
                 
                <?php }else{ ?>
                    <a href="<?php echo base_url('login') ?>" class="text-white text-bold">
                        <i class="bi bi-person-fill"></i> Iniciar Sesion
                    </a>
                    <?php } ?>

            </a>
            
        </div>
        
    </nav>
    <div class="container-fluid">
    <?php $this->renderSection("body");?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>  
    <script src="<?php echo base_url('plugins/toastr/toastr.min.js')?>"></script>  
    <?php $this->renderSection("js");?>
</body>
</html>