<?php

namespace App\Controllers;

use App\Models\DepartamentosModel;
use App\Models\PaisModel;
use CodeIgniter\HTTP\IncomingRequest;

class RolesController extends BaseController
{
    
    protected $request,$session,$departamento,$pais;
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->pais = new PaisModel();
        $this->departamento = new DepartamentosModel();
        
    }
    
 
   

    public function list(){
        try {
            $departamentos = $this->departamento->where('activo',true)->findAll();
            if(count($departamentos)<0){
                return $this->response->setStatusCode(404,'NOT FOUND')
                ->setJSON(['message'=>'NO HAY DEPARTAMENTOS']);
            }
            $rows = [];
            foreach($departamentos  as $departamento){
                array_push($rows, [
                    'key'=>intval($departamento['iddepartamento']),
                    'nombre'=>$departamento['nombre']
                ]);
            }
            return $this->response->setStatusCode(200,'OK')
            ->setJSON($rows);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    } 

    private function getPais($departamento){
        $categorias = $this->categoriaEmpresa->where([
            'activo'=>true,
            'idempresa'=>$departamento
        ])->findAll();

        $cate = [];
        foreach($categorias as $row){
            array_push($cate,$row['idcategoria']);
        }
        return $cate;
    }

    public function listById($iddepartamento){
        try {
            $rol = $this->rol->find($iddepartamento);
            if($rol== null){
                return $this->response->setStatusCode(404,'NOT FOUND')
                ->setJSON(['message'=>'NO SE ENCONTRO EL ROL']);
            }
            
            $row=[
                'key'=>intval($rol['iddepartamento']),
                'nombre'=>$rol['nombre'],
                'pais'=>$this->getPais($iddepartamento)
            ];
            
            return $this->response->setStatusCode(200,'OK')
            ->setJSON($row);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    
   
}
