<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Login_Model');
			$this->load->model('Anne_ScolaireModels');
			$this->load->model('ClasseModels');
			$this->load->model('EtudiantsModels');
			$this->load->helper('url_helper');
	
	}

	public function index()
	{
		$this->load->view('temp/header.php');

		$data['liste'] = $this->load->Anne_ScolaireModels->select_anne();
		$this->load->view('login', $data);
		$this->load->view('temp/script.php');
	}

	public function retour()
	{
		redirect('');
	}

	public function connection() 
	{
		$this->load->library('form_validation');
		$this->load->is_loaded('Form_validation'); 

		$this->form_validation->set_rules('user_name', 'user_name', 'required');
		$this->form_validation->set_rules('user_password', 'user_password', 'required');
		$this->form_validation->set_rules('anne', 'anne');

		if($this->form_validation->run())
		{
			// Vraie
			$uname = $this->input->post('user_name');
			$umdp = $this->input->post('user_password');
			$this->load->model('Login_Model');

			// $data = $this->load->Anne_ScolaireModels->select_anne($anne);
			if($this->Login_Model->user_login( $uname, $umdp))
			{
				

				$session_data = array(
					'nom'	=> $uname,
					'mot_de_passe'	=> $umdp
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'login/admin_acceuil');
				
			}
			else
			{
				$this->session->set_flashdata('error', ' Nom ou mot de passe inccorect ');
				return $this->index();
			}
		}
		else
		{
			return $this->index();
		}
	}

	public function admin_acceuil()
	{
		$logged_in = $this->session->userdata('nom') && $this->session->userdata('mot_de_passe');
		if ($logged_in) {
			$this->load->view('temp/header.php');
				$this->load->view('temp/menuBar.php');
				$data['classeListe'] = $this->load->ClasseModels->select_classes();
				$this->load->view('temp/sidebar.php', $data);
			$data['connecte'] = $this->load->Login_Model->Enligne();
			$data['liste'] = $this->load->Anne_ScolaireModels->select_anne();	
			$this->load->view('pages/parametres/anne_scolaire', $data);
			$this->load->view('temp/script.php');
		} else {
			$this->session->set_flashdata('error', ' Votre session est expirée. Veuillez vous reconnecter ');
			redirect('');
		}
		
	}



	public function forget_password()
	{
		$data['title'] = "NomenyiTech - Password recovery";

		$this->load->view('forget_password', $data);
	}
}
