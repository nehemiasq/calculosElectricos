<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table         = 'login';
    protected $primaryKey    = 'id_usuario';
    protected $allowedFields = [
        'id_usuario', 'nombre_usuario', 'clave_usuario'
    ];

    function index(){

      return $this->asArray()
              ->select('*')
              ->findAll();  //ejecuta el query
    }

    public function insertarUsuarioModel($data){

    	return $this->db->table($this->table)->insert($data); 
  
    }
    
}