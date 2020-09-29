<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class controllerServicePrincipal extends ResourceController
{
    protected $modelName = 'App\Models\OperacionesModel';
    protected $format    = 'json';

    public function index()
    {
        return "hola mundooooooooooooooo";
    }

    public function pruebaGet()
    {
    	return $this->respond($this->model->findAll());
    }

     public function insertarProyecto()
    {   
        $idOperaciones = $this->request->getPost('idOperaciones'); 
        $nomProyecto = $this->request->getPost('nomProyecto'); 
        $tipoPoste = $this->request->getPost('tipoPoste'); 
        $alturaPoste = $this->request->getPost('alturaPoste'); 
        $posteEnterrado = $this->request->getPost('posteEnterrado'); 
        $tiroCable = $this->request->getPost('tiroCable'); 
        $instalacion = $this->request->getPost('instalacion'); 
        $catenaria = $this->request->getPost('catenaria'); 
        $pesoCable = $this->request->getPost('pesoCable'); 
        $vano = $this->request->getPost('vano'); 
        $longitud = $this->request->getPost('longitud'); 

        $data = [

            'id_operaciones' => $idOperaciones, 
            'nom_proyecto' => $nomProyecto,
            'tipo_poste' => $tipoPoste,
            'altura_poste' => $alturaPoste,
            'poste_enterrado' => $posteEnterrado,
            'tiro_cable' => $tiroCable,
            'tiro_instalacion' => $instalacion,
            'param_catenaria' => $catenaria,
            'peso_cable' => $pesoCable,
            'vano' => $vano,
            'longitud' => $longitud

        ];

         $this->model->insertarProyectoModel($data); //


        return json_encode($data); //con este código hago las pruebas de lo que se va insertar en el postman
    }

    public function eliminarProyecto()
    {   
        $idOperaciones = $this->request->getPost('idOperaciones'); 
        
        //$model = new OperacionesModel();
        $this->model->delete($idOperaciones);
        return $idOperaciones;

    }

}
