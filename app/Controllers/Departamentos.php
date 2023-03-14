<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\DepartamentosModel;
use App\Models\PaisesModel;

class Departamentos extends BaseController    
{    
    protected $departamentos;
    protected $paises;

    public function __construct()
    {
         $this -> departamentos = new DepartamentosModel();
         $this -> paises = new PaisesModel();
    }
        public function index() 
        {   
            $departamentos= $this-> departamentos->obtenerDepartamento();    
            $paises= $this-> paises->where('estado', "A")->findAll();     
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Daniel Sanchez','departamentos'=> $departamentos, 'paises'=>$paises]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/departamentos/departamentos', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }    
        
        public function insertarDpto(){
            if($this->request -> getMethod() == 'post'){
                $this->departamentos->save([
                    'id_pais'=>$this->request->getPost('pais'),   
                    'nombre'=>$this->request->getPost('nombre')
                ]);
                return redirect()->to(base_url('/departamentos'));
            }
        }

}