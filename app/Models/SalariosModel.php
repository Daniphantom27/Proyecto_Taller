<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class SalariosModel extends Model{
    protected $table      = 'salarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['estado','periodo','fecha_crea','id_empleado', 'sueldo']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerSalarios(){
        $this->select('salarios.*, empleados.nombre as nombre_empleado');
        $this->join('empleados','empleados.id = salarios.id_empleado');
        $this->where('salarios.estado', 'A');
        $this->where('empleados.estado', 'A');
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

     public function traer_Salarios($id){
        $this->select('salarios.*');
        $this->where ('id',$id);
        $datos= $this->first();
        return $datos;
    } 

    public function eliminarSalarios($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function eliminados_salarios(){
        $this->select('salarios.*, empleados.nombre as nombre_empleado');
        $this->join('empleados','empleados.id = salarios.id_empleado');
        $this->where('salarios.estado', 'E');
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }


    public function guardar ($sueldo, $periodo, $id_empleado)
    {
        $this->save([
            'id_empleado' => $id_empleado,
            'periodo' => $periodo,
            'sueldo' => $sueldo

        ]);
    }

    public function actualizar ($sueldo, $periodo,$salario)
    {
        $this->update(
            $salario,
            [
                'sueldo' => $sueldo,
                'periodo' => $periodo,
            ]
        );
    }

}