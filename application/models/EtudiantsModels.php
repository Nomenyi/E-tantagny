<?php
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;
 
class EtudiantsModels extends CI_Model
{
	function nouvMpianatra($input_mpianatra,$fn,$input_parent,$input_scolraire,$idclasse,$idscolaire )
	{
		$eleves = array(
			'etudiant_im' => $input_mpianatra['etudiant_im'],
			'image' => $fn,
			'etudiant_nom' => $input_mpianatra['etudiant_nom'],
			'etudiant_prenom' => $input_mpianatra['etudiant_prenom'],
			'etudiant_sexe' => $input_mpianatra['etudiant_sexe'],
			'etudiant_date_de_naissance' => $input_mpianatra['etudiant_date_de_naissance'],
			'etudiant_lieu_de_naissance' => $input_mpianatra['etudiant_lieu_de_naissance'],
			'etudiant_adresse' => $input_mpianatra['etudiant_adresse'],
			'date_inscription' => $input_mpianatra['date_inscription']
		);
		$this->db->insert('ETUDIANT',$eleves);
		$etudiants_id =  $this->db->insert_id();

		$this->db->insert('PARENTS', $input_parent);
		$parent_id = $this->db->insert_id();

		$this->db->insert('ETUDIANT_SCOLARITE', $input_scolraire);
		$id_scolarite = $this->db->insert_id();
		
		$result = array(
			'etudiant_im' => $etudiants_id,
			'parent_id'	=> $parent_id,
			'id_scolarite' => $id_scolarite
		);
		$this->db->insert('ETUDIANTS_PARENTS', $result);
		$data = array(
			'id_classe' => $idclasse,
			'id_anne_scolaire'	=> $idscolaire,
			'etudiant_im' => $etudiants_id,
			'parent_id'	=> $parent_id,
			'id_scolarite' => $id_scolarite
		);
		$this->db->insert('ETUDIANTS_SCOLAIRE_CLASSE',$data);
		// return $this->db->insert_id();

		// entrer les etudiants dans la liste des payement
		$eleve_liste_economes = array(
			'id_classe' => $idclasse,
			'id_anne_scolaire'	=> $idscolaire,
			'designation' => $etudiants_id,
			'montant' => ""
		);
		// var_dump($eleve_liste_economes);exit;
		$this->db->insert('ECONOMES_ETUDIANTS',$eleve_liste_economes);
		return $this->db->insert_id();
			
	}
	
	function etudiantInsctes()
	{
		$this->db->select('*');
		$this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
		$this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
		$this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
		$query = $this->db->get();
		// $sql = "SELECT * FROM ETUDIANT INNER JOIN ETUDIANTS_SCOLAIRE_CLASSE ON ETUDIANT.etudiant_im = ETUDIANTS_SCOLAIRE_CLASSE.id_etudiant
        //         INNER JOIN ANNE_SCOLAIRE ON ANNE_SCOLAIRE.id_anne_scolaire = ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire
        //         INNER JOIN CLASSES ON CLASSES.classe_id = ETUDIANTS_SCOLAIRE_CLASSE.id_classe";
        // $query = $this->db->query($sql);
		return $result = $query->result();
		
	}

	public function studentsListe()
	{
		$this->db->select('*');
		$this->db->from('ETUDIANT');
		$query = $this->db->get();
	}
	// Etidiants Classe
	function classeSelect_etu($classe_id)
	{
		// $this->db->select('*');
		// $this->db->where('');
		// $this->db->from('ETUDIANT');
		// $sql = "SELECT * FROM ETUDIANT INNER JOIN CLASSES ON CLASSES.classe_id = ETUDIANT.classe_id WHERE CLASSES.classe_id = ?";
		// $query = $this->db->query($sql,array($classe_id));

		$this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
		$this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
		$this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
		$this->db->join('ANNE_SCOLAIRE', 'ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire');
		$this->db->where('CLASSES.classe_id = ', $classe_id);
		$query = $this->db->get();
		// var_dump($query->result());exit;
		return $result = $query->result();
	}

