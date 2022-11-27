<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\HTTP\IncomingRequest;

class UsuariosController extends BaseController
{
    
    private $usuario,$encrypt;
    protected $request,$session;
    public function __construct(){
        $config = new \Config\Encryption();
        $config->key = getenv('encryption.key');
        $config->driver = getenv('encryption.driver');
        $config->blockSize = getenv('encryption.blockSize');
        $config->digest = getenv('encryption.digest');        
        $this->request = \Config\Services::request();
        $this->usuario = new UsuariosModel();
        $this->encrypt = \Config\Services::encrypter($config);
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {   
        if(!$this->session->has('usuario')){
            return redirect()->to('');
        }
        return view('usuario/index');
    }

    public function list(){
        try {
            $usuarios = $this->usuario->where([
                'activo'=>true
            ])->findAll();
            if(count($usuarios)<=0){
                return $this->response->setStatusCode(404,'not found')
                ->setJSON(['message'=>'USUARIOS NO ENCONTRADOS']);
            }
            $users = [];
            foreach($usuarios as $row){
                array_push($users,[
                    'key'=>intval($row['idusuario']),
                    'nombres'=>$row['nombres'],
                    'apellidos'=>$row['apellidos'],
                    'dui'=>$row['dui'],
                    'nit'=>$row['nit'],
                    'usuario'=>$row['usuario'],
                    'rol'=>intval($row['idrol'])
                ]);
            }
            return $this->response->setStatusCode(200,'OK')
            ->setJSON($users);


        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function listById($id){
        try {
            $usuarios = $this->usuario->find($id);
            if($usuarios==null){
                return $this->response->setStatusCode(404,'not found')
                ->setJSON(['message'=>'USUARIO NO ENCONTRADOS']);
            }
        
    
              $users= [
                    'key'=>intval($usuarios['idusuario']),
                    'nombres'=>$usuarios['nombres'],
                    'apellidos'=>$usuarios['apellidos'],
                    'dui'=>$usuarios['dui'],
                    'nit'=>$usuarios['nit'],
                    'usuario'=>$usuarios['usuario'],
                    'password'=>$this->encrypt->decrypt(base64_decode(trim($usuarios['clave']))),
                    'rol'=>intval($usuarios['idrol'])
                ];
            
            return $this->response->setStatusCode(200,'OK')
            ->setJSON($users);


        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }


    public function create(){
        try {
            $obligatorios = ['nombres','apellidos','dui','nit','usuario','clave','rol'];
            $datos = $this->request->getJSON(true);
            $error = false;
            foreach($obligatorios as $camp){
                if(!isset($datos[$camp])){
                    $error = true;
                    break;
                }
            }//VALIDA LOS CAMPOS OBLIGATORIOS
            if($error){
                return $this->response->setStatusCode(400,'Client Error')
                ->setJSON(['message'=>'CAMPOS INVALIDOS']);
            }

            $userNameRepit = $this->usuario->where(['usuario'=>trim($datos['usuario'])])->findAll();
            if(count($userNameRepit)>0){
                return $this->response->setStatusCode(400,'Client Error')
                ->setJSON(['message'=>'NOMBRE DE USUARIO NO DISPONIBLE']);
            }

            $newUsuario = [
                'nombres'=> trim($datos['nombres']),
                'apellidos'=> trim($datos['apellidos']),
                'dui'=>trim($datos['dui']),
                'nit'=>trim($datos['nit']),
                'usuario'=>trim($datos['usuario']),
                'clave'=>base64_encode($this->encrypt->encrypt(trim($datos['clave']))),
                'idrol'=> $datos['rol']
            ];

            $iduser = $this->usuario->insert($newUsuario);
            return $this->response->setStatusCode(201,'CREATED')
            ->setJSON(['userKey'=>$iduser]);
            
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function update($idusario){
        try {
            $datos = $this->request->getJSON(true);
            $existe = $this->usuario->find($idusario);
            if($existe == null){
                return $this->response->setStatusCode(404,'not found')
                ->setJSON(['message'=>'USUARIO NO EXISTE']);
            }
            $obligatorios = ['nombres','apellidos','dui','nit','usuario','clave','rol'];
            $error = false;
            foreach($obligatorios as $camp){
                if(!isset($datos[$camp])){
                    $error = true;
                    break;
                }
            }//VALIDA LOS CAMPOS OBLIGATORIOS
            if($error){
                return $this->response->setStatusCode(400,'Client Error')
                ->setJSON(['message'=>'CAMPOS INVALIDOS']);
            } 

            $userNameRepit = $this->usuario->where(['usuario'=>trim($datos['usuario'])])->findAll();
            if(count($userNameRepit)>0){
                return $this->response->setStatusCode(400,'Client Error')
                ->setJSON(['message'=>'NOMBRE DE USUARIO NO DISPONIBLE']);
            } 
            $newUsuario = [
                'nombres'=> trim($datos['nombres']),
                'apellidos'=> trim($datos['apellidos']),
                'dui'=>trim($datos['dui']),
                'nit'=>trim($datos['nit']),
                'usuario'=>trim($datos['usuario']),
                'clave'=> $this->encrypt->encrypt(trim($datos['clave'])),
                'idrol'=> $datos['rol']
            ];
            $this->usuario->update($idusario,$newUsuario);
            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'USUARIO ACTUALIZADO']);


        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }

    public function delete($idusuario){
        try {
            $existe = $this->usuario->find($idusuario);
            if($existe == null)
            {
                return $this->response->setStatusCode(404,'not found')
                ->setJSON(['message'=>'USUARIO NO EXISTE']);
            }
            $this->usuario->update($idusuario,[
                'activo'=>false
            ]);
            return $this->response->setStatusCode(200,'OK')
            ->setJSON(['message'=>'USUARIO ELIMINADO']);
        } catch (\Throwable $th) {
            return $this->response->setStatusCode(500,'internal server')
            ->setJSON(['message'=>$th->getMessage()]);
        }
    }
}
