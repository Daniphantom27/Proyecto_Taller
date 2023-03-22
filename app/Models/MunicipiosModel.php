<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class MunicipiosModel extends Model
{
    protected $table      = 'municipios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'id_departamento', 'id_pais', 'estado', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerMunicipios()
    {
        $this->select('municipios.*,departamentos.nombre as nombre_departamento, paises.nombre as nombre_pais');
        $this->join('paises','paises.id = municipios.id_pais'); 
        $this->join('departamentos', 'departamentos.id = municipios.id_departamento');
        $this->where('municipios.estado', 'A');
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }


    /* public function update($nombre, $id){
        $this->update('cargos');
        $this->set('nombre',     $nombre);
        $this->where('id_cargo', $id);
    } */
    /*   public function buscaCargo($id){
        $this->select('clientes.*');
        $this->where('id_cliente', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    } */

    public function traer_Municipios($id)
    {
        $this->select('municipios.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }


    public function eliminarMunicipios($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function eliminados_municipios() 
    {
        $this->select('municipios.*,departamentos.nombre as nombre_departamento, paises.nombre as nombre_pais ');
        $this->join('departamentos', 'departamentos.id = municipios.id_departamento');
        $this->join('paises','paises.id = municipios.id_pais');
        $this->where('municipios.estado', "E");
        $datos = $this->findAll();
        return $datos;
    }

}
