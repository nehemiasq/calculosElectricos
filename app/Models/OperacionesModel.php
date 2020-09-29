<?php namespace App\Models;

use CodeIgniter\Model;

class OperacionesModel extends Model
{
    protected $table         = 'operaciones';
    protected $allowedFields = [
        'id_operaciones', 'nom_proyecto', 'tipo_poste', 'altura_poste', 'poste_enterrado', 'tiro_cable', 'tiro_instalacion', 'param_catenaria', 'peso_cable', 'vano', 'longitud'
    ];
    protected $primaryKey = 'id_operaciones';

    function index(){

      return $this->asArray()
              ->select('*')
              ->findAll();  //ejecuta el query
    }

    public function insertarProyectoModel($data){

    	return $this->db->table($this->table)->insert($data); 

    }

    
}
