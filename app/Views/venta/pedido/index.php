<?= $this->extend('base/index') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
<div class="row pt-4">
            <div class="col-12">
                <h2 class="text-center text-warning">Mis pedidos</h2>
            </div>
        </div>
        <div class="" id="lienzo" >
               
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Procesar Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"  >
               
                <div class="row">
                   <div class="col-12">
                    <div class="mb-3">
                        <label for="direccion">Direccion de Entrega</label>
                        <textarea  id="direccion" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Correo</label>
                        <input type="email" class="form-control" id="correo">
                    </div>
                    <div class="col-4">
                    <label for="">Telefono</label>
                        <input type="number" class="form-control" id="telefono">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Forma de Pago</label>
                        <input type="text" class="form-control" id="forma">
                    </div>
                    <div class="col-6 pt-4">
                        <h4 id="ttotal"></h4>
                    </div>
                </div>
                <div class="row">
                   <div class="col-12">
                    <div class="mb-3">
                        <label for="direccion">Comentario</label>
                        <textarea  id="comentario" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                   </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btnProcesarPedido"  class="btn btn-primary">Procesar</button>
            </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?php echo base_url('dist/js/custom/venta/pedido.js') ?>"></script>
<?= $this->endSection() ?>

