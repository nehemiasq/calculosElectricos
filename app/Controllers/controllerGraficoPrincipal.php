<?php namespace App\Controllers;

class controllerGraficoPrincipal extends BaseController {
	
	public function index()
	{
		
		return view('vistaGraficoPrincipal');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaPrincipal');
	}
}