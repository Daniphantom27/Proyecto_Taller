<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class EmpleadosModel extends Model{
    protected $table      = 'empleados'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre','apellidos','estado','fecha_crea','id_pais','id_municipio','id_departamento','id_cargo','nacimiento']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;   


    public function obtenerEmpleados(){
     //Cargos
        $this->select('empleados.*,cargos.nombre as nombre_cargo, municipios.nombre as nombre_municipio, paises.nombre as nombre_pais, departamentos.nombre as nombre_departamento, salarios.sueldo as salario, salarios.id as id_salario, salarios.periodo as periodo');
        $this->join('municipios','municipios.id = empleados.id_municipio');
        $this->join('departamentos','departamentos.id = empleados.id_departamento'); 
        $this->join('paises','paises.id = departamentos.id_pais'); 
        $this->join('salarios', 'salarios.id_empleado = empleados.id', 'left');
        $this->join('cargos','cargos.id = empleados.id_cargo');
        $this->where('empleados.estado', 'A');
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos; 

    }

    public function traer_Empleados($id){
        $this->select('empleados.*,cargos.nombre as nombre_cargo, municipios.nombre as nombre_municipio, paises.nombre as nombre_pais, departamentos.nombre as nombre_departamento, salarios.sueldo as salario, salarios.id as id_salario, salarios.periodo as periodo');
        $this->join('municipios','municipios.id = empleados.id_municipio');
        $this->join('departamentos','departamentos.id = empleados.id_departamento'); 
        $this->join('paises','paises.id = departamentos.id_pais'); 
        $this->join('salarios', 'salarios.id_empleado = empleados.id', 'left');
        $this->join('cargos','cargos.id = empleados.id_cargo');
        $this->where('empleados.id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    /* public function traer_Sal($id){
        $this->select('empleados.*,cargos.nombre as nombre_cargo, salarios.sueldo as salario, salarios.id as id_salario, salarios.periodo as periodo');
        $this->join('salarios', 'salarios.id_empleado = empleados.id', 'left');
        $this->join('cargos','cargos.id = empleados.id_cargo');
        $this->where('empleados.id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    } */

    public function eliminarEmpleados($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function eliminados_empleados() 
    {
        $this->select('empleados.*,cargos.nombre as nombre_cargo, municipios.nombre as nombre_municipio, paises.nombre as nombre_pais, departamentos.nombre as nombre_departamento, salarios.sueldo as salario, salarios.id as id_salario, salarios.periodo as periodo');
        $this->join('municipios','municipios.id = empleados.id_municipio');
        $this->join('departamentos','departamentos.id = empleados.id_departamento'); 
        $this->join('paises','paises.id = departamentos.id_pais'); 
        $this->join('salarios', 'salarios.id_empleado = empleados.id', 'left');
        $this->join('cargos','cargos.id = empleados.id_cargo');
        $this->where('empleados.estado', "E");
        $this->orderBy('empleados.id');
        $datos = $this->findAll();
        return $datos;
    }

    public function salarios_empleados(){
        $this->select('salarios.*, salarios.sueldo as salario, salarios.id as id_salario, salarios.periodo as periodo, id_empleado');
        $this->join('salarios', 'salarios.id_empleado = empleados.id', 'left');
        $this->where('empleados.estado', "A");
        $this->orderBy('empleados.id');
        $datos = $this->findAll();
        return $datos;
    }

}