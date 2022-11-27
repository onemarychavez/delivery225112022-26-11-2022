<?php
namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model{
    protected $table = "roles";
    protected $primaryKey = "idrol";
    protected $returnType = "array";
    protected $allowedFields = [
        'rol',
        'idpermiso',
        'activo'
    ];
    protected $skipValidation = true;
}