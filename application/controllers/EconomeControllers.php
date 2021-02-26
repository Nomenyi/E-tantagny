<?php
use CodeIgniter\Controller;

use function PHPSTORM_META\type;

defined('BASEPATH') OR exit('No direct script access allowed');

class EconomeControllers extends CI_Controller {

	public function __construct(){
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('ClasseModels');
			$this->load->model('EtudiantsModels');
			$this->load->model('Anne_ScolaireModels');
			$this->load->model('EnseignantsModels', 'em');
			$this->load->model('EconomeModels');
			$this->load->model('ParametreModels');
			$this->load->helper('url_helper');
	
	}
	/***
	 * genere les frai genereaux a payer
	 */

    public function parametrer_economes()
    {
        $this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['parameEconome'] = $this->EconomeModels->ListesParame();
		$data['annescolaire'] = $this->load->Anne_ScolaireModels->select_anne();
        $this->load->view('pages/econome/index2.php',$data);
		$this->load->view('temp/script.php');
	}
	/***
	 * affiche la le cahier jounale
	 */
	public function cahie_journale()
    {
        $this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['parameEconome'] = $this->EconomeModels->ListesParame();
		$data['journale'] = $this->EconomeModels->listeCaisse()[0];
		$data['budget'] = array(
			'Total_entre' => $this->EconomeModels->listeCaisse()[2],
			'Total_sortie' => $this->EconomeModels->listeCaisse()[3],
			'Reste_total' => $this->EconomeModels->listeCaisse()[1]
		);
		$data['annescolaire'] = $this->load->Anne_ScolaireModels->select_anne();
        $this->load->view('pages/econome/index.php',$data);
		$this->load->view('temp/script.php');
	}
	/***
	 * payemt ff Eleves
	 * 
	 */
	public function payement_ff()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['parameEconome'] = $this->EconomeModels->ListesParame();
		$data['journale'] = $this->EconomeModels->listeCaisse()[0];
		$data['budget'] = array(
			'Total_entre' => $this->EconomeModels->listeCaisse()[2],
			'Total_sortie' => $this->EconomeModels->listeCaisse()[3],
			'Reste_total' => $this->EconomeModels->listeCaisse()[1]
		);
		$data['allEtudiants_inscrit'] = $this->EtudiantsModels->etudiantInsctes();
		$data['annescolaire'] = $this->load->Anne_ScolaireModels->select_anne();
        $this->load->view('pages/econome/payement_ff.php',$data);
		$this->load->view('temp/script.php');
	
	}
	/***
	 * view eleves par id peyement
	 */
	public function eleves_paye()
	{

		$eleve_Id = $this->uri->segment(3);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['parameEconome'] = $this->EconomeModels->ListesParame();
		$data['journale'] = $this->EconomeModels->listeCaisse()[0];
		$data['budget'] = array(
			'Total_entre' => $this->EconomeModels->listeCaisse()[2],
			'Total_sortie' => $this->EconomeModels->listeCaisse()[3],
			'Reste_total' => $this->EconomeModels->listeCaisse()[1]
		);
		$data['eleves'] = $this->EconomeModels->select_elves($eleve_Id);
		$data['annescolaire'] = $this->Anne_ScolaireModels->select_anne();
		$data['fraie_genereaux'] = $this->EconomeModels->ListesParame();
		// var_dump($this->EconomeModels->select_elves($eleve_Id)[0]->montant);exit;/
		if(empty($this->EconomeModels->ListesParame())){
			$data['net_a_payer'] = NULL;
		}
		else{
			// var_dump($this->EconomeModels->select_elves($eleve_Id)[0]);exit;
			if(isset($this->EconomeModels->select_elves($eleve_Id)[1])){
				
				$data['net_a_payer'] = $this->EconomeModels->ListesParame()[0]->montant;
				// var_dump($data['net_a_payer']);exit;
				$data['eleves'] = $this->EconomeModels->select_elves($eleve_Id)[0];
			}
			else{
				// var_dump($this->EconomeModels->select_elves($eleve_Id)[0]);exit;
				if($this->EconomeModels->ListesParame()[0]->montant != $this->EconomeModels->select_elves($eleve_Id)[0]->montant)
				{
					$data['net_a_payer'] = $this->EconomeModels->ListesParame()[0]->montant - $this->EconomeModels->select_elves($eleve_Id)[0]->montant;
		
				}
				else{
					$data['net_a_payer'] = "Vous avez deja payer le frais generaux";
				}
			}
		
		}
				
        $this->load->view('pages/econome/eleves_payement.php',$data);
		$this->load->view('temp/script.php');
	
	}
	/***
	 * post dans econome_etudiants les payements
	 */
	public function payer()
	{
		if($this->input->post('save'))
		{
			$generer =array(
				
				'id_econome_etudiant' => $this->input->post('id_econome_etudiant'),
				'designation' => $this->input->post('designation'),
				'montant' => $this->input->post('montant'),
				'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
			);
			// var_dump($generer['id_econome_etudiant']);exit;
			if($generer['id_econome_etudiant'] == "")
			{
				$this->EconomeModels->update_payement($generer, $this->input->post('id_classe'));
			}
			else{
				$this->EconomeModels->update_payement($generer);
			}

			if($generer['montant'] != 0)
			{
				$generer = array(
					'entrant' => $this->input->post('montant'),
					'sortie' =>  " 0 ",
					'designation' => "Frais Généreaux",
					'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
				);
				
					$this->EconomeModels->save_journale($generer);
			}
			
			$this->session->set_flashdata('success', 'Enregistrement réussite');
			return redirect('EconomeControllers/eleves_paye/'.$this->uri->segment(3));
		
		}
		else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
				return $this->index();
		}
	}
	/***
	 * generer la caisse de l'etablissement
	 */
	public function generer()
	{
		if($this->input->post('save'))
		{
			$generer =array(
				'designation' => $this->input->post('designation'),
				'montant' => $this->input->post('montant'),
				'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
			);
			
				$this->EconomeModels->saveMontant($generer);
			
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('EconomeControllers/parametrer_economes');
		
		}
		else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
				return $this->index();
		}
	}

	/*** payement des Frais genereaux
	 * 
	 */

	public function Entrer_mont()
	{
		if($this->input->post('saveEntrant'))
		{
			$generer = array(
				'entrant' => $this->input->post('entrant'),
				'sortie' => $this->input->post('sortie'),
				'designation' => $this->input->post('designation'),
				'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
			);
			
				$this->EconomeModels->save_journale($generer);
			
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('EconomeControllers/cahie_journale');
		
		}
		else if($this->input->post('savesortie'))
		{
			$generer = array(
				'entrant' => $this->input->post('entrant'),
				'sortie' => $this->input->post('sortie'),
				'designation' => $this->input->post('designation'),
				'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
			);
			
				$this->EconomeModels->save_journale($generer);
			
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('EconomeControllers/cahie_journale');
		
		}
		else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
				return;
		}
	}
}
	
?>
