<?php namespace App\Controllers;

class controllerPoste extends BaseController {
	
	public function index()
	{
		
		return view('vistaMantPoste');
	}

	public function vistaEditPoste()
	{
		
		return view('vistaEditPoste');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaPrincipal');
	}
}