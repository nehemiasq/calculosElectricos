<?php namespace App\Controllers;

class controllerGraficoPoste extends BaseController {
	
	public function index()
	{
		
		return view('vistaGraficoPoste');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaMantPoste');
	}
}