<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class controllerServiceMantPoste extends ResourceController
{
    protected $modelName = 'App\Models\MantPosteModel';
    protected $format    = 'json';

    public function index()
    {
        return "holaaaa MantPoste!";
    }

    public function Get() //listar postes
    {
    	return $this->respond($this->model->findAll());
    }

    public function GetId() //Funcion para editar poste
    {
        $idPoste = $this->request->getPost('idPoste'); 
        return $this->respond($this->model->find($idPoste));
    }

    public function aumentarId() //Funcion para autoincrementable
    {
    
    return $this->model->aumentarId();


    }

    public function insertarPoste()
    {   
        $idPoste = $this->request->getPost('idPoste'); 
        $tipoPoste = $this->request->getPost('tipoPoste'); 
        $alturaPoste = $this->request->getPost('alturaPoste'); 

        $data = [

            'id_poste' => $idPoste, 
            'tipo_poste' => $tipoPoste,
            'altura_poste' => $alturaPoste

        ];

         $this->model->insertarPosteModel($data);


        return 'inserto correctamente!';
    }

    public function ping(){
        
        $idPoste = $this->request->getPost('idPoste'); 
        $tipoPoste = $this->request->getPost('tipoPoste'); 
        $alturaPoste = $this->request->getPost('alturaPoste'); 

        $data = [
            'tipo_poste' => $tipoPoste,
            'altura_poste' => $alturaPoste
        ];

        $this->model->actualizarPosteModel($data,$idPoste);
        //$poste->update($idPoste, $data);
        return '222';
    }

    public function eliminarPoste()
    {   
        $idPoste = $this->request->getPost('idPoste'); 
        
        //$model = new OperacionesModel();
        $this->model->delete($idPoste);
        return $idPoste;

    }

     /*public function listarId() //
    {
    
    return $this->model->listarId($id);

    }*/

    // load library  
    
}