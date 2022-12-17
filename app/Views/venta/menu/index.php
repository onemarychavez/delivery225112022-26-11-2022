<?= $this->extend('base/index') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
<div class="row pt-4">
            <div class="col-12">
                <h2 class="text-center text-warning">Menu</h2>
            </div>
        </div>
        <div class="row p-3" >
                <div class="col-12" id="categorias" >
                    
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
                <div class="row"id="extras">
                    <div class="col-12 text-center">
                        <h4 id="nombreProducto"></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 justify-content-md-center">
                            <h5 class="text-center">Cantidad</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-auto">
                                <button type="button" onclick="cantidades(-1)" class="btn btn-info" >-</button> 
                            </div>
                            <div class="col-auto">
                            <h3 id="cantidad"  class="text-bold text-center">1</h3>
                        
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
                <button type="button" class="btn btn-primary" id="btnAgregarPedido"  >Agregar</button>
            </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?php echo base_url('dist/js/custom/venta/menu.js') ?>"></script>
<?= $this->endSection() ?>

