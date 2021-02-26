<?php
use CodeIgniter\Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class PageControllers extends CI_Controller {

	public function __construct(){
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
	
	}
	// Apropos Eleves
	public function dashbord()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('admin.php');
		$this->load->view('temp/script.php');
	}
	public function elevesConfirm()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('pages/eleve/elevesconfirme.php');
		$this->load->view('temp/script.php');
	}

	public function elevesInscrit()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('pages/eleve/elevesinscrit.php');
		$this->load->view('temp/script.php');
	}

	public function presence()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('pages/eleve/presenceAbsence.php');
		$this->load->view('temp/script.php');
	}
	public function statistique()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('pages/statistique/eleves.php');
		$this->load->view('temp/script.php');
	}
	// Profs
	public function enseignant()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('pages/prof/listeprofs.php');
		$this->load->view('temp/script.php');
	}
	// Paramtre
	public function parametre_classes()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/sidebar.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('pages/parametres/classes.php');
		$this->load->view('temp/script.php');
	}

}
	
?>
