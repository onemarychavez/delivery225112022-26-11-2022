<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\MenuModel;
use App\Models\UsuariosModel;
use CodeIgniter\HTTP\IncomingRequest;

class MenuClienteController extends BaseController
{
    
   
    protected $request,$session;
    public function __construct(){
        $config = new \Config\Encryption();
        $config->key = getenv('encryption.key');
        $config->driver = getenv('encryption.driver');
        $config->blockSize = getenv('encryption.blockSize');
        $config->digest = getenv('encryption.digest');        
        $this->request = \Config\Services::request();
        $this->usuario = new UsuariosModel();
        $this->menu = new MenuModel();
        $this->categoria= new CategoriasModel();
        $this->encrypt = \Config\Services::encrypter($config);
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {   
        if(!$this->session->has('idusuarioapp')){
            return redirect()->to('');
        }
        return view('venta/menu/index');
    }

   
}
