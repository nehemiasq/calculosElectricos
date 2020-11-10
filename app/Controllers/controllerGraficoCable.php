<?php namespace App\Controllers;

class controllerGraficoCable extends BaseController {
	
	public function index()
	{
		
		return view('vistaGraficoCable');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaMantCable');
	}
}