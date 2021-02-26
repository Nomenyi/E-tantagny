<?php
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;
 
class EconomeModels extends CI_Model
{
	function saveMontant($generer)
	{
		
		$this->db->insert('PARAMETRE_ECONOME', $generer);
		$etudiants_id =  $this->db->insert_id();
	}
	function save_journale($generer)
	{
		
		$this->db->insert('CAISSES', $generer);
		$etudiants_id =  $this->db->insert_id();
    }

    function ListesParame()
    {
        $this->db->select('*');
		$this->db->from('PARAMETRE_ECONOME');
		$this->db->join('ANNE_SCOLAIRE', 'PARAMETRE_ECONOME.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire');
	
		$query = $this->db->get();
		// var_dump($query->result());exit;
		return $result = $query->result();
	}
	
	function listeCaisse()
	{
		$this->db->select('*');
		$this->db->from('CAISSES');
		$this->db->join('ANNE_SCOLAIRE', 'CAISSES.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire');
	
		$query = $this->db->get()->result();
		// var_dump($query);exit;
		$totalEntre = 0;
		$totalSortie = 0;
		for($i=0;$i < count($query); $i++)
		{
			
			$totalEntre += $query[$i]->entrant;
			$totalSortie += $query[$i]->sortie;
			
		}
		$reste = $totalEntre - $totalSortie;
		// var_dump($reste);exit;
		return array($query, $reste, $totalEntre, $totalSortie);
	}

	// get id for payement
	function select_elves($eleve_Id)
	{
		// $this->db->select('*');
		// $this->db->where('');
		// $this->db->from('ETUDIANT');
		// $sql = "SELECT * FROM ETUDIANT INNER JOIN CLASSES ON CLASSES.classe_id = ETUDIANT.classe_id WHERE CLASSES.classe_id = ?";
		// $query = $this->db->query($sql,array($classe_id));

		$query = $this->db->from('ECONOMES_ETUDIANTS')
						->join('ETUDIANT', 'ECONOMES_ETUDIANTS.designation = ETUDIANT.etudiant_im')
						->join('CLASSES', 'ECONOMES_ETUDIANTS.id_classe = CLASSES.classe_id')
						->join('ANNE_SCOLAIRE', 'ECONOMES_ETUDIANTS.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire')
						->where('ETUDIANT.etudiant_im = ', $eleve_Id);
		$query = $this->db->get()->result();
		if(empty($query))
		{
			// var_dump("Lataray");exit;
			return array($this->db->select('ETUDIANT.*, ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire, ETUDIANTS_SCOLAIRE_CLASSE.id_classe')->from('ETUDIANTS_SCOLAIRE_CLASSE')
							  ->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im')
							  ->where('ETUDIANT.etudiant_im', $eleve_Id)
							  ->get()->result(), 1);
		}
		else{
			return $query;
		}

	}

	/**
	 * Payement etudiant
	 * 
	 */
	public function update_payement($data, $test = NULL)
	{
		if($test != NULL){
			$this->db->insert('ECONOMES_ETUDIANTS', array(
					'designation' => $data['designation'],
					'id_classe' => $test,
					'montant' => $data['montant'],
					'id_anne_scolaire' => $data['id_anne_scolaire']
			));
		}else{
			
			$this->db->where('ECONOMES_ETUDIANTS.id_econome_etudiant', $data['id_econome_etudiant'])
				->update('ECONOMES_ETUDIANTS', array(
					'id_econome_etudiant' => $data['id_econome_etudiant'],
					'designation' => $data['designation'],
					'montant' => $data['montant'],
					'id_anne_scolaire' => $data['id_anne_scolaire']
				));
		}
		
		
		// var_dump("Mandeha");exit;
	}
	
}
?>
