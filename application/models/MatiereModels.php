<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;
 
class MatiereModels extends CI_Model
{
	public function __construct(){
	
		parent::__construct();
	
    }
    // { liste Matiere}
    function newMatiere($new)
    {
        $this->db->insert('MATIERES',$new);
		return $this->db->insert_id();
    }

    function matiereListe()
    {
        $this->db->select('*');
		$this->db->from('MATIERES');
        $query = $this->db->get();
		return $result = $query->result();
    }
}
?>