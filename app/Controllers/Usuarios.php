<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\UsuariosModel;
use CodeIgniter\Exceptions\AlertError;

class Usuarios extends BaseController
{
    protected $usuarios;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
    }
    public function index()
    {
        $usuarios = $this->usuarios->where('estado', "A")->obtenerUsuarios();
        $data = ['titulo' => 'Proyecto Taller', 'nombre' => 'Daniel Sanchez', 'usuarios' => $usuarios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/usuarios/usuarios', $data);

        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }


    public function buscar_Usuarios($id)
    {
        $returnData = array();
        $usuarios_ = $this->usuarios->traer_usuarios($id);
        if (!empty($usuarios_)) {
            array_push($returnData, $usuarios_);
        }
        echo json_encode($returnData);
    }

    public function insertarUsuarios()
    {
        $tp = $this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->usuarios->save([
                    'nombre_completo' => $this->request->getPost('nombre_c'),
                    't_identidad' => $this->request->getPost('tdedocumento'),
                    'n_identidad' => $this->request->getPost('ndedocumento'),
                ]);
            } else {
                $this->usuarios->update($this->request->getPost('id'), [
                    'nombre_completo' => $this->request->getPost('nombre_c'),
                    't_identidad' => $this->request->getPost('tdedocumento'),
                    'n_identidad' => $this->request->getPost('ndedocumento'),
                ]);
            }   
            return redirect()->to(base_url('/usuarios'));
        }
    }

     public function eliminados()
    {
        $usuarios = $this->usuarios->where('estado','E')->findAll();
        $data = ['titulo' => 'USUARIOS ELIMINADOS', 'titulo' => 'Proyecto Taller', 'nombre' => 'Daniel Sanchez', 'usuarios' => $usuarios];

        echo view('/principal/header', $data);
        echo view('/usuarios/eliminados', $data);
        
    }

    public function eliminar($id,$estado){
        $usuarios_= $this->usuarios->eliminarUsuarios($id,$estado);
        return redirect()->to(base_url('/usuarios'));
    }

    public function eliminarU($id,$estado){
        $usuarios_= $this->usuarios->eliminarUsuarios($id,$estado);
        return redirect()->to(base_url('/usuarios/eliminados'));
    }



} 