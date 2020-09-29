<?php namespace App\Controllers;

class ControllerFormCalculo extends BaseController {


	public function index()
	{
		
		return view('vistaCalculo');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaPrincipal');
	}

	public function Get()
    {
    	return $this->respond($this->model->findAll());
    }   

}