	/**
	 * Get number mat for  classes
	 * @param int $classe_id
	 * @return int
	 */
	public function get_numbers_mat($idClasse)
	{
		$this->db->from("CLASSES_PROFESSEURS_MATIERE")
			 ->join("CLASSES", "CLASSES_PROFESSEURS_MATIERE.classe_id = CLASSES.classe_id")
			 ->join("MATIERES", "CLASSES_PROFESSEURS_MATIERE.matiere_id = MATIERES.matiere_id")
			 ->where('CLASSES.classe_id =', $idClasse);
		// var_dump($this->db->get()->num_rows());
		return $this->db->get()->num_rows();
	}
	public function getOneEtudiants($idetu)
	{
		$this->db->from("ETUDIANTS_PARENTS")
			 ->join("ETUDIANT","ETUDIANTS_PARENTS.etudiant_im = ETUDIANT.etudiant_im")
			 ->join("PARENTS","ETUDIANTS_PARENTS.parent_id = PARENTS.parent_id")
			 ->join("ETUDIANT_SCOLARITE","ETUDIANTS_PARENTS.id_scolarite = ETUDIANT_SCOLARITE.id_scolaire ")
			 ->where('ETUDIANT.etudiant_im =',$idetu);

			 return $this->db->get()->result();
		
	}
	function mod($idetu)
	{
		$this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
		$this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
		$this->db->join("ETUDIANT_SCOLARITE","ETUDIANTS_SCOLAIRE_CLASSE.id_scolarite = ETUDIANT_SCOLARITE.id_scolaire ");
		$this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
		$this->db->join("ANNE_SCOLAIRE","ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire ");
		$this->db->join("PARENTS","ETUDIANTS_SCOLAIRE_CLASSE.parent_id = PARENTS.parent_id");
		$this->db->where('ETUDIANT.etudiant_im =',$idetu);
		return $this->db->get()->result();
		// $sql = "SELECT * FROM ETUDIANT INNER JOIN ETUDIANTS_SCOLAIRE_CLASSE ON ETUDIANT.etudiant_im = ETUDIANTS_SCOLAIRE_CLASSE.id_etudiant
		//         INNER JOIN ANNE_SCOLAIRE ON ANNE_SCOLAIRE.id_anne_scolaire = ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire
		//         INNER JOIN CLASSES ON CLASSES.classe_id = ETUDIANTS_SCOLAIRE_CLASSE.id_classe";
		// $query = $this->db->query($sql);
		// return $result = $query->result();
		
	}
	function update_etudiants($input_mpianatra,$fn,$idEtudiants,$input_parent,$idParents,$input_scolraire,$idScolarite,$idclasse,$idscolaire)
    {
		$eleves = array(
			'etudiant_im' => $idEtudiants,
			'image' => $fn,
			'etudiant_nom' => $input_mpianatra['etudiant_nom'],
			'etudiant_prenom' => $input_mpianatra['etudiant_prenom'],
			'etudiant_sexe' => $input_mpianatra['etudiant_sexe'],
			'etudiant_date_de_naissance' => $input_mpianatra['etudiant_date_de_naissance'],
			'etudiant_lieu_de_naissance' => $input_mpianatra['etudiant_lieu_de_naissance'],
			'etudiant_adresse' => $input_mpianatra['etudiant_adresse']
		);
		$this->db->where('etudiant_im',$idEtudiants)
				->update('ETUDIANT', $eleves);
		$this->db->where('parent_id',$idParents)
				->update('PARENTS', $input_parent);
		$this->db->where('id_scolaire',$idScolarite)
				->update('ETUDIANT_SCOLARITE', $input_scolraire);
		$data = array(
			'id_classe' => $idclasse,
			'id_anne_scolaire'	=> $idscolaire,
			'etudiant_im' => $idEtudiants,
			'parent_id'	=> $idParents,
			'id_scolarite' => $idScolarite
		);
		$this->db->where('etudiant_im',$data['etudiant_im'])
				->update('ETUDIANTS_SCOLAIRE_CLASSE', $data);
				
		// $etudiants_id =  $this->db->insert_id();

		// $this->db->insert('PARENTS', $input_parent);
		// $parent_id = $this->db->insert_id();

		// $this->db->insert('ETUDIANT_SCOLARITE', $input_scolraire);
		// $id_scolarite = $this->db->insert_id();
    }


}
?>
