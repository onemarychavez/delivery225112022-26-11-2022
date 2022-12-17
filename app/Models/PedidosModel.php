<?php
namespace App\Models;

use CodeIgniter\Model;

class PedidosModel extends Model{
    protected $table = "pedidos";
    protected $primaryKey = "idpedido";
    protected $returnType = "array";
    protected $allowedFields = [
        'fecha',
        'idusuarioapp',
        'idempresa',
        'estado',
        'estado',
        'direccion_entrega',
        'tipo_pago',
        'subtotal',
        'descuento',
        'comentario',
        'total',
        'activo'
    ];
    protected $skipValidation = true;
}