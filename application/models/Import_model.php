<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Import_model extends CI_Model {
    public function __construct()
    {
    $this->load->database();
    }
    public function inserdata($userdata) {
        $newuser = array(
            "etudiant_nom" => trim($userdata[1]),
            "etudiant_prenom" => trim($userdata[2]),
            "etudiant_sexe" => trim($userdata[3]),
            "etudiant_date_de_naissance" => trim($userdata[4]),
            "etudiant_lieu_de_naissance" => trim($userdata[5]),
            "etudiant_adresse" => trim($userdata[6])
          );
        $this->db->insert('ETUDIANT', $newuser);
		return $this->db->insert_id();
    }

    function nouvMpianatra($input_mpianatra,$input_parent,$input_scolraire,$idclasse,$idscolaire )
	{
		
		$this->db->insert('ETUDIANT', $input_mpianatra);
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
}
?>