<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\EmpresasModel;
use App\Models\PedidosDetalleModel;
use App\Models\PedidosModel;
use App\Models\SucursalesModel;
use App\Models\UsuariosModel;
use CodeIgniter\HTTP\IncomingRequest;

class PedidoController extends BaseController
{
    
    private $pedido,$pedidodetalle;
    protected $request,$session,$db;
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->pedido = new PedidosModel();
        $this->pedidodetalle = new PedidosDetalleModel();
        $this->db =  \Config\Database::connect();;
    }

    public function index(){
        if(!$this->session->has('idusuarioapp')){
            return redirect()->to('/login');
        }
        return view('venta/pedido/index');
    }
    
    
    public function list(){
        try {
            if(!$this->session->has('idusuarioapp')){
                return $this->response->setStatusCode(401,'NO session')
                    ->setJSON(['message'=>'no logueado']);
            }

            $pedidos = $this->pedido->where([
                'idusuarioapp'=>$this->session->get('idusuarioapp'),
                'activo'=>true,
                'estado'=>0
            ])->findAll();
            $pedidosdata=[];
            if(count($pedidos)>0){
                foreach($pedidos as $pedido){
                    $detallepedido= $this->pedidodetalle->select("pedidos_detalle.*,menu_detalle.nombre,menu_detalle.precio,menu_detalle.foto")
                    ->join("menu_detalle","pedidos_detalle.idmenudetalle=menu_detalle.idmenudetalle",'inner')
                    ->where([
                    'pedidos_detalle.idpedido'=>$pedido['idpedido'],
                    'pedidos_detalle.activo'=>true
                    ])->findAll();

                    $detalles =[];
                    foreach($detallepedido as $deta){
                        array_push($detalles,[
                            'KeyDetalle'=>$deta['idpedidodetalle'],
                            'KeyPedido'=>$deta['idpedido'],
                            'Nombre'=>$deta['nombre'],
                            'Precio'=>$deta['precio'],
                            'Imagen'=>$deta['foto'],
                            'Cantidad'=>$deta['cantidad'],
                            'Total'=>$deta['total']
                        ]);
                    } //obtenemos el detalle del pedido

                    array_push($pedidosdata,[
                        'KeyUsuario'=>$this->session->get('idusuarioapp'),
                        'Direccion'=>$this->session->get('direccion'),
                        'Telefono'=>$this->session->get('telefono'),
                        'Correo'=>$this->session->get('correo'),
                        'KeyPedido'=>$pedido['idpedido'],
                        'Fecha'=>$pedido['fecha'],
                        'Estado'=>$pedido['estado'],
                        'Subtotal'=>$pedido['subtotal'],
                        'Descuento'=>$pedido['descuento'],
                        'Total'=>$pedido['total'],
                        'Detalle'=>$detalles
                    ]);
                }
            }

            return $this->response->setStatusCode(200,'OK')
            ->setJSON($pedidosdata);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage(),'session'=>$this->session]);
        }
    }

    public function getPedido($idpedido){
        try {
            if(!$this->session->has('idusuarioapp')){
                return $this->response->setStatusCode(401,'NO session')
                    ->setJSON(['message'=>'no logueado']);
            }

            $pedido = $this->pedido->find($idpedido);
            if($pedido == null){
                return $this->response->setStatusCode(404,'NO FOUND')
                ->setJSON(['message'=>'no encontrado']);
            }
            $pedidosdata=[];
          
           
            $detallepedido= $this->pedidodetalle->select("pedidos_detalle.*,menu_detalle.nombre,menu_detalle.precio,menu_detalle.foto")
            ->join("menu_detalle","pedidos_detalle.idmenudetalle=menu_detalle.idmenudetalle",'inner')
            ->where([
            'pedidos_detalle.idpedido'=>$pedido['idpedido'],
            'pedidos_detalle.activo'=>true
            ])->findAll();

            $detalles =[];
            foreach($detallepedido as $deta){
                array_push($detalles,[
                    'KeyDetalle'=>$deta['idpedidodetalle'],
                    'KeyPedido'=>$deta['idpedido'],
                    'Nombre'=>$deta['nombre'],
                    'Precio'=>$deta['precio'],
                    'Imagen'=>$deta['foto'],
                    'Cantidad'=>$deta['cantidad'],
                    'Total'=>$deta['total']
                ]);
            } //obtenemos el detalle del pedido

            array_push($pedidosdata,[
                'KeyPedido'=>$pedido['idpedido'],
                'KeyEmpresa'=>$pedido['idempresa'],
                'Fecha'=>$pedido['fecha'],
                'Estado'=>$pedido['estado'],
                'Subtotal'=>$pedido['subtotal'],
                'Descuento'=>$pedido['descuento'],
                'Total'=>$pedido['total'],
                'Detalle'=>$detalles
            ]);
        
            

            return $this->response->setStatusCode(200,'OK')
            ->setJSON($pedidosdata);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function updatePedido($idpedido){
        try {
            if(!$this->session->has('idusuarioapp')){
                return $this->response->setStatusCode(401,'NO session')
                    ->setJSON(['message'=>'no logueado']);
            }
            $data = $this->request->getJSON(true);
            
            $this->pedido->update($idpedido,[
                'estado'=>$data['estado'],
                'direccion_entrega'=>trim($data['direccion']),
                'comentario'=>trim($data['comentario'])
            ]);
            

            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'actualizado']);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function createPedido(){
        try {
            $this->db->transStart();
            if(!$this->session->has('idusuarioapp')){
                return $this->response->setStatusCode(401,'NO session')
                    ->setJSON(['message'=>'no logueado']);
            }
            $data = $this->request->getJSON(true);
            
            $idpedido = $this->pedido->insert([
                'idusuarioapp'=>$this->session->get('idusuarioapp'),
                'estado'=>0,
                'direccion_entrega'=>$this->session->get('direccion'),
                'tipo_pago'=>'efectivo',
                'subtotal'=>$data['subtotal'],
                'descuento'=>$data['descuento'],
                'total'=>$data['total'],
                'idempresa'=>$data['idempresa'],
                'activo'=>true
            ]);

            foreach($data['detalle'] as $detalle){
                $this->pedidodetalle->insert([
                    'idpedido'=>$idpedido,
                    'idmenudetalle'=>$detalle['idmenudetalle'],
                    'cantidad'=>$detalle['cantidad'],
                    'total'=>$detalle['total'],
                    'activo'=>true
                ],false);
            }
            
            $this->db->transComplete();
            return $this->response->setStatusCode(201,'OK')
            ->setJSON(['message'=>$idpedido]);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }


    public function DeletePedido($idpedido){
        try {
            if(!$this->session->has('idusuarioapp')){
                return $this->response->setStatusCode(401,'NO session')
                    ->setJSON(['message'=>'no logueado']);
            }
            $data = $this->request->getJSON(true);
            
            $this->pedido->update($idpedido,[
                'activo'=>false            ]);
            

            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'actualizado']);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }
    
}
