<?= $this->extend('base/index') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('body') ?>
<div class="row pt-4">
            <div class="col-12">
                <h3 class="text-center">Categorias</h3>
            </div>
        </div>
        <div class="row p-3" id="categorias">
                
        </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?php echo base_url('dist/js/custom/venta/categoria.js') ?>"></script>
<?= $this->endSection() ?>
