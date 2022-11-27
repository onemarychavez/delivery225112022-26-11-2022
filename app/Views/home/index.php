<?= $this->extend('base/index') ?>


<?= $this->section('body') ?>
    <div class="row">
        <div class="col-4 col-xs-12">
            <div class="card shadow">
                
                <div class="card-body">
                <h5 class="card-title">Pedidos Nuevo</h5>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12">
            <div class="card shadow">
                
                <div class="card-body">
                    <h5 class="card-title">Pedidos Procesados</h5>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12">
            <div class="card shadow">
               
                <div class="card-body">
                <h5 class="card-title">Pedidos Completados</h5>
                </div>
            </div>
        </div>
    </div>
    
<?= $this->endSection() ?>


<?= $this->section('js') ?>
    
<?= $this->endSection() ?>
