<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class controllerServiceMantCable extends ResourceController
{
    protected $modelName = 'App\Models\MantCableModel';
    protected $format    = 'json';

    public function index()
    {
        return "holaaaa MantCable!";
    }

    public function Get()
    {
    	return $this->respond($this->model->findAll());
    }

    public function GetId() //Funcion para editar cable
    {
        $idCable = $this->request->getPost('idCable'); 
        return $this->respond($this->model->find($idCable));
    }

    public function incrementarId() //Funcion para autoincrementable
    {    
    return $this->model->incrementarId();
    }

    public function insertarCable()
    {   
        $idCable = $this->request->getPost('idCable'); 
        $tiroCable = $this->request->getPost('tiroCable'); 
        $pesoCable = $this->request->getPost('pesoCable'); 

        $data = [

            'id_cable' => $idCable, 
            'tiro_cable' => $tiroCable,
            'peso_cable' => $pesoCable

        ];

         $this->model->insertarCableModel($data);


        return 'inserto el cable correctamente!';
    }

    public function ping(){
        
        $idCable = $this->request->getPost('idCable'); 
        $tiroCable = $this->request->getPost('tiroCable'); 
        $pesoCable = $this->request->getPost('pesoCable'); 

        $data = [
             
            'tiro_cable' => $tiroCable,
            'peso_cable' => $pesoCable

        ];

         $this->model->actualizarCableModel($data, $idCable);
        
        return '222';
    }

     public function eliminarCable()
    {   
        $idCable = $this->request->getPost('idCable'); 
        
        //$model = new OperacionesModel();
        $this->model->delete($idCable);
        return $idCable;

    }

}