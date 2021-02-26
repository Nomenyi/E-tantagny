<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class SectionModels extends CI_Model
{
    public function select_section()
    {
        $query = $this->db->get('SECTION')->result();
        return $query;
    }

    function add_section($parm){
        $this->db->insert("	SECTION",$parm);
        return $insert_id = $this->db->insert_id();
    }

    function update_section($section_id,$parm)
    {
        $this->db->where('section_id ',$section_id);
        return $this->db->update('SECTION',$parm);  
    }

    function delete_section($section_id){
        $this->db->delete('SECTION',array('section_id'=>$section_id));
    }

}