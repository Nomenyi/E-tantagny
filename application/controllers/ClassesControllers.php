<?php
use CodeIgniter\Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class ClassesControllers extends CI_Controller {

	public function __construct(){

			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('ClasseModels');
			$this->load->model('EtudiantsModels');
			$this->load->model('Anne_ScolaireModels');
			$this->load->model('NoteModels');
			$this->load->model('ParametreModels');
			$this->load->helper('url_helper');
			$this->load->model('MatiersModels');

    }
	// Classe
    public function addClasse()
	{
		if($this->input->post('save'))
		{
            $parm = $this->input->post('input_val');

			$inserted = $this->ClasseModels->add_classe($parm);
			var_dump($parm);
			// var_dump($is_inserted);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeClasse');
			else
				echo " Veuillez reesseyer";
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	// listes Classes
	public function listeClasse()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['annescolaire'] = $this->load->ClasseModels->select_classes();
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$this->load->view('pages/classes/listeclasse.php', $data);
		$this->load->view('temp/script.php');
	}
	// select Classes
	public function classeSelect()
	{
		$classe_id = $this->uri->segment(3);
		$id_annee_sco = $this->ClasseModels->get_anne_sco_active()[0]->ID;
		$this->load->view('temp/header.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$this->load->view('temp/menuBar.php');
		$data['classe_etudiants'] = $this->EtudiantsModels->classeSelect_etu($classe_id);
		$data['trimestre'] = $this->NoteModels->get_trimestre();
		$data['moyenne_trimestre'] = $this->NoteModels->get_note_eleves(array(
			'classe_id' => $classe_id,
			'id_anne_scolaire' => $id_annee_sco
		));

		// $data['moyenne'] = $this->NoteModels->get_avg_etu()
		$data['classe_id'] = $classe_id;
		$data['id_anne_scolaire'] = $id_annee_sco;
		$this->load->view('pages/classes/ClasseSelect.php', $data);
		$this->load->view('temp/script.php');
	}

	// examin entre note
	public function noteEleves($id)
	{

		$idClasse = $this->uri->segment(3);
		$idTrimestre = $this->uri->segment(5);
		$etudiant_im = $this->uri->segment(4);
		$id_annee_sco = $this->ClasseModels->get_anne_sco_active()[0]->ID;
		$data['classe_id'] = $idClasse;
		$data['trimestre_id'] = $idTrimestre;
		$data['etudiant_im'] = $etudiant_im;
		$data['id_anne_scolaire'] = $id_annee_sco;

		// var_dump($idClasse,	$idTrimestre,$id_annee_sco);exit;
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['get_matProfClasse'] = $this->ParametreModels->get_mat_professeur_classe($idClasse);
		$data['classe_etudiants'] = $this->EtudiantsModels->classeSelect_etu($idClasse);
		$data['listematiere'] = $this->ParametreModels->matiereListe();
		$data['trimestre'] = $this->NoteModels->get_trimestre();
		$data['note_eleves'] = $this->NoteModels->note_eleves(array(
			'classe_id' => $idClasse,
			'etudiant_im' => $etudiant_im,
			'trimestre_id' => $idTrimestre,
			'id_anne_scolaire' => $id_annee_sco
		));
		// print_r($data['note_eleves']);exit;
		$this->load->view('pages/classes/testeNotes.php',$data);
		$this->load->view('temp/script.php');

	}
	/**
	 * view formulaire
	 * Note Eleves par classe
	 */
	public function formulaireNote()
	{
		$idClasse = $this->uri->segment(3);
		$idTrimestre = $this->uri->segment(5);
		$idMatiere = $this->uri->segment(4);
		$id_annee_sco = $this->ClasseModels->get_anne_sco_active()[0]->ID;

		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['get_matProfClasse'] = $this->ParametreModels->get_mat_professeur_classe($idClasse);
		$data['anne_scolaire'] = $this->Anne_ScolaireModels->select_anne();
		$data['listematiere'] = $this->ParametreModels->matiereListe();
		// $data['classe_etudiants'] = $this->NoteModels->eleves_empty_note_mat(array(
		// 	'id_matiere' => $idMatiere,
		// 	'id_classe'  => $idClasse,
		// 	'id_trimestre' => $idTrimestre,
		// 	'id_anne_scolaire' => $id_annee_sco
		// ));
		$data['allEtudiants_inscrit'] = $this->EtudiantsModels->etudiantInsctes();
		$data['classe_id'] = $idClasse;
		$data['matiere_by_id'] = $this->MatiersModels->get_matiere_by_id($this->uri->segment(4));
		$data['trimestre_id'] = $idTrimestre;
		$data['id_anne_scolaire'] = $id_annee_sco;
		$data['exists_false'] = TRUE;
		$data['nom_matiere'] = $this->uri->segment(6);

		if($data['classe_etudiants'] == NULL)
		{
			$data['exists_false'] = FALSE;
			// var_dump(5);exit;
			$this->load->view('pages/classes/entrerNote.php', $data);
		}
		else{
			$this->load->view('pages/classes/entrerNote.php',$data);
		}
		$this->load->view('temp/script.php');
	}

	/**
	*Ajouter les notes des eleves dans un matiere
	*
	*/
	public function set_note()
	{
		if($this->input->post('save')){

			$id_etudiant =  $this->input->post('id_etudiant');
			$id_matiere =  $this->input->post('id_matiere');
			$id_classe =  $this->input->post('id_classe');
			$id_annee_sco =  $this->input->post('id_anne_scolaire');
			$note = $this->input->post('note');
			$id_trimestre = $this->input->post('id_trimestre');
			// var_dump($note, $id_matiere);exit;
			for($i = 0; $i < count($note); $i++)
			{

				if($note[$i] == "")
				{
					$note[$i] = 0;
				}

			}
			// var_dump($id_matiere);exit;
			$data = array(
				'valeur'	  => $note,
				'id_matiere'  => $id_matiere,
				'id_etudiant' => $id_etudiant,
				'id_classe'	  => $id_classe,
				'id_anne_scolaire' => $id_annee_sco,
				'id_trimestre' => $id_trimestre
			);
			// var_dump($data['id_trimestre']);exit;
			$this->NoteModels->set_note_children($data);
			redirect(base_url() . 'ClassesControllers/noteEleves/'.$data['id_classe'][0]);
		}

	}

	/**
	*View notes children with any matiere
	*
	*/
	public function view_note()
	{
		$data = array(

			'id_eleves' 			 =>1,
			'matiere_id' 			 => 2,
			'classe_id' 			 => 1,
			'id_anne_scolaire' =>2,
			'id_trimestre'		 =>1

		);
		$count = 0 ;
		for ($i=0; $i < count($data); $i++) {

		}
		try {
			$this->NoteModels->get_note_eleves($data);

		} catch (\Exception $exception) {
			echo $exception->getMessage();
		}

	}

	public function eleveNotes()
	{
		$idClasse = $this->uri->segment(3);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();

		$this->load->view('temp/sidebar.php', $data);
		$data['note_per_trimestre'] = $this->NoteModels->get_note_eleves(array(
			'classe_id' => $idClasse,
			'id_anne_scolaire' => $this->uri->segment(5)
		),true);
		$data['nombre_matiere'] = count($this->ParametreModels->get_mat_professeur_classe($idClasse));
		$tmp_data = $this->EtudiantsModels->getOneEtudiants($this->uri->segment(4));
		$data['nom_etudiant'] = array(
			'etudiant_im'  => $tmp_data[0]->etudiant_im,
			'etudiant_nom' => $tmp_data[0]->etudiant_nom.' '.$tmp_data[0]->etudiant_prenom
		);
		// var_dump($data['nom_etudiant']['etudiant_im']);exit;
		// var_dump($data['classeListe']);exit;
		$this->load->view('pages/classes/noteEleves.php', $data);
		$this->load->view('temp/script.php');
	}


}

?>
