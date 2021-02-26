<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class MatiersModels extends CI_Model
{
    public function select_matieres()
    {
        $query = $this->db->get('MATIERES')->result();
        return $query;
    }

    function add_matiere($parm){
        $this->db->insert("	MATIERES",$parm);
        return $insert_id = $this->db->insert_id();
    }

    function update_matiere($matiere_id,$parm)
    {
        $this->db->where('matiere_id ',$matiere_id);
        return $this->db->update('MATIERES',$parm);  
    }

    function delete_matiere($matiere_id){
        $this->db->delete('MATIERES',array('matiere_id'=>$matiere_id));
    }

    /**
     * Get Matiere by ID
     * @param $matiere_id
     * @return array 
     */
    public function get_matiere_by_id($matiere_id)
    {
            return $this->db->where('MATIERES.matiere_id', $matiere_id)
                        ->from('MATIERES')
                      ->get()->result();
        
    }

}