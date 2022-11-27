<?= $this->extend('base/index') ?>

<?= $this->section('body') ?>
    <div class="row">
        <div class="col-12">
            <h4>Usuarios</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <select class="form-control" id="empresa"></select>

                    </div>
                    <div class="col-6 align-items-end">
                    <Button type="button" id="btnNew" class="btn btn-success float-right" >Nuevo</Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card shadow">
            <div class="card-body responsive-table">
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Completo</th>
                            <th>Usuario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
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
                    
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" id="usuario"  />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="clave"  />
                            
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnCreate" class="btn btn-primary">Guardar</button>
                <button type="button" id="btnUpdate" class="btn btn-primary">Actualizar</button>
            </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="text-danger" >Advertencia!!</h3>
                        <p>Estas seguro de eliminar esta Sucursal?</p>
                    </div>
                </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
            </div>
            </div>
        </div>
    </div> 

<?= $this->endSection() ?>
   
<?= $this->section('js') ?>
    <script src="<?php echo base_url('dist/js/custom/usuario/index.js')?>"></script>
<?= $this->endSection() ?>
