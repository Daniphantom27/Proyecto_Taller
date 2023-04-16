<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre_completo','contraseña','t_identidad','n_identidad','estado','fecha_crea','usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerUsuarios(){
        $this->select('usuarios.*');
        $this->where('usuarios.estado', 'A',);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }
   public function obtenerUsuario($data){
        $Usuario = $this->db->table('n_identidad');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    } 

    public function traer_usuarios($id){
        $this->select('usuarios.* ');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

     public function eliminarUsuarios ($id,$estado){
        $datos = $this->update($id,['estado'=>$estado]);
        return $datos;
    }

    public function eliminados_usuarios(){
        $this->select('usuarios.*');
        $this->where('estado',"E")->findAll();
    } 
}

