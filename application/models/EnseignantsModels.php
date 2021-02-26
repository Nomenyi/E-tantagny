<?php 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class EnseignantsModels extends CI_Model
{
	function add_Enseignants($parm,$id_fonctions,$id_matiere,$user)
	{
	   
		$this->db->insert("	PROFESSEUR",$parm);
		$professeurs_id = $this->db->insert_id();



		$this->db->insert("USER",$user);
		$user_Id = $this->db->insert_id();

		$data = array(
			'id_professeurs' => $professeurs_id,
			'id_fonctions'	=> $id_fonctions,
			'user_id'	=> $user_Id,
			'id_matiere' => $id_matiere
		);
		$this->db->insert("FONCTIONS_PROFESSEURS",$data);
		return $this->db->insert_id();
	}

	// function add_users($user)
	// {

	//     $this->db->insert("USER",$user,$fn);
	//     return $this->db->insert_id();
	// }
	function getOneEnseignant($id)
	{
		$this->db->select('*')
				->from('FONCTIONS_PROFESSEURS')
				->join('PROFESSEUR', 'FONCTIONS_PROFESSEURS.id_professeurs = PROFESSEUR.professeur_id')
				->join('USER', 'FONCTIONS_PROFESSEURS.user_id = USER.user_id')
				->join('FONCTIONS', 'FONCTIONS_PROFESSEURS.id_fonctions = FONCTIONS.id_fonctions')
				->join('MATIERES', 'FONCTIONS_PROFESSEURS.id_matiere = MATIERES.matiere_id')
				->where('id_professeurs ',$id);
		$query = $this->db->get();
		return $query->result();
	}

	
	function liste(){
		$this->db->select('*')
				->from("PROFESSEUR")
				->join("MATIERES", "PROFESSEUR.matiere_enseigne = MATIERES.matiere_id");
		$query = $this->db->get();
		return $query->result();
	}

	// public function getOneEnseignant($id)
	// {
	//     $this->db->select('*')->from('PROFESSEUR')->where('professeur_id',$id);
	//     $query = $this->db->get();
	//     return $query->result();
	// }
	


	function update_profeseur($professeur_id,$parm,$user,$user_id,$id_fonctions,$id_matiere)
	{
		$this->db->where('professeur_id ',$professeur_id)
				->update('PROFESSEUR',$parm);  


		$this->db->where('user_id ',$user_id)
				->update('USER',$user); 
		$data = array(
			'id_professeurs' => $professeur_id,
			'id_fonctions'	=> $id_fonctions,
			'user_id'	=> $user_id,
			'id_matiere' => $id_matiere
		);
		$this->db->where('id_professeurs ',$professeur_id);
		$this->db->update("FONCTIONS_PROFESSEURS",$data);
		return $this->db->insert_id();
	}

	function update_compte($user,$user_id)
	{

		$this->db->where('user_id ',$user_id);
		return $this->db->update('USER',$user);  
	}
	function delete_Enseignants($professeur_id){
		$this->db->delete('PROFESSEUR',array('professeur_id'=>$professeur_id));
	}
}

?>