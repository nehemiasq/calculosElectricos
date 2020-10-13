<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class controllerServiceLogin extends ResourceController
{
    protected $modelName = 'App\Models\LoginModel';
    protected $format    = 'json';

    public function index()
    {
        return "holaaaa Controlador de Login";
    }

    public function crearUsuario()
    {   
        $idUsuario = $this->request->getPost('idUsuario'); 
        $nombreUsuario = $this->request->getPost('nombreUsuario'); 
        $claveUsuario = $this->request->getPost('claveUsuario'); 

        $data = [

            'id_usuario' => $idUsuario, 
            'nombre_usuario' => $nombreUsuario,
            'clave_usuario' => $claveUsuario

        ];

         $this->model->insertarUsuarioModel($data);


        return 'Agregó el usuario correctamente!';
    }

    /*public function ping(){
        
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

    }*/

}