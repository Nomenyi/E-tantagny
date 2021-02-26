<?php
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class login_Model extends CI_Model

{

    protected $table = 'USER';


    function user_login($uname, $umdp)
    {
        $this->db->SELECT('*')->from('USER');
        $this->db->where('user_name', $uname);
        $this->db->where('user_password', $umdp);
        // $this->db->where('user_level','=','?');
        $query = $this->db->get()->result_array();

        // SELECT * FROM USER WHERE user_mame = '$uname' AND user_password = '$umdp'
        if(count($query) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	
	function Enligne()
	{
		$this->db->select('*');
		$this->db->from('USER');
		$query = $this->db->get();
		return $result = $query->result();
	}

}
