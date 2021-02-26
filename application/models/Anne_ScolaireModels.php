<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class Anne_ScolaireModels extends CI_Model
{
    function add_scolaire($anne)
	{
		$this->db->insert('ANNE_SCOLAIRE', $anne);
		return $insert_id = $this->db->insert_id();
    }
    
    public function select_anne()
    {
        $this->db->select('*');
		$this->db->from('ANNE_SCOLAIRE');
		$query = $this->db->get();
		return $result = $query->result();
    }

    // UPDATE `ANNE_SCOLAIRE` SET `status`= 1 WHERE status = 0;
    // INSERT INTO `ANNE_SCOLAIRE`(`anne_scolaire`, `status`) VALUES ('2019-2020',0);
    function up_add_scolaire($anne)
    {
        $status = 0;
        $this->db->where('ANNE_SCOLAIRE.status', '=', 0)
                ->update('ANNE_SCOLAIRE', array(
            "status" => 1
        ));
        $this->db->insert('ANNE_SCOLAIRE', $anne);
		return $insert_id = $this->db->insert_id();
        
    }

    // function delete_section($classe_id){
    //     $this->db->delete('CLASSES',array('classe_id'=>$classe_id));
    // }    

}