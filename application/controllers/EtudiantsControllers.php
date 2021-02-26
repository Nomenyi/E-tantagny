<?php
// use CodeIgniter\Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class EtudiantsControllers extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('EtudiantsModels');
		$this->load->model('ParametreModels');
		$this->load->model('Anne_ScolaireModels');
		$this->load->model('ClasseModels');
		$this->load->helper('url_helper');

	}
	public function index()
	{
		$this->load->view('temp/header.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$this->load->view('temp/menuBar.php');
		$data['classes'] = $this->load->ParametreModels->get_classe();
		$data['annescolaire'] = $this->load->Anne_ScolaireModels->select_anne();
		$this->load->view('pages/eleve/inscription.php', $data);
		$this->load->view('temp/script.php');
	}

	public function enregistreMpianatra()
	{
		if($this->input->post('save'))
		{
			$input_mpianatra = $this->input->post('input_val', TRUE);
			$input_parent = $this->input->post('input_par', TRUE);
			$input_scolraire = $this->input->post('input_sco', TRUE);
			$idclasse = $this->input->post('input_id[id_classe]', TRUE);
			$idscolaire = $this->input->post('input_id[id_anne_scolaire]', TRUE);
			
			/**
			 * upload une image pour une etudiant
			 */

			$Img = array(
				'upload_path' => './image',
				'allowed_types' => 'jpg|png|jpeg',
				'max_size' => 4000
			);
			$this->load->library("upload",$Img);
			if(!$this->upload->do_upload('etudiantImage'))
			{

				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$this->EtudiantsModels->nouvMpianatra($input_mpianatra,$fn,$input_parent,$input_scolraire,$idclasse,$idscolaire);
				$this->session->set_flashdata('success', 'Enregistrement réussite, mais photo non enregistre');
				redirect('EtudiantsControllers/elevesInscrit');
			}
			else 
			{
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$this->EtudiantsModels->nouvMpianatra($input_mpianatra,$fn,$input_parent,$input_scolraire,$idclasse,$idscolaire);
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				redirect('EtudiantsControllers/elevesInscrit');
			}
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
				return $this->index();
		}
	}

	public function elevesInscrit()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['allEtudiants_inscrit'] = $this->EtudiantsModels->etudiantInsctes();
		$this->load->view('pages/eleve/elevesinscrit.php', $data);
		$this->load->view('temp/script.php');
	}
	
	
	public function Modifier($id = null)
	{
		$idetu = $this->uri->segment(3);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['classes'] = $this->load->ParametreModels->get_classe();
		$data['annescolaire'] = $this->load->Anne_ScolaireModels->select_anne();
		$data['valeurs'] = $this->EtudiantsModels->mod($idetu);
		$this->load->view('pages/eleve/Modifier.php', $data);
		$this->load->view('temp/script.php');	
	}

	public function updateEleves()
	{
		if($this->input->post('modifier'))
		{
			$input_mpianatra = $this->input->post('input_val', TRUE);
			$input_parent = $this->input->post('input_par', TRUE);
			$input_scolraire = $this->input->post('input_sco', TRUE);
			$idclasse = $this->input->post('input_id[id_classe]', TRUE);
			$idscolaire = $this->input->post('input_id[id_anne_scolaire]', TRUE);
			$idEtudiants = $this->input->post('etudiant_im', TRUE);
			$idParents = $this->input->post('parent_id', TRUE);
			$idScolarite = $this->input->post('id_scolarite', TRUE);
			
			/**
			 * upload une image pour une etudiant
			 */

			$Img = array(
				'upload_path' => './image',
				'allowed_types' => 'jpg|png|jpeg',
				'max_size' => 4000
			);
			$this->load->library("upload",$Img);
			if(!$this->upload->do_upload('etudiantImage'))
			{

				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$this->EtudiantsModels->update_etudiants($input_mpianatra,$fn,$idEtudiants,$input_parent,$idParents,$input_scolraire,$idScolarite,$idclasse,$idscolaire);
				$this->session->set_flashdata('success', 'Modification réussite, mais photo non enregistre');
				redirect('EtudiantsControllers/elevesInscrit');
			}
			else 
			{
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$this->EtudiantsModels->update_etudiants($input_mpianatra,$fn,$idEtudiants,$input_parent,$idParents,$input_scolraire,$idScolarite,$idclasse,$idscolaire);
				$this->session->set_flashdata('success', 'Modification réussite');
				redirect('EtudiantsControllers/elevesInscrit');
			}
			// $this->EtudiantsModels->update_etudiants($input_mpianatra,$idEtudiants,$input_parent,$idParents,$input_scolraire,$idScolarite,$idclasse,$idscolaire);
			
			// $this->session->set_flashdata('success', 'Modification réussite');
			// redirect('EtudiantsControllers/elevesInscrit');
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
				return $this->index();
		}
	}



	public function Profil($id=null)
	{
		$idEtu = $this->uri->segment(3);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);	
		$data['etudiantsSelect'] = $this->EtudiantsModels->getOneEtudiants($idEtu);
		$this->load->view('pages/eleve/profil.php' , $data);
		$this->load->view('temp/script.php');
		
		

	}
}

?>
