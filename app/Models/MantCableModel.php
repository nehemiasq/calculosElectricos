<?php namespace App\Models;

use CodeIgniter\Model;

class MantCableModel extends Model
{
    protected $table         = 'cable';
    protected $primaryKey    = 'id_cable';
    protected $allowedFields = [
        'id_cable', 'tiro_cable', 'peso_cable'
    ];

    function index(){

      return $this->asArray()
              ->select('*')
              ->findAll();  //ejecuta el query
    }

    public function insertarCableModel($data){

    	return $this->db->table($this->table)->insert($data); 

    }

    public function actualizarCableModel($data, $id){

      $db      = \Config\Database::connect();
      $builder = $db->table('cable');
      
      $builder->where('id_cable', $id);
      $builder->update($data);

    }

    public function incrementarId(){
       $db = \Config\Database::connect();

        $query = $db->query('SELECT id_cable FROM cable ORDER BY id_cable DESC LIMIT 1');
        $row   = $query->getRowArray();
        return $row['id_cable'];

    }

}