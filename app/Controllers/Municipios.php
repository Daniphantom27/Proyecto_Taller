<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MunicipiosModel;
use App\Models\DepartamentosModel;
class Municipios extends BaseController    
{    
    protected $municipios;
    protected $departamentos;

    public function __construct()
    {
        $this -> municipios = new MunicipiosModel();
        $this -> departamentos = new DepartamentosModel();
    }
        public function index() 
        {   
            $municipios= $this-> municipios->obtenerMunicipios();        
            $departamentos= $this-> departamentos->findAll(); 
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Daniel Sanchez','municipios'=> $municipios, 'departamentos'=>$departamentos]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/municipios/municipios', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }    
        
        public function insertarMun(){
            if($this->request -> getMethod() == 'post'){
                $this->municipios->save([
                    'id_departamento'=>$this->request->getPost('departamento'),   
                    'nombre'=>$this->request->getPost('nombre')
                ]);
                return redirect()->to(base_url('/municipios'));
            }
        }

}