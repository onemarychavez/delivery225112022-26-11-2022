<?php

namespace App\Controllers;

use App\Models\PaisModel;
use CodeIgniter\HTTP\IncomingRequest;

class MunicipioController extends BaseController
{
    
    protected $request,$session,$pais;
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->pais = new PaisModel();
        
        
    }
    
    public function list(){
        try {
            $pais = $this->pais->where('activo',true)->findAll();
            if(count($pais)<0){
                return $this->response->setStatusCode(404,'NOT FOUND')
                ->setJSON(['message'=>'NO HAY PAISES']);
            }
            $rows = [];
            foreach($pais  as $pais){
                array_push($rows, [
                    'key'=>intval($pais['idpais']),
                    'nombre'=>$pais['nombre']
                ]);
            }
            return $this->response->setStatusCode(200,'OK')
            ->setJSON($rows);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    } 


    
   
}
