<?php namespace App\Controllers;

class controllerPrincipal extends BaseController {
	
	public function index()
	{
		
		return view('vistaPrincipal');
	}

	public function vistaCable()
	{
		
		return view('vistaMantCable');
	}

	public function vistaCalculo()
	{
		
		return view('vistaCalculo');
	}
}