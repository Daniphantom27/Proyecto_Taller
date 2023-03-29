<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;
use App\Models\CargosModel;
use App\Models\MunicipiosModel;
use App\Models\PaisesModel;
use App\Models\DepartamentosModel;
use App\Models\SalariosModel;

class Empleados extends BaseController
{
    protected $empleados;
    protected $cargos;
    protected $municipios;
    protected $paises;
    protected $departamentos;
    protected $salarios;


    public function __construct()
    {
        $this->empleados = new EmpleadosModel();
        $this->cargos = new CargosModel();
        $this->municipios = new MunicipiosModel();
        $this->paises = new PaisesModel();
        $this->departamentos = new DepartamentosModel();
        $this->salarios = new SalariosModel();
    }
    public function index()
    {
        $salarios = $this->salarios->obtenerSalarios('A');
        $departamentos = $this->departamentos->obtenerDepartamento('A');
        $paises = $this->paises->obtenerPaises('A');
        $empleados = $this->empleados->obtenerEmpleados();
        $municipios = $this->municipios->obtenerMunicipios('A');
        $cargos = $this->cargos->where('estado', 'A')->findAll();
        $data = ['titulo' => 'Proyecto Taller', 'nombre' => 'Daniel Sanchez', 'empleados' => $empleados, 'cargos' => $cargos, 'municipios' => $municipios, 'paises' => $paises, 'departamentos' => $departamentos, 'salarios' => $salarios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
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

    /* public function buscar_Sal($id)
        {
            $returnData = array();
            $empleados = $this->empleados->traer_Sal($id);
            if (!empty($empleados)) {
                array_push($returnData, $empleados);
            }
            echo json_encode($returnData);
        } */

    public function insertarEmpleados()
    {
        $tp = $this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->empleados->save([
                    'id_municipio' => $this->request->getPost('municipio'),
                    'nombre' => $this->request->getPost('nombre'),
                    'apellidos' => $this->request->getPost('apellido'),
                    'nacimiento' => $this->request->getPost('nacimiento'),
                    'id_cargo' => $this->request->getPost('cargo'),
                    'id_pais' => $this->request->getPost('pais'),
                    'id_departamento' => $this->request->getPost('departamento'),
                ]);

                $sueldo = $this->request->getPost('salari');
                $periodo = $this->request->getPost('periodo');
                $id_empleado = $this->empleados->getInsertID();

                echo $id_empleado;

                $this->salarios->guardar($sueldo, $periodo, $id_empleado);

                return redirect()->to(base_url('/empleados'));
            } else {
                $this->empleados->update($this->request->getPost('id'), [
                    'id_municipio' => $this->request->getPost('municipio'),
                    'nombre' => $this->request->getPost('nombre'),
                    'apellidos' => $this->request->getPost('apellido'),
                    'nacimiento' => $this->request->getPost('nacimiento'),
                    'id_cargo' => $this->request->getPost('cargo'),
                    'id_pais' => $this->request->getPost('pais'),
                    'id_departamento' => $this->request->getPost('departamento'),
                ]);

                $sueldo = $this->request->getPost('salari');
                $periodo = $this->request->getPost('periodo');
                $salario = $this->request->getPost('id_sala');

                $this->salarios->actualizar($sueldo, $periodo, $salario);

                return redirect()->to(base_url('/empleados'));
            }
        }
    }

    public function eliminados()
    {
        $empleados = $this->empleados->eliminados_empleados();
        $data = ['titulo' => 'EMPLEADOS ELIMINADOS', 'titulo' => 'Proyecto Taller', 'nombre' => 'Daniel Sanchez', 'empleados' => $empleados];

        echo view('/principal/header', $data);
        echo view('/empleados/eliminados', $data);
    }

    public function eliminar($id, $estado)
    {
        $empleados_ = $this->empleados->eliminarEmpleados($id, $estado);
        return redirect()->to(base_url('/empleados'));
    }

    public function eliminarE($id, $estado)
    {
        $this->empleados->eliminarEmpleados($id, $estado);
        return redirect()->to(base_url('/empleados/eliminados'));
    }

    public function buscar_dptoPais($id)
    {
        $returnData = array();
        $departamentos = $this->departamentos->traer_dptoPais($id);
        if (!empty($departamentos)) {
            array_push($returnData, $departamentos);
        }
        echo json_encode($departamentos);
    }

    public function buscar_munDpto($id)
    {
        $returnData = array();
        $municipios = $this->municipios->traer_munDpto($id);
        if (!empty($municipios)) {
            array_push($returnData, $municipios);
        }
        echo json_encode($municipios);
    }


}
