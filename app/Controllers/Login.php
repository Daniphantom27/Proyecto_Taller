<?php

namespace App\Controllers;

use App\Controllers\BaseController; 
use App\Models\UsuariosModel;
use CodeIgniter\Exceptions\AlertError;

class Login extends BaseController    
{    
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
    }
        public function index() 
        {            
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Daniel Sanchez']; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/login/login',$data);  
            
  //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }  
        
        public function inicio(){
            $usuario = $this->request->getPost('n_identidad');
            $password = $this->request->getPost('contraseña');
            $Usuario = new Usuarios();

            $datosUsuario = $Usuario->obtenerUsuario(['n_identidad'=>$usuario]);

            if(count($datosUsuario)> 0 && password_verify($password, $datosUsuario[0]['contraseña'])){

                $data = [
                    "n_identidad" => $datosUsuario[0]['n_identidad'],
                    "type" => $datosUsuario[0]['type']
                ];

                $session = session();
                $session->set($data);

                return redirect()->to(base_url('/principal'));

            }else{
                return redirect()->to(base_url('/login'));
            }
        }

        // 'contraseña' =>password_hash($this->request->getVar('contraseña'), PASSWORD_BCRYPT)

}