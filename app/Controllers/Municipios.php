<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MunicipiosModel;
class Municipios extends BaseController    
{    
    protected $municipios;
    public function __construct()
    {
        $this -> municipios = new MunicipiosModel();
    }
        public function index() 
        {   
            $municipios= $this-> municipios->where('estado', "A")->findAll();         
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Daniel Sanchez','municipios'=> $municipios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/municipios/municipios', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }     

}