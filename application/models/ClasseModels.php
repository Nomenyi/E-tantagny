<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class ClasseModels extends CI_Model
{
    public function select_classes()
    {
        $this->db->select('*');
		$this->db->from('CLASSES');
		$query = $this->db->get();
		return $result = $query->result();
    }
    // 
    public function select($classe_id)
    {
        $this->db->select('*');
		$this->db->from('CLASSES');
		$this->db->where('classe_id = ', $classe_id);
		$query = $this->db->get();
		return $result = $query->result();
    }


    function add_classe($parm)
	{
		$this->db->insert('CLASSES', $parm);
		return $insert_id = $this->db->insert_id();
	}

   

    function delete_section($classe_id){
        $this->db->delete('CLASSES',array('classe_id'=>$classe_id));
    }

    // 
    /**
     * Select anne_scolaire active
     * 
     */
    public function get_anne_sco_active()
    {
        return $this->db->select('id_anne_scolaire as ID, anne_scolaire as ANNEE')
                    ->from('ANNE_SCOLAIRE')->get()->result();
    }
    

    

}