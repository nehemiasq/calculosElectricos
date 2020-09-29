<?php namespace App\Controllers;

class controllerCable extends BaseController { //siempre cambiar el nombre del control
	
	public function index()
	{
		
		return view('vistaMantCable');
	}

	public function vistaNuevoCable()
	{
		
		return view('vistaNuevoCable');
	}

	public function vistaEditCable()
	{
		
		return view('vistaEditCable');
	}

	public function vistaPrincipal()
	{
		
		return view('vistaPrincipal');
	}

}