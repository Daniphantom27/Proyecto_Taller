<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\PaisesModel;

class Paises extends BaseController
{
    protected $paises;
    public function __construct()
    {
        $this->paises = new PaisesModel();
    }
    public function index()
    {
        $paises = $this->paises->where('estado', "A")->obtenerPaises();
        $data = ['titulo' => 'Proyecto Taller', 'nombre' => 'Daniel Sanchez', 'paises' => $paises]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/paises/paises', $data);

        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    // public function insertarPaises()
    // {
    //     if ($this->request->getMethod() == 'post') {
    //         $this->paises->save([
    //             'codigo' => $this->request->getPost('codigo'),
    //             'nombre' => $this->request->getPost('nombre')
    //         ]);
    //         return redirect()->to(base_url('/paises'));
    //     }
    // }

   public function buscar_Paises($id)
   {
       $returnData = array();
       $paises_ = $this->paises->traer_Paises($id);
       if (!empty($paises_)) {
           array_push($returnData, $paises_);
       }
       echo json_encode($returnData);
   }

   public function insertarPaises()
   {
       $tp=$this->request->getPost('tp');
       if ($this->request->getMethod() == "post") {
           if ($tp == 1) {
               $this->paises->save([
                   'codigo' => $this->request->getPost('codigo'),
                   'nombre' => $this->request->getPost('nombre')
               ]);  
           }else {
               $this->paises->update($this->request->getPost('id'),[                    
                   'nombre' => $this->request->getPost('nombre'),
                   'codigo' => $this->request->getPost('codigo'),
               ]);
           }
           return redirect()->to(base_url('/paises'));
       }
   }

   


}
