<?php namespace App\Models;

use CodeIgniter\Model;

class MantPosteModel extends Model
{
    protected $table         = 'poste';
    protected $primaryKey    = 'id_poste';
    protected $allowedFields = [
        'id_poste', 'tipo_poste', 'altura_poste'
    ];

    function index(){

      return $this->asArray()
              ->select('*')
              ->findAll();  //ejecuta el query
    }

    public function insertarPosteModel($data){

    	return $this->db->table($this->table)->insert($data);   

    }
    public function actualizarPosteModel($data, $id){

      $db      = \Config\Database::connect();
      $builder = $db->table('poste');
      
      $builder->where('id_poste', $id);
      $builder->update($data);

    }

    public function aumentarId(){
       $db = \Config\Database::connect();

        $query = $db->query('SELECT id_poste FROM poste ORDER BY id_poste DESC LIMIT 1');
        $row   = $query->getRowArray();
        return $row['id_poste'];

    }

    
}