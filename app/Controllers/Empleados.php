<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;
use App\Models\CargosModel;
use App\Models\MunicipiosModel;
class Empleados extends BaseController    
{    
    protected $empleados;
    protected $cargos;
    protected $municipios;

    public function __construct()
    {
        $this -> empleados = new EmpleadosModel();
        $this -> cargos = new CargosModel();
        $this -> municipios = new MunicipiosModel();
    }
        public function index() 
        {   
            $empleados= $this-> empleados->obtenerEmpleados();   
            $municipios= $this-> municipios->obtenerMunicipios(); 
            $cargos= $this-> cargos->where('estado', 'A')->findAll(); 
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Daniel Sanchez','empleados'=> $empleados, 'cargos'=>$cargos,'municipios'=>$municipios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/empleados/empleados', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }    
        
    /*     public function insertar(){

            if($this->request -> getMethod() == 'post'){
                $this->empleados->save([
                    'nombre'=>$this->request->getPost('nombre'),
                    'apellidos'=>$this->request->getPost('apellido'),
                    'id_municipio'=>$this->request->getPost('muni'),  
                    'nacimiento'=>$this->request->getPost('nacimiento'),
                    'id_cargo'=>$this->request->getPost('cargo'),
                ]);
                return redirect()->to(base_url('/empleados'));
            }
        } */

        public function buscar_Empleados($id)
        {
            $returnData = array();
            $empleados = $this->empleados->traer_Empleados($id);
            if (!empty($empleados)) {
                array_push($returnData, $empleados);
            }
            echo json_encode($returnData);
        }
     
        public function insertarEmpleados()
        {
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post") {
                if ($tp == 1) {
                    $this->empleados->save([
                        'municipio' => $this->request->getPost('id_municipio'),
                        'nombre' => $this->request->getPost('nombre'),
                        'apellido' => $this->request->getPost('apellidos'),
                        'nacimiento' => $this->request->getPost('nacimiento'),
                        'cargo' => $this->request->getPost('id_cargo')
                    ]);  
                }else {
                    $this->empleados->update($this->request->getPost('id'),[                    
                        'municipio' => $this->request->getPost('id_municipio'),
                        'nombre' => $this->request->getPost('nombre'),
                        'apellido' => $this->request->getPost('apellidos'),
                        'nacimiento' => $this->request->getPost('nacimiento'),
                        'cargo' => $this->request->getPost('id_cargo')
                    ]);
                }
                return redirect()->to(base_url('/empleados'));
            }
        }
     


}