<?php

namespace App\Controllers;

use App\Models\PedidosDetalleModel;
use App\Models\PedidosModel;
use Config\Database;

class PedidoDetalleController extends BaseController
{
    protected $request,$session,$db;
    private $detalle,$pedido;
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->detalle = new PedidosDetalleModel();
        $this->pedido = new PedidosModel();
        $this->db = Database::connect();
    }

    public function create(){
        try {
            $detalle = $this->request->getJSON(true);
            $this->db->transBegin();
            $idpedido=$detalle['idpedido'];
            $existe = $this->detalle->where([
                'idpedido'=>$detalle['idpedido'],
                'idmenudetalle'=>$detalle['idmenudetalle'],
            ])->first();
            $id=0;
            if($existe != null){
                $this->detalle->update($existe['idpedidodetalle'],[
                    'cantidad'=>(intval($existe['cantidad'])+intval($detalle['cantidad'])),
                    'total'=>(floatval($detalle['total'])+floatval($existe['total'])),
                ]);
                $id= $existe['dpedidodetalle'];
            } else{
                $id = $this->detalle->insert([
                    'idpedido'=>$detalle['idpedido'],
                    'idmenudetalle'=>$detalle['idmenudetalle'],
                    'cantidad'=>$detalle['cantidad'],
                    'total'=>$detalle['total'],
                    'activo'=>true
                ]);
            } 
           
            $total= $this->detalle->selectSum('total')
            ->where([
                'activo'=>true,
                'idpedido'=>$idpedido
            ])->first();
            
            $this->pedido->update($idpedido,[
                'total'=>$total,
                'subtotal'=>$total,
            ]);
            $this->db->transCommit();
            return $this->response->setStatusCode(201,'OK')
            ->setJSON(['message'=>$id]);
        } catch (\Throwable $th) {
            $this->db->transRollback();
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }


    public function update($id){
        try {
            $existe = $this->detalle->find($id);
            if($existe == null){
                return $this->response->setStatusCode(404,'NOT found')
                ->setJSON(['message'=>'no existe el detalle del pedido']);
            }
            $detalle = $this->request->getJSON(true);
            $idpedido=$detalle['idpedido'];
            $this->db->transBegin();
            $id = $this->detalle->update($id,[
                'idpedido'=>$detalle['idpedido'],
                'idmenudetalle'=>$detalle['idmenudetalle'],
                'cantidad'=>$detalle['cantidad'],
                'total'=>$detalle['total'],
                'activo'=>true
            ]);
            $total= $this->detalle->selectSum('total')
            ->where([
                'activo'=>true,
                'idpedido'=>$idpedido
            ])->first();
            
            $this->pedido->update($idpedido,[
                'total'=>$total,
                'subtotal'=>$total,
            ]);
            $this->db->transCommit();
            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'Detalle Actualizado']);

        } catch (\Throwable $th) {
            $this->db->transRollback();
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function delete($id){
        try {
            $existe = $this->detalle->find($id);
            if($existe == null){
                return $this->response->setStatusCode(404,'NOT found')
                ->setJSON(['message'=>'no existe el detalle del pedido']);
            }
           
            $id = $this->detalle->update($id,[
                'activo'=>false
            ]);
            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'Detalle Eliminado']);

        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }
}