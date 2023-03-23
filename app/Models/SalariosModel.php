<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class SalariosModel extends Model{
    protected $table      = 'salarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre','estado','periodo','fecha_crea','id_empleado', 'sueldo']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function guardar($sueldo, $periodo, $id_empleado)
    {
        $this->save([
            'sueldo' => $sueldo,
            'periodo' => $periodo,
            'id_empleado' => $id_empleado

        ]);
    }

    public function actualizar($salario,$sueldo, $periodo)
    {
        $this->update(
            $salario,
            [
                'sueldo' => $sueldo,
                'periodo' => $periodo
            ]
        );
    }
